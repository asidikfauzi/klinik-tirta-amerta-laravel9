<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RmUmum;
use App\Models\FileRmUmum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Export\RmUmumExport;
use Yajra\DataTables\DataTables;
use Alert;
use DB;

class RmUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.rm_umum.index');
    }

    public function getDataRmUmum()
    {
        $data = RmUmum::select('id', 'nama_pasien', 'no_bpjs_ktp', DB::raw("DATE_FORMAT(tgl_lahir, '%d-%b-%Y') as tgl_lahir"), 'alamat', 'no_telepone')
                        ->orderBy('id', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('download', function($row){
                            return 
                            '<a href="'.route('admin.file.pasien.umum', $row->id).'">
                            <i class="bi bi-eye" style="color:green;"></i></a>';
                        })
                        ->addColumn('aksi', function($row){
                            return 
                            '<a href="'.route('admin.edit.pasien.umum', $row->id).'">
                            <i class="bi bi-file-earmark-plus" style="color:green;"></i></a>
                            <a href="'.route('admin.edit.pasien.umum', $row->id).'">
                            <i class="bi bi-pencil-square" style="color:blue"></i></a>';
                        })
                        ->rawColumns(['download','aksi'])
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
        return view('admin.rm_umum.create');
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
        $no_pasien = $request->input('no_pasien');
        $nama_pasien = $request->input('nama_pasien');
        $no_bpjs = $request->input('no_bpjs');
        $tempat = $request->input('tempat');
        $tgl_lahir = $request->input('tgl_lahir');
        $umur = $request->input('umur');
        $alamat = $request->input('alamat');
        $no_telepone = $request->input('no_telepone');
        $status_perkawinan = $request->input('status_perkawinan');
        $agama = $request->input('agama');
        $pekerjaan = $request->input('pekerjaan');
        $pendidikan = $request->input('pendidikan');
        
        $data = RmUmum::where('id', $no_pasien)->get()->toArray();
        
        if(!empty($data))
        {
            return back()->with('failed', 'Nomor pasien sudah ada');
        }

        $rm_umum = new RmUmum();
        $rm_umum->id = $no_pasien;
        $rm_umum->nama_pasien = $nama_pasien;
        $rm_umum->no_bpjs_ktp = $no_bpjs;
        $rm_umum->tempat = $tempat;
        $rm_umum->tgl_lahir = $tgl_lahir;
        $rm_umum->umur = $umur;
        $rm_umum->alamat = $alamat;
        $rm_umum->no_telepone = $no_telepone;
        $rm_umum->status_perkawinan = $status_perkawinan;
        $rm_umum->agama = $agama;
        $rm_umum->pekerjaan = $pekerjaan;
        $rm_umum->pendidikan = $pendidikan;
        $rm_umum->users_username = Auth::user()->username;
        $rm_umum->save();

        Alert::success('Succes!', 'Pasien Dokter Umum Berhasil Ditambah!');
        return redirect('/admin/rekam-medik/dokter-umum');
        
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
         //
         $data = RmUmum::where('id', $id)->get();
         return view('admin.rm_umum.edit', compact('data'));
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
        $nama_pasien = $request->input('nama_pasien');
        $no_bpjs = $request->input('no_bpjs');
        $tempat = $request->input('tempat');
        $tgl_lahir = $request->input('tgl_lahir');
        $umur = $request->input('umur');
        $alamat = $request->input('alamat');
        $no_telepone = $request->input('no_telepone');
        $status_perkawinan = $request->input('status_perkawinan');
        $agama = $request->input('agama');
        $pekerjaan = $request->input('pekerjaan');
        $pendidikan = $request->input('pendidikan');
        
        $rm_umum = RmUmum::where('users_no_pasien', $id)->first();
    
        $rm_umum->nama_pasien = $nama_pasien;
        $rm_umum->no_bpjs_ktp = $no_bpjs;
        $rm_umum->tempat = $tempat;
        $rm_umum->tgl_lahir = $tgl_lahir;
        $rm_umum->umur = $umur;
        $rm_umum->alamat = $alamat;
        $rm_umum->no_telepone = $no_telepone;
        $rm_umum->status_perkawinan = $status_perkawinan;
        $rm_umum->agama = $agama;
        $rm_umum->pekerjaan = $pekerjaan;
        $rm_umum->pendidikan = $pendidikan;
        $rm_umum->save();


       
        Alert::success('Succes!', 'Pasien Umum Berhasil Diubah!');
        return redirect('/admin/rekam-medik/dokter-umum');
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
