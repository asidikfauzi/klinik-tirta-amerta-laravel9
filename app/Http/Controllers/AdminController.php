<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Alert;
use App\Models\RmUmum;
use App\Models\FileRmUmum;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Export\RmUmumExport;

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

   
}
