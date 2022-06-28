<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RmDony;
use App\Models\PemeriksaanOdontogram;
use App\Models\User;
use App\Models\CatatanPemeriksaanDony;
use App\Models\RiwayatMedisDony;
use Illuminate\Support\Facades\Hash;
use App\Export\RmUmumExport;
use Yajra\DataTables\DataTables;
use Alert;
use DB;
use Session;

class RmDonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.rm_dony.index');
    }

    public function getDataRmDony()
    { $data = RmDony::select('id', 'nama_kk', 'nama_pasien', 'jenis_kelamin', 'tempat',
                            DB::raw("DATE_FORMAT(tgl_lahir, '%d-%b-%Y') as tgl_lahir"), 'alamat', 'no_telepone', 
                            'pekerjaan')
                    ->orderBy('id', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('download', function($row){
                            return 
                            '<a href="'.route('admin.show.pasien.gigi', $row->id).'">
                            <i class="bi bi-eye" style="color:green;"></i></a>';
                        })
                        ->addColumn('aksi', function($row){
                            return 
                            '<a href="'.route('admin.edit.pasien.gigi', $row->id).'">
                            <i class="bi bi-pencil-square" style="color:blue"></i></a>';
                        })
                        ->rawColumns(['download','aksi'])
                        ->make(true);
        
    }

    public function getDetailRmDony()
    {
        $no_pasien = Session::get('no_pasien');
        $data = CatatanPemeriksaanDony::select('uuid','rm_drg_dony_id', DB::raw("DATE_FORMAT(tgl, '%d-%b-%Y') as tanggal"))
                        ->where('rm_drg_dony_id', $no_pasien )
                        ->orderBy('rm_drg_dony_id', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('riwayat', function($row){
                            return 
                            '<a href="'.route('admin.detail.pasien.gigi', $row->uuid).'">
                                Lihat Detail Riwayat Pasien
                            </a>';
                        })
                        ->rawColumns(['riwayat'])
                        ->make(true);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        return view('admin.rm_dony.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
        $no_pasien = $request->input('no_pasien');
        $nama_kk = $request->input('nama_kk');
        $nama_pasien = $request->input('nama_pasien');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $tempat = $request->input('tempat');
        $tgl_lahir = $request->input('tgl_lahir');
        $alamat = $request->input('alamat');
        $no_telepone = $request->input('no_telepone');
        $pekerjaan = $request->input('pekerjaan');
        
        $data = RmDony::where('id', $no_pasien)->get()->toArray();
        
            
        if(!empty($data))
        {
            return back()->with('failed', 'Nomor pasien sudah ada');
        }

        $rm_dony = new RmDony();
        $rm_dony->id = $no_pasien;
        $rm_dony->nama_kk = $nama_kk;
        $rm_dony->nama_pasien = $nama_pasien;
        $rm_dony->jenis_kelamin = $jenis_kelamin;
        $rm_dony->tempat = $tempat;
        $rm_dony->tgl_lahir = $tgl_lahir;;
        $rm_dony->alamat = $alamat;
        $rm_dony->no_telepone = $no_telepone;
        $rm_dony->pekerjaan = $pekerjaan;
        $rm_dony->users_username = Auth::user()->username;
        $rm_dony->save();

        Alert::success('Succes!', 'Pasien Dokter Gigi Berhasil Ditambah!');
        return redirect('/admin/rekam-medik/dokter-gigi');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = RmDony::where('id', $id)->get();
        Session::put('no_pasien', $id);
        return view('admin.rm_dony.detail.index', compact('data'));
    }

    public function detail($id)
    {
        $no_pasien = Session::get('no_pasien');
        $data = RmDony::where('id', $no_pasien)->get();
        $catatan = CatatanPemeriksaanDony::where('uuid', $id)->get();
        $riwayat = RiwayatMedisDony::where('uuid', $id)->get();
        $odontogram = PemeriksaanOdontogram::where('uuid', $id)->get();

        return view('admin.rm_dony.detail.detail', compact('data', 'catatan', 'riwayat', 'odontogram'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = RmDony::where('id', $id)->get();
        return view('admin.rm_dony.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nama_kk = $request->input('nama_kk');
        $nama_pasien = $request->input('nama_pasien');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $tempat = $request->input('tempat');
        $tgl_lahir = $request->input('tgl_lahir');
        $alamat = $request->input('alamat');
        $no_telepone = $request->input('no_telepone');
        $pekerjaan = $request->input('pekerjaan');

        $rm_dony = RmDony::where('id', $id)->first();
    
        $rm_dony->nama_kk = $nama_kk;
        $rm_dony->nama_pasien = $nama_pasien;
        $rm_dony->jenis_kelamin = $jenis_kelamin;
        $rm_dony->tempat = $tempat;
        $rm_dony->tgl_lahir = $tgl_lahir;
        $rm_dony->alamat = $alamat;
        $rm_dony->no_telepone = $no_telepone;
        $rm_dony->pekerjaan = $pekerjaan;
        $rm_dony->save();

        Alert::success('Succes!', 'Pasien Gigi Berhasil Diubah!');
        return redirect('/admin/rekam-medik/dokter-gigi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
