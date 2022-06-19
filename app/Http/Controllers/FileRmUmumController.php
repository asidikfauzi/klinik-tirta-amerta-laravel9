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

class FileRmUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        //
        $data = RmUmum::where('users_no_pasien', $id)->get();
        $request->session()->put('id',$id);
        return view('admin.rm_umum.file.index', compact('data'));
    }

    public function getFileDataRmUmum(Request $request)
    {
        $id = $request->session()->get('id');
      
        $data = FileRmUmum::select('file_rm_umum.file_rm', DB::raw("DATE_FORMAT(file_rm_umum.created_at, '%d-%b-%Y') as pembuatan"))
                            ->where('rm_umum.users_no_pasien', $id)
                            ->orderBy('file_rm_umum.created_at', 'ASC')
                            ->join('rm_umum', 'rm_umum.id', '=', 'file_rm_umum.rm_umum_id');
                            
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('download', function($row){
                            return 
                            '<a href="'.route('admin.downloadfile.pasien.umum',$row->file_rm).'" style="color:blue;">'.$row->file_rm.'</a>';
                        })
                        ->rawColumns(['download'])
                        ->make(true);
        
    }

    public function download()
    {
        $download = RmUmumExport::getLinkDownloadUmum();
        return response()->download($download);
    }

    public function downloadFile($id)
    {
        $file = FileRmUmum::where('file_rm', $id)->first();
        $download = RmUmumExport::getLinkDownloadPasien($file->file_rm);
        return response()->download($download);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
