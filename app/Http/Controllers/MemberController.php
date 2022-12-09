<?php

namespace App\Http\Controllers;

use App\Exports\PantesExport;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
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
            'fgactive' => 'Y',
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
                ->join('MONITOR_KESEHATAN.dbo.mstipe as c', 'a.tipe_id', '=', 'c.tipe_id')
                ->where('a.fgactive' ,'Y');
        return datatables()->query($data)
                ->filterColumn('sex', function($query, $keyword) {
                    $query->where('b.nama', 'like', "%{$keyword}%");
                })
                ->addColumn('aksi', function($data){
                    $html  = '<a href="'.route('pantau', $data->regno).'" target="_blank" class="btn btn-icon btn-sm btn-success"';
                    $html .= ' data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Buat Pemantauan">';
                    $html .= '<i class="fa-solid fa-list-check"></i></a>';
                    $html .= ' <a href="'.route('log', $data->regno).'" target="_blank" class="btn btn-icon btn-sm btn-primary"';
                    $html .= ' data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Catatan Pemantauan">';
                    $html .= '<i class="fa-solid fa-clock-rotate-left"></i></a>';
                    $html .= ' <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-danger" name="'.$data->regno.'"';
                    $html .= ' data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Non Aktifkan Anggota" onclick="handleHapus(this);">';
                    $html .= '<i class="fa-solid fa-trash"></i></a>';
                    return $html;
                })
                ->rawColumns(['aksi'])
                ->toJson();
    }

    public function pantau($id)
    {
        $title = 'Pemantauan Kesehatan';
        $breadcrumbs = [
            [
                'link'  => '/',
                'name' => 'Dashboard'
            ],
            [
                'name' => 'Pemantauan Kesehatan'
            ]
        ];

        $query = DB::table('MONITOR_KESEHATAN.dbo.msbiodata')->where('regno', $id)->first();
        $resiko = DB::table('MONITOR_KESEHATAN.dbo.msresiko')->get();
        $predisposisi = DB::table('MONITOR_KESEHATAN.dbo.mspredisposisi')->get();
        $diagnosis = DB::table('MONITOR_KESEHATAN.dbo.msdiagnosis')->get();

        return view('pages.pantau', compact('title', 'breadcrumbs', 'id', 'query', 'resiko', 'predisposisi', 'diagnosis'));
    }

    public function log($id)
    {
        $title = 'Catatan Pemantauan Kesehatan';
        $breadcrumbs = [
            [
                'link'  => '/',
                'name' => 'Dashboard'
            ],
            [
                'name' => 'Catatan Anggota'
            ]
        ];
        $query = DB::table('MONITOR_KESEHATAN.dbo.msbiodata')->where('regno', $id)->first();
        return view('pages.catatan', compact('title', 'breadcrumbs', 'id', 'query'));
    }

    public function dtablelog($id)
    {
        $query = DB::table('MONITOR_KESEHATAN.dbo.trpantau')->select('pantau_id', 'regno', 'pantau_date')->where('regno', $id);
        return datatables()->query($query)
             ->addColumn('aksi', function($data){
                $html  = '<button class="btn btn-icon btn-sm btn-primary me-3" name="'.$data->pantau_id.'"';
                $html .= ' data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Ubah Pemantauan" onclick="ubah(this);">';
                $html .= '<i class="fa-solid fa-pencil"></i></a>';
                $html .= ' <button class="btn btn-icon btn-sm btn-danger" name="'.$data->pantau_id.'"';
                $html .= ' data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Hapus Pemantauan" onclick="hapus(this);">';
                $html .= '<i class="fa-solid fa-trash"></i></a>';
                return $html;
            })
            ->editColumn('pantau_date', function ($data) {
                return Carbon::parse($data->pantau_date)->format('d F Y');
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function detaildiagnosa(Request $request)
    {
        $id = $request->tipe;

        $query = DB::table('MONITOR_KESEHATAN.dbo.diagnosisattr')->where('diagnosis_id', $id)->get();

        return response()->json($query);

    }

    public function buatpantauan (Request $request)
    {
        
        try {
            DB::beginTransaction();
            $member = $request->member;
            $nopantau = collect(DB::select("EXEC MONITOR_KESEHATAN.dbo.sp_regpantauno"))->first()->NO_PANTAU;
            $trpantau = DB::table('MONITOR_KESEHATAN.dbo.trpantau')->insert([
                'pantau_id' => $nopantau,
                'regno' => $member,
                'pantau_date' => Carbon::now(),
                'tinggibadan' => preg_replace('/,/', '.', $request->tb ?? 0),
                'beratbadan' => preg_replace('/,/', '.', $request->bb ?? 0),
                'lingkarperut' => preg_replace('/,/', '.', $request->lw ?? 0),
                'lingkarpanggul' => preg_replace('/,/', '.', $request->lp ?? 0),
                'imt' => preg_replace('/,/', '.', $request->imt ?? 0),
                'bbideal' => preg_replace('/,/', '.', $request->bbideal ?? 0),
                'rasiowh' => preg_replace('/,/', '.', $request->rasio ?? 0),
                'tekanandarah' => $request->tekanandarah,
                'gdp' => $request->gdp ?? '',
                'gds' => $request->gds ?? '',
                'diet' => $request->diet ?? '',
                'latihanfisik' => $request->fisik ?? '',
                'created_at' => Carbon::now(),
                'created_by' => auth()->user()->no_absen,
            ]);

            $resiko_array = array_map(function ($v) use ($nopantau) {
                return array(
                    'pantau_id' => $nopantau,
                    'faktor_id' => $v,
                    'fgfaktor' => 'R',
                    'created_at' => Carbon::now(),
                    'created_by' => auth()->user()->no_absen,
                );
            }, $request->resiko);

            $predisposisi_array = array_map(function ($v) use ($nopantau) {
                return array(
                    'pantau_id' => $nopantau,
                    'faktor_id' => $v,
                    'fgfaktor' => 'P',
                    'created_at' => Carbon::now(),
                    'created_by' => auth()->user()->no_absen,
                );
            }, $request->predisposisi ?? []);

            $trfaktor = DB::table('MONITOR_KESEHATAN.dbo.trfaktor')->insert(array_merge($resiko_array, $predisposisi_array));
            $trdiagnosis = DB::table('MONITOR_KESEHATAN.dbo.trdiagnosis')->insert([
                'pantau_id' => $nopantau,
                'diagnosis_id' => $request->diagnosis,
                'diagnosisattr' => $request->obesitas,
                'created_at' => Carbon::now(),
                'created_by' => auth()->user()->no_absen,
            ]);

            DB::commit();

            //return Excel::download(new PantesExport($request->member, $nopantau), $nopantau.'.xlsx');
            return redirect()->back()->with('success', 'Pemantauan dengan nomor registrasi ' . $nopantau.
            ' dengan nomor anggota '. $member. ' pada bulan '. date('d F Y'). ' berhasil dibuat');
        } catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->with('msgerror', $e->getMessage())->withInput();
        }
    }

    public function hapuscatatan(Request $request)
    {
        $pantauid = $request->pantau_id;

        try{
            DB::beginTransaction();
            DB::table('MONITOR_KESEHATAN.dbo.trpantau')->where('pantau_id', $pantauid)->delete();
            DB::table('MONITOR_KESEHATAN.dbo.trfaktor')->where('pantau_id', $pantauid)->delete();
            DB::table('MONITOR_KESEHATAN.dbo.trdiagnosis')->where('pantau_id', $pantauid)->delete();
            DB::commit();
            return response()->json(['msg' => 'Hapus item catatan dengan nomor pemnantauan '. $pantauid. ' berhasil dihapus'], 200);
        }catch (QueryException $e){
            DB::rollBack();
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    public function trpantau($id)
    {
        try{
           $trpantau = DB::table('MONITOR_KESEHATAN.dbo.trpantau')->where('pantau_id', $id)->first();
           return response()->json($trpantau);
        }catch (QueryException $e){
            return response($e->getMessage(), 500)
                  ->header('Content-Type', 'text/plain');
        }
    }

    public function nonaktif(Request $request)
    {
        try{
            DB::beginTransaction();
            $query = DB::table('MONITOR_KESEHATAN.dbo.msbiodata')->
                    where('regno', $request->kode)
                    ->update([
                        'fgactive' => 'N',
                        'deleted_at' => Carbon::now(),
                        'deleted_by' => auth()->user()->no_absen,
                    ]);
            DB::commit();
           return response()->json(['msg' => 'Data anggota berhasil dinonaktifkan']);
        }catch (Exception $e){
            DB::rollBack();
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    public function export ()
    {
        $title = 'Export Excel';
        $breadcrumbs = [
            [
                'link'  => '/',
                'name' => 'Dashboard'
            ],
            [
                'name' => 'Export Excel'
            ]
        ];


        return view('pages.export', compact('title', 'breadcrumbs'));
    }

    public function exportexcel(Request $request)
    {
        $tglmulai = $request->tglmulai ?? date('Y-m-d');
		$tglsd = $request->tglsd ?? date('Y-m-d');

      
        return Excel::download(new PantesExport($tglmulai, $tglsd), date('Y-m-d').'.xlsx');
    }

}
