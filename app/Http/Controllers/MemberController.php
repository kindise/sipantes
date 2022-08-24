<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MemberController extends Controller
{
    public function viewregistrasi ()
    {
        $title = 'Pendaftaran Anggota';
        $breadcrumbs = [
            [
                'link'  => '/',
                'name' => 'Dashboard'
            ],
            [
                'name' => 'Pendaftaran Anggota'
            ]
        ];

        $sex = DB::table('MONITOR_KESEHATAN.dbo.mskelamin')->get();
        $agama = DB::table('MONITOR_KESEHATAN.dbo.msagama')->get();
        $tipe = DB::table('MONITOR_KESEHATAN.dbo.mstipe')->get();

        return view('pages.registrasi', compact('title', 'breadcrumbs', 'sex', 'agama', 'tipe'));
    }

    public function formulir(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama_anggota' => 'required',
            'usia' => 'required',
            'sex' => 'required',
            'agama' => 'required',
            'nokontak' => 'required',
            'iuran' => 'required',
            'alamat' => 'required',
        ],
        [
            'nama_anggota.required' => 'Nama Harus Diisi',
            'usia.required' => 'Usia Harus Diisi',
            'sex.required' => 'Jenis Kelamin Belum Dipilih',
            'agama.required' => 'Agama Harus Belum Dipilih',
            'nokontak.required' => 'Nomer Kontak Harus Diisi',
            'iuran.required' => 'Jenis Iuran Belum Dipilih',
            'alamat.required' => 'Alamat Harus Diisi',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $nomember = collect(DB::select("EXEC MONITOR_KESEHATAN.dbo.sp_regmemberno"))->first()->NO_MEMBER;
        $query = DB::table('MONITOR_KESEHATAN.dbo.msbiodata')->insert([
            'regno' => $nomember,
            'nama' => strtoupper($request->nama_anggota),
            'usia' => $request->usia,
            'jenis_kelamin' => $request->sex,
            'agama' => $request->agama,
            'alamat_rumah' => strtoupper($request->alamat),
            'tempat_kerja' => strtoupper($request->unit) ?? '',
            'nohp' => $request->nokontak,
            'tipe_id' => $request->iuran,
            'created_at' => Carbon::now(),
            'created_by' => auth()->user()->no_absen,
        ]);

        if($query){
            return redirect()->back()->with('success', 'Pendaftaran Anggota Baru Berhasil Dibuat');
        }else{
            return redirect()->back()->with('msgerror', 'Pendaftaran Gagal');
        }
    }

    public function list()
    {
        $title = 'Data Anggota';
        $breadcrumbs = [
            [
                'link'  => '/',
                'name' => 'Dashboard'
            ],
            [
                'name' => 'Data Anggota'
            ]
        ];

        return view('pages.member', compact('title', 'breadcrumbs'));
    }

    public function datatable(Request $request)
    {
        $data = DB::table('MONITOR_KESEHATAN.dbo.msbiodata as a')
                ->select('a.regno', 'a.nama', 'a.usia', 'b.nama as sex', 'a.nohp', 'c.nama_tipe')
                ->join('MONITOR_KESEHATAN.dbo.mskelamin as b', 'a.jenis_kelamin', '=', 'b.id_kelamin')
                ->join('MONITOR_KESEHATAN.dbo.mstipe as c', 'a.tipe_id', '=', 'c.tipe_id');
        return datatables()->query($data)
            ->filterColumn('sex', function($query, $keyword) {
                $query->where('b.nama', 'like', "%{$keyword}%");
        })->toJson();
    }

}
