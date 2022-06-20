<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RmDony;
use App\Models\FileRmDony;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Export\RmUmumExport;
use Yajra\DataTables\DataTables;
use Alert;
use DB;

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
    {
        $data = RmDony::select('users.no_pasien', 'rm_drg_dony.id', 'rm_drg_dony.nama_kk','rm_drg_dony.nama_pasien', 'rm_drg_dony.jenis_kelamin', 'rm_drg_dony.tempat',
                                DB::raw("DATE_FORMAT(rm_drg_dony.tgl_lahir, '%d-%b-%Y') as tgl_lahir"), 'rm_drg_dony.alamat', 'rm_drg_dony.no_telepone', 
                                'rm_drg_dony.pekerjaan')
                        ->join('users', 'users.no_pasien', '=', 'rm_drg_dony.users_no_pasien')
                        ->orderBy('users.no_pasien', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('download', function($row){
                            return 
                            '<a href="'.route('admin.file.pasien.gigi', $row->no_pasien).'">
                            <i class="bi bi-eye" style="color:green;"></i></a>';
                        })
                        ->addColumn('aksi', function($row){
                            return 
                            '<a href="'.route('admin.edit.pasien.gigi', $row->no_pasien).'">
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
         $password = $request->input('password');
         $confirm_password = $request->input('confirm_password');
         $nama_kk = $request->input('nama_kk');
         $nama_pasien = $request->input('nama_pasien');
         $jenis_kelamin = $request->input('jenis_kelamin');
         $tempat = $request->input('tempat');
         $tgl_lahir = $request->input('tgl_lahir');
         $alamat = $request->input('alamat');
         $no_telepone = $request->input('no_telepone');
         $pekerjaan = $request->input('pekerjaan');
         
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
 
         $create = DB::transaction(function() use ($no_pasien, $password, $nama_pasien, $nama_kk, $tempat,
                                                    $tgl_lahir, $alamat, $no_telepone, $jenis_kelamin, $pekerjaan){
 
             $hashPassword = Hash::make($password);;
 
             $user = new User();
             $user->no_pasien = $no_pasien;
             $user->password = $hashPassword;
             $user->role = "rm_dony";
             $user->save();
 
             $rm_dony = new RmDony();
             $rm_dony->nama_kk = $nama_kk;
             $rm_dony->nama_pasien = $nama_pasien;
             $rm_dony->jenis_kelamin = $jenis_kelamin;
             $rm_dony->tempat = $tempat;
             $rm_dony->tgl_lahir = $tgl_lahir;;
             $rm_dony->alamat = $alamat;
             $rm_dony->no_telepone = $no_telepone;
             $rm_dony->pekerjaan = $pekerjaan;
             $rm_dony->users_no_pasien = $no_pasien;
             $rm_dony->save();
 
             return "Berhasil";
 
         });
 
         if($create)
         {
             Alert::success('Succes!', 'Pasien Dokter Gigi Berhasil Ditambah!');
             return redirect('/admin/rekam-medik/dokter-gigi');
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
        $data = RmDony::where('users_no_pasien', $id)->get();
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

        $rm_dony = RmDony::where('users_no_pasien', $id)->first();
    
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
