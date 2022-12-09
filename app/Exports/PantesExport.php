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

        $trpantau =  DB::table('MONITOR_KESEHATAN.dbo.trpantau')->when($this->tglmulai != "" || $this->tglsd != "" , function ($query)  use($tglmulai, $tglsd) {
            if($tglmulai != "" && $tglsd != ""){
                return $query->whereRaw("CONVERT(varchar, pantau_date,23) between  ? and ?", [$tglmulai, $tglsd]);
            }else{
                $tanggal = $tglmulai ?: $tglsd;
                return $query->whereRaw("CONVERT(varchar, pantau_date,23) =  ? ", [$tanggal]);
            }
        })->join('MONITOR_KESEHATAN.dbo.msbiodata' ,'msbiodata.regno','=','trpantau.regno')->get();
        
        return view('exports.pantau', [
            'query' => $trpantau
        ]);
    }
}
