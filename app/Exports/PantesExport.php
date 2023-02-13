<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class PantesExport implements FromView
{
    public function __construct($tglmulai, $tglsd)
    {
        $this->tglmulai = $tglmulai;
        $this->tglsd = $tglsd;
    }

    public function view(): View
    {
        /*$biodata = DB::table('MONITOR_KESEHATAN.dbo.msbiodata')->where('regno', $this->member)->first();
        $trpantau = DB::table('MONITOR_KESEHATAN.dbo.trpantau')->where('pantau_id', $this->nopantau)->first();*/
        $tglmulai = $this->tglmulai;
        $tglsd = $this->tglsd;

        $trpantau =  DB::table('MONITOR_KESEHATAN.dbo.trpantau as p')
            ->select(DB::raw("p.pantau_id, p.regno, b.nama, b.nohp, b.jenis_kelamin, b.usia,
            p.tinggibadan, p.beratbadan, p.imt, p.bbideal, p.lingkarperut, p.lingkarpanggul, p.rasiowh,
            p.tekanandarah, p.gdp, p.gds, p.diet, p.latihanfisik, CONCAT(md.nama_diagnosis, ' -> ', attr.nama_attr) as diagnosis,
            resiko = STUFF((
            select ', ' + r.nama from MONITOR_KESEHATAN.dbo.msresiko r 
            inner join MONITOR_KESEHATAN.dbo.trfaktor f on r.resiko_id = f.faktor_id and p.pantau_id = f.pantau_id
            where f.fgfaktor = 'R'
            FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'), 1, 1, ''),
             predisposisi = STUFF((
            select ', ' + r.nama from MONITOR_KESEHATAN.dbo.mspredisposisi r 
            inner join MONITOR_KESEHATAN.dbo.trfaktor f on r.predisposisi_id = f.faktor_id and p.pantau_id = f.pantau_id
            where f.fgfaktor = 'P'
            FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'), 1, 1, '')"))
            ->when($this->tglmulai != "" || $this->tglsd != "" , function ($query)  use($tglmulai, $tglsd) {
            if($tglmulai != "" && $tglsd != ""){
                return $query->whereRaw("CONVERT(varchar, pantau_date,23) between  ? and ?", [$tglmulai, $tglsd]);
            }else{
                $tanggal = $tglmulai ?: $tglsd;
                return $query->whereRaw("CONVERT(varchar, pantau_date,23) =  ? ", [$tanggal]);
            }
        })->join('MONITOR_KESEHATAN.dbo.msbiodata as b','p.regno','=','b.regno')
        ->join('MONITOR_KESEHATAN.dbo.trdiagnosis as d','p.pantau_id','=','d.pantau_id')
        ->join('MONITOR_KESEHATAN.dbo.msdiagnosis as md','d.diagnosis_id','=','md.diagnosis_id')
        ->leftJoin('MONITOR_KESEHATAN.dbo.diagnosisattr as attr','d.diagnosisattr','=','attr.diagnosis_attr')
        ->where('b.fgactive', 'Y')
        ->orderBy('b.nama', 'asc')
        ->get();

        return view('exports.pantau', [
            'query' => $trpantau
        ]);
    }
}
