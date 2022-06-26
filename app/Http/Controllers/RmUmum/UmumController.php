<?php

namespace App\Http\Controllers\RmUmum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RmUmum;
use App\Models\RiwayatMedisUmum;
use App\Models\CatatanPemeriksaanUmum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Export\RmUmumExport;
use Yajra\DataTables\DataTables;
use Alert;
use DB;

class UmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('rm_umum.index');
    }

    public function getDataRmUmum()
    {
        $data = RmUmum::select('id', 'nama_pasien', 'no_bpjs_ktp', DB::raw("DATE_FORMAT(tgl_lahir, '%d-%b-%Y') as tgl_lahir"), 'alamat', 'no_telepone')
                        ->orderBy('id', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('download', function($row){
                            return 
                            '<a href="#">
                            <i class="bi bi-eye" style="color:green;"></i></a>';
                        })
                        ->addColumn('aksi', function($row){
                            return 
                            '<a href="'.route('umum.create', $row->id).'">
                            <i class="bi bi-file-earmark-plus" style="color:green;"></i></a>';
                        })
                        ->rawColumns(['download','aksi'])
                        ->make(true);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $data = RmUmum::where('id', $id)->first();
        return view('rm_umum.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        // $id = $request->input('id');
        $nama_penanggung_jawab = $request->input('nama_penanggung_jawab');
        $umur_penanggung_jawab = $request->input('umur_penanggung_jawab');
        $pekerjaan_penanggung_jawab = $request->input('pekerjaan_penanggung_jawab');
        $hubungan_dengan_pasien = $request->input('hubungan_dengan_pasien');
        $status_pasien = $request->input('status_pasien');
        $diberikan_edukasi = $request->input('diberikan_edukasi');
        $penerima_edukasi = $request->input('penerima_edukasi');
        $kondisi = $request->input('kondisi');
        $serangan_awal = $request->input('serangan_awal');
        $bahasa_sehari_hari = $request->input('bahasa_sehari_hari');
        $penterjemah = $request->input('penterjemah');
        $bahasa_isyarat = $request->input('bahasa_isyarat');
        $tgl = $request->input('tgl');
        $subjective = $request->input('subjective');
        $objective = $request->input('objective');
        $assasment = $request->input('assasment');
        $planning = $request->input('planning');
        $dokter = $request->input('dokter');

        $create = DB::transaction(function() use($id,$nama_penanggung_jawab, $umur_penanggung_jawab,
                $pekerjaan_penanggung_jawab, $hubungan_dengan_pasien, $status_pasien, $diberikan_edukasi,
                $penerima_edukasi, $kondisi, $serangan_awal, $bahasa_sehari_hari, $penterjemah,
                $bahasa_isyarat, $tgl, $subjective, $objective, $assasment, $planning, $dokter){
            
            $riwayat = new RiwayatMedisUmum();
            $riwayat->nama_penanggung_jawab = $nama_penanggung_jawab;
            $riwayat->umur_penanggung_jawab = $umur_penanggung_jawab;
            $riwayat->pekerjaan_penanggung_jawab = $pekerjaan_penanggung_jawab;
            $riwayat->hubungan_dengan_pasien = $hubungan_dengan_pasien;
            $riwayat->status_pasien = $status_pasien;
            $riwayat->diberikan_edukasi = $diberikan_edukasi;
            $riwayat->penerima_edukasi = $penerima_edukasi;
            $riwayat->kondisi =  $kondisi;
            $riwayat->serangan_awal = $serangan_awal;
            $riwayat->bahasa_sehari_hari = $bahasa_sehari_hari;
            $riwayat->penterjemah = $penterjemah;
            $riwayat->bahasa_isyarat = $bahasa_isyarat;
            $riwayat->rm_umum_id = $id;
            $riwayat->save();

            $catatan = new CatatanPemeriksaanUmum();
            $catatan->tgl = $tgl;
            $catatan->subjective = $subjective;
            $catatan->objective = $objective;
            $catatan->assasment = $assasment;
            $catatan->planning = $planning;
            $catatan->dokter = $dokter;
            $catatan->rm_umum_id = $id;
            $catatan->save();

            return 'Berhasil';
        });

        if($create)
        {
            Alert::success('Success!', 'Rekam Medik Pasien Berhasil Ditambahkan!');
            return redirect('/rm-umum/rekam-medik/dokter-umum');
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
