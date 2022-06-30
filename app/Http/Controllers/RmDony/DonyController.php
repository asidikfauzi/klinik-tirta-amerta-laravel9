<?php

namespace App\Http\Controllers\RmDony;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RmDony;
use App\Models\CatatanPemeriksaanDony;
use App\Models\PemeriksaanOdontogram;
use App\Models\RiwayatMedisDony;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Export\RmUmumExport;
use Yajra\DataTables\DataTables;
use Alert;
use DB;
use App\Helper\Uuid;
use Session;

class DonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('rm_dony.index');
    }

    public function getDataRmDony()
    {
        $data = RmDony::select('id', 'nama_kk', 'nama_pasien', 'jenis_kelamin', 'tempat',
                                DB::raw("DATE_FORMAT(tgl_lahir, '%d-%b-%Y') as tgl_lahir"), 'alamat', 'no_telepone', 
                                'pekerjaan')
                        ->orderBy('id', 'DESC');
        return Datatables::of($data)->addIndexColumn()
                        ->addColumn('download', function($row){
                            return 
                            '<a href="'.route('dony.show', $row->id).'">
                            <i class="bi bi-eye" style="color:green;"></i></a>';
                        })
                        ->addColumn('aksi', function($row){
                            return 
                            '<a href="'.route('dony.create', $row->id).'">
                            <i class="bi bi-file-earmark-plus" style="color:green;"></i></a>';
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
                            '<a href="'.route('dony.detail', $row->uuid).'">
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
    public function create($id)
    {
        //
        $data = RmDony::where('id', $id)->first();
        return view('rm_dony.create', compact('data'));
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
        $golongan_darah = $request->input('golongan_darah');
        $tekanan_darah = $request->input('tekanan_darah');
        $penyakit_jantung = $request->input('penyakit_jantung');
        $asma = $request->input('asma');
        $diabetes = $request->input('diabetes');
        $haemophlia = $request->input('haemophlia');
        $hepatitis = $request->input('hepatitis');
        $gastritis = $request->input('gastritis');
        $penyakit_lainnya = $request->input('penyakit_lainnya');
        $alergi_obat = $request->input('alergi_obat');
        $alergi_makanan = $request->input('alergi_makanan');
        $asimetri_wajah = $request->input('asimetri_wajah');
        $relasi_bibir = $request->input('relasi_bibir');
        $tonus_bibir = $request->input('tonus_bibir');
        $tmj = $request->input('tmj');
        $klenjar_limfe = $request->input('klenjar_limfe');
        $komplikasi = $request->input('komplikasi');
        $anamnesa = $request->input('anamnesa');
        $asessment = $request->input('asessment');
        $v11_51 = $request->input('v11_51');
        $v61_21 = $request->input('v61_21');
        $v12_52 = $request->input('v12_52');
        $v62_22 = $request->input('v62_22');
        $v13_53 = $request->input('v13_53');
        $v63_23 = $request->input('v63_23');
        $v14_54 = $request->input('v14_54');
        $v64_24 = $request->input('v64_24');
        $v15_55 = $request->input('v15_55');
        $v65_25 = $request->input('v65_25');
        $v16 = $request->input('v16');
        $v26 = $request->input('v26');
        $v17 = $request->input('v17');
        $v27 = $request->input('v27');
        $v18 = $request->input('v18');
        $v28 = $request->input('v28');
        $v48 = $request->input('v48');
        $v38 = $request->input('v38');
        $v47 = $request->input('v47');
        $v37 = $request->input('v37');
        $v46 = $request->input('v46');
        $v36 = $request->input('v36');
        $v45_85 = $request->input('v45_85');
        $v45_85 = $request->input('v45_85');
        $v75_35 = $request->input('v75_35');
        $v44_84 = $request->input('v44_84');
        $v74_34 = $request->input('v74_34');
        $v43_83 = $request->input('v43_83');
        $v73_33 = $request->input('v73_33');
        $v42_82 = $request->input('v42_82');
        $v72_32 = $request->input('v72_32');
        $v41_81 = $request->input('v41_81');
        $v71_31 = $request->input('v71_31');
        $occlusi = $request->input('occlusi');
        $torus_palatinus = $request->input('torus_palatinus');
        $torus_mandiboluris = $request->input('torus_mandiboluris');
        $palatum = $request->input('palatum');
        $diastema = $request->input('diastema');
        $gigi_anomali = $request->input('gigi_anomali');
        $lain_lain = $request->input('lain_lain');
        $d = $request->input('d');
        $m = $request->input('m');
        $f = $request->input('f');
        $skor_debris_bukal_gigi_16 = $request->input('skor_debris_bukal_gigi_16');
        $skor_kalkulus_bukal_gigi_16 = $request->input('skor_kalkulus_bukal_gigi_16');
        $skor_debris_bukal_gigi_26 = $request->input('skor_debris_bukal_gigi_26');
        $skor_kalkulus_bukal_gigi_26 = $request->input('skor_kalkulus_bukal_gigi_26');
        $skor_debris_lingual_gigi_36 = $request->input('skor_debris_lingual_gigi_36');
        $skor_kalkulus_lingual_gigi_36 = $request->input('skor_kalkulus_lingual_gigi_36');
        $skor_debris_lingual_gigi_46 = $request->input('skor_debris_lingual_gigi_46');
        $skor_kalkulus_lingual_gigi_46 = $request->input('skor_kalkulus_lingual_gigi_46');
        $skor_debris_labial_gigi_11 = $request->input('skor_debris_labial_gigi_11');
        $skor_kalkulus_labial_gigi_11 = $request->input('skor_kalkulus_labial_gigi_11');
        $skor_debris_labial_gigi_31 = $request->input('skor_debris_labial_gigi_31');
        $skor_kalkulus_labial_gigi_31 = $request->input('skor_kalkulus_labial_gigi_31');
        $debris_index = $request->input('debris_index');
        $kalkulus_index = $request->input('kalkulus_index');
        $skor_ohi = $request->input('skor_ohi');
        $tgl = $request->input('tgl');
        $diagnosa = $request->input('diagnosa');
        $therapy = $request->input('therapy');
        $assasment = $request->input('assasment');
        $keterangan = $request->input('keterangan');
        $dokter = $request->input('dokter');

        $create = DB::transaction(function() use($id, $golongan_darah, $tekanan_darah, $penyakit_jantung, $asma,
                                    $diabetes, $haemophlia, $hepatitis, $gastritis, $penyakit_lainnya, $alergi_obat,
                                    $alergi_makanan, $asimetri_wajah, $relasi_bibir, $tonus_bibir, $tmj, $klenjar_limfe,
                                    $komplikasi, $anamnesa, $v11_51, $v61_21, $v12_52, $v62_22, $v13_53, $v63_23, $v14_54,
                                    $v64_24, $v15_55, $v65_25, $v16, $v26, $v17, $v27, $v18, $v28, $v48, $v38, $v47, $v37,
                                    $v46, $v36, $v45_85, $v75_35, $v44_84, $v74_34, $v43_83, $v73_33, $v42_82, $v72_32, $v41_81,
                                    $v71_31, $occlusi, $torus_palatinus, $torus_mandiboluris, $palatum, $diastema, $gigi_anomali, $lain_lain,
                                    $d, $m, $f, $skor_debris_bukal_gigi_16, $skor_debris_bukal_gigi_26, $skor_debris_labial_gigi_11,
                                    $skor_debris_labial_gigi_31, $skor_debris_lingual_gigi_36, $skor_debris_lingual_gigi_46,
                                    $skor_kalkulus_bukal_gigi_16, $skor_kalkulus_bukal_gigi_26, $skor_kalkulus_labial_gigi_11,
                                    $skor_kalkulus_labial_gigi_31, $skor_kalkulus_lingual_gigi_36, $skor_kalkulus_lingual_gigi_46,
                                    $debris_index, $kalkulus_index, $skor_ohi,$tgl, $diagnosa, $therapy, $keterangan, $dokter){
        
            $uuid = Uuid::getId();
            
            $riwayat = new RiwayatMedisDony();
            $riwayat->golongan_darah = $golongan_darah;
            $riwayat->tekanan_darah = $tekanan_darah;
            $riwayat->penyakit_jantung = $penyakit_jantung;
            $riwayat->asma = $asma;
            $riwayat->diabetes = $diabetes;
            $riwayat->haemophlia = $haemophlia;
            $riwayat->hepatitis = $hepatitis;
            $riwayat->gastritis = $gastritis;
            $riwayat->penyakit_lainnya = $penyakit_lainnya;
            $riwayat->alergi_obat = $alergi_obat;
            $riwayat->alergi_makanan = $alergi_makanan;
            $riwayat->asimetri_wajah = $asimetri_wajah;
            $riwayat->relasi_bibir = $relasi_bibir;
            $riwayat->tonus_bibir = $tonus_bibir;
            $riwayat->tmj = $tmj;
            $riwayat->klenjar_limfe = $klenjar_limfe;
            $riwayat->komplikasi = $komplikasi;
            $riwayat->anamnesa = $anamnesa;
            $riwayat->rm_drg_dony_id = $id;
            $riwayat->uuid = $uuid;
            $riwayat->save();

            $odontogram = new PemeriksaanOdontogram();
            $odontogram->v11_51 = $v11_51;
            $odontogram->v61_21 = $v61_21;
            $odontogram->v12_52 = $v12_52;
            $odontogram->v62_22 = $v62_22;
            $odontogram->v13_53 = $v13_53;
            $odontogram->v63_23 = $v63_23;
            $odontogram->v14_54 = $v14_54;
            $odontogram->v64_24 = $v64_24;
            $odontogram->v15_55 = $v15_55;
            $odontogram->v65_25 = $v65_25;
            $odontogram->v16 = $v16;
            $odontogram->v26 = $v26;
            $odontogram->v17 = $v17;
            $odontogram->v27 = $v27;
            $odontogram->v18 = $v18;
            $odontogram->v28 = $v28;
            $odontogram->v48 = $v48;
            $odontogram->v38 = $v38;
            $odontogram->v47 = $v47;
            $odontogram->v37 = $v37;
            $odontogram->v46 = $v46;
            $odontogram->v36 = $v36;
            $odontogram->v45_85 = $v45_85;
            $odontogram->v75_35 = $v75_35;
            $odontogram->v44_84 = $v44_84;
            $odontogram->v74_34 = $v74_34;
            $odontogram->v43_83 = $v43_83;
            $odontogram->v73_33 = $v73_33;
            $odontogram->v42_82 = $v42_82;
            $odontogram->v72_32 = $v72_32;
            $odontogram->v41_81 = $v41_81;
            $odontogram->v71_31 = $v71_31;
            $odontogram->occlusi = $occlusi;
            $odontogram->torus_palatinus = $torus_palatinus;
            $odontogram->torus_mandiboluris = $torus_mandiboluris;
            $odontogram->palatum = $palatum;
            $odontogram->diastema = $diastema;
            $odontogram->gigi_anomali = $gigi_anomali;
            $odontogram->lain_lain = $lain_lain;
            $odontogram->d = $d;
            $odontogram->m = $m;
            $odontogram->f = $f;
            $odontogram->skor_debris_bukal_gigi_16 = $skor_debris_bukal_gigi_16;
            $odontogram->skor_kalkulus_bukal_gigi_16 = $skor_kalkulus_bukal_gigi_16;
            $odontogram->skor_debris_bukal_gigi_26 = $skor_debris_bukal_gigi_26;
            $odontogram->skor_kalkulus_bukal_gigi_26 = $skor_kalkulus_bukal_gigi_26;
            $odontogram->skor_debris_lingual_gigi_36 = $skor_debris_lingual_gigi_36;
            $odontogram->skor_kalkulus_lingual_gigi_36 = $skor_kalkulus_lingual_gigi_36;
            $odontogram->skor_debris_lingual_gigi_46 = $skor_debris_lingual_gigi_46;
            $odontogram->skor_kalkulus_lingual_gigi_46 = $skor_kalkulus_lingual_gigi_46;
            $odontogram->skor_debris_labial_gigi_11 = $skor_debris_labial_gigi_11;
            $odontogram->skor_kalkulus_labial_gigi_11 = $skor_kalkulus_labial_gigi_11;
            $odontogram->skor_debris_labial_gigi_31 = $skor_debris_labial_gigi_31;
            $odontogram->skor_kalkulus_labial_gigi_31 = $skor_kalkulus_labial_gigi_31;
            $odontogram->debris_index = $debris_index;
            $odontogram->kalkulus_index = $kalkulus_index;
            $odontogram->skor_ohi = $skor_ohi;
            $odontogram->rm_drg_dony_id = $id;
            $odontogram->uuid = $uuid;
            $odontogram->save();

            $catatan = new CatatanPemeriksaanDony();
            $catatan->tgl = $tgl;
            $catatan->diagnosa = $diagnosa;
            $catatan->therapy = $therapy;
            $catatan->keterangan = $keterangan;
            $catatan->dokter = $dokter;
            $catatan->rm_drg_dony_id = $id;
            $catatan->uuid = $uuid;
            $catatan->save();

            return "Berhasil";
        });

        if($create)
        {
            Alert::success('Success!', 'Rekam Medik Pasien Berhasil Ditambahkan!');
            return redirect('/rm-gigi/rekam-medik/dokter-gigi');
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
        $data = RmDony::where('id', $id)->get();
        Session::put('no_pasien', $id);
        return view('rm_dony.detail.index', compact('data'));
    }

    public function detail($id)
    {
        $no_pasien = Session::get('no_pasien');
        $data = RmDony::where('id', $no_pasien)->get();
        $catatan = CatatanPemeriksaanDony::where('uuid', $id)->get();
        $riwayat = RiwayatMedisDony::where('uuid', $id)->get();
        $odontogram = PemeriksaanOdontogram::where('uuid', $id)->get();
        return view('rm_dony.detail.detail', compact('data', 'catatan', 'riwayat', 'odontogram'));

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
