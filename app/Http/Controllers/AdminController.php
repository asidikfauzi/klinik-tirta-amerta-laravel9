<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pasien::orderBy('created_at', 'desc')->get();
        return view('admin.index', compact('data'));
    }

    public function getData()
    {
        $data = Pasien::orderBy('created_at', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('aksi', function($row){
                            return 
                            '<a href="#">
                            <i class="bi bi-pencil-square" style="color:blue"></i> </a> 
                            <a class="btn-link-danger modal-deletetab1" href="#" data-id="'.$row->no_pasien.'">
                            <i class="bi bi-trash" style="color:red"></i> </a>';
                        })
                        ->rawColumns(['aksi'])
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
        $pasien->save();

        return back()->with('success', 'Pasien Berhasil Di Tambahkan');
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
