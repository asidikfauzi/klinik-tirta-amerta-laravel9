<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NonAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pasien::where('status', 'non-aktif')->orderBy('created_at', 'desc')->get();
        return view('admin.pasien_non-aktif.index', compact('data'));
    }

    public function getData()
    {
        $data = Pasien::where('status', 'non-aktif')->orderBy('created_at', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('aksi', function($row){
                            return 
                            '<a class="btn-link-danger modal-deletetab1" href="#" data-id="'.$row->no_pasien.'">
                            <i class="bi bi-person-check" style="color:green;"></i></i> </a>';
                        })
                        ->rawColumns(['aksi'])
                        ->make(true);
        
    }

    public function aktifkan($id)
    {
        //
        $data = Pasien::where('no_pasien', $id)->first();
        $data->status = "aktif";
        $data->save();
        return redirect('/admin/non-aktif');
    }
}
