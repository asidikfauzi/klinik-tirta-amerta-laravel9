<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Alert;
use App\Models\RmUmum;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function indexRmUmum()
    {
        return view('admin.rm_umum.index');
    }

    public function indexRmDony()
    {
        return view('admin.rm_dony.index');
    }
    

    // public function getData()
    // {
    //     $data = Pasien::where('status', 'aktif')->orderBy('created_at', 'DESC');
    //     return Datatables::of($data)->addIndexColumn()
    //                     ->addColumn('aksi', function($row){
    //                         return 
    //                         '<a href="'.route('admin-edit-pasien', $row->no_pasien).'">
    //                         <i class="bi bi-pencil-square" style="color:blue"></i></a> 
    //                         <a class="btn-link-danger modal-deletetab1" href="#" data-id="'.$row->no_pasien.'">
    //                         <i class="bi bi-person-x" style="color:red;"></i></i> </a>';
    //                     })
    //                     ->rawColumns(['aksi'])
    //                     ->make(true);
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Pasien::select('no_pasien')->orderBy('created_at', 'desc')->first();
        return view('admin.create', compact('data'));
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
        $no_pasien = $request->input("no_pasien");
        $nama = $request->input("nama");
        $umur = $request->input("umur");
        $alamat = $request->input("alamat");

        $data = Pasien::where('no_pasien', $no_pasien)->get()->toArray();
        if(!empty($data))
        {
            return back()->with('failed', 'No. Pasien Sudah Ada');
        }

        $pasien = new Pasien();
        $pasien->no_pasien = $no_pasien;
        $pasien->nama = $nama;
        $pasien->umur = $umur;
        $pasien->alamat = $alamat;
        $pasien->users_username = Auth::user()->username;
        $pasien->status = "aktif";
        $pasien->save();

        Alert::success('Succes!', 'Pasien Berhasil Ditambah!');
        return redirect()->route('admin.dashboard');
    }


    public function createPasienUmum()
    {
        //
   
        return view('admin.rm_umum.create');

    }

    public function storePasienUmum(Request $request)
    {
        $no_pasien = $request->input('no_pasien');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
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
        
        $data = User::where('no_pasien', $no_pasien)->get()->toArray();
        
            
        if(!empty($data))
        {
            return back()->with('failed', 'Nomor pasien sudah ada');
        }

        if(strlen($password) < 8)
        {
            return back()->with('failed', 'password minimal 8 karakter');
        }
        
        if($password != $confirm_password)
        {
            return back()->with('failed', 'Password tidak sama.');
        }

        $create = DB::transaction(function() use ($no_pasien, $password, $nama_pasien, $no_bpjs, $tempat,
                                                    $tgl_lahir, $umur, $alamat, $no_telepone, $status_perkawinan,
                                                    $agama, $pekerjaan, $pendidikan){

            $hashPassword = Hash::make($password);;

            $user = new User();
            $user->no_pasien = $no_pasien;
            $user->password = $hashPassword;
            $user->role = "rm_umum";
            $user->save();

            $rm_umum = new RmUmum();
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
            $rm_umum->file_rm = "Kosong";
            $rm_umum->users_no_pasien = $no_pasien;
            $rm_umum->save();

            return "Berhasil";

        });

        if($create)
        {
            Alert::success('Succes!', 'Pasien Dokter Umum Berhasil Ditambah!');
            return redirect('/admin/rekam-medik/dokter-umum');
        }

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
        $data = Pasien::where('no_pasien', $id)->where('status', 'aktif')->get();
        return view('admin.edit', compact('data'));
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
        $nama = $request->input("nama");
        $umur = $request->input("umur");
        $alamat = $request->input("alamat");

        $pasien = Pasien::where('no_pasien', $id)->first();
        
        $pasien->nama = $nama;
        $pasien->umur = $umur;
        $pasien->alamat = $alamat;
        $pasien->save();

        Alert::success('Succes!', 'Pasien Berhasil Diubah!');
        return redirect()->route('admin.dashboard');
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
        $data = Pasien::where('no_pasien', $id)->first();
        $data->status = "non-aktif";
        $data->save();
        return redirect('/admin/home');
    }
}
