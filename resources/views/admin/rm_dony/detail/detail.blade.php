@extends('layouts.login')

<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/button.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/app-klinik.css')}}">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/button.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/app-klinik.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<section class="content">
<div class="container">
    <label class="col-md-2 col-form-label"><b>Identitas Pasien</b></label>
    <div class="row justify-content-center">   
        
        <div class="col-md-10">
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('No. Pasien') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->id}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Nama KK') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->nama_kk}}</label>
            </div>
            <div class="row ">
                <label class="col-md-2 col-form-label">{{ __('Nama Pasien') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->nama_pasien}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Jenis Kelamin') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->jenis_kelamin}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('TTL') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->tempat}}, {{date('d-m-Y', strtotime($data[0]->tgl_lahir))}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Alamat') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->alamat}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('No. Telepone') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->no_telepone}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Pekerjaan') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->pekerjaan}}</label>
            </div>
        </div>
    </div>
    <label class="col-md-2 col-form-label mt-3"><b>Riwayat Medis</b></label>
    <div class="row justify-content-center">   
        
        <div class="col-md-10">
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Golongan Darah') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->golongan_darah}}</label>
            </div>
            <div class="row ">
                <label class="col-md-2 col-form-label">{{ __('Tekanan Darah') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->tekanan_darah}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Penyakit Jantung') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->penyakit_jantung}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Asma') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->asma}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Diabetes') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->diabetes}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Haemophlia') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->haemophlia}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Hepatitis') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->hepatitis}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Gastritis') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->gastritis}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Penyakit Lainnya') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->penyakit_lainnya}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Alergi Obat') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->alergi_obat}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Alergi Makanan') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->alergi_makanan}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Asimetri Wajah') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->asimetri_wajah}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Relasi Bibir') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->relasi_bibir}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Tonus Bibir') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->tonus_bibir}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('TMJ') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->tmj}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Klenjar Limfe') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->klenjar_limfe}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Komplikasi') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->komplikasi}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Anamnesa') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->anamnesa}}</label>
            </div>
        </div>
    </div>
    <label class="col-md-3 col-form-label mt-3"><b>Pemeriksaan Odontogram</b></label>
    <div class="row justify-content-center">   
        
        <div class="col-md-10">
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('11 [51]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v11_51}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('61 [21]') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v61_21}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('12 [52]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v12_52}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('62 [21]') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v62_22}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('13 [53]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v13_53}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('63 [23]') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v63_23}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('14 [54]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v14_54}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('64 [24]') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v64_24}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('15 [55]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v15_55}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('65 [25]') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v61_21}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('16') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v16}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('26') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v26}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('17') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v17}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('27') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v61_21}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('18') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v11_51}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('28') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v61_21}}</label>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <img src="{{asset('assets/img/odontogram.png')}}" alt="" style="width: 50%;">
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('48') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v48}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('38') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v38}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('47') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v47}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('37') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v37}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('46') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v46}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('36') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v36}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('45 [85]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v45_85}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('[75] 35') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v75_35}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('44 [84]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v44_84}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('[74] 34') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v74_34}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('43 [83]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v43_83}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('[73] 33') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v73_33}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('42 [82]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v42_82}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('[72] 32') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v72_32}}</label>
                </div>
            </div>
            <div class="row">
                <label class="col-md-1 col-form-label">{{ __('41 [81]') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->v41_81}}</label>
                <div class="col-md-6">
                    <label class="col-md-2 col-form-label">{{ __('[71] 31') }}</label>
                    <label class="col-md-4 col-form-label">: {{$odontogram[0]->v71_31}}</label>
                </div>
            </div>
            <div class="row mt-4">
                <label class="col-md-2 col-form-label">{{ __('Occlusi') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->occlusi}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Torus Palatinus') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->torus_palatinus}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Torus Mandibularis') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->torus_mandiboluris}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Palatum') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->palatum}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Diastema') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->diastema}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Gigi Anomali') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->gigi_anomali}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Lain-lain') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->lain_lain}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('D') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->d}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('M') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->m}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('F') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->f}}</label>
            </div>
            <div class="row mb-3 mt-3">
                <img src="{{asset('assets/img/gigi_dony.png')}}" alt="" style="width: 25%;">
            </div>
            <div class="row">
                <table style="width: 50%;">
                    <tr>
                        <th>No</th>
                        <th>Pemeriksaan gigi yang diperiksa</th>
                        <th>Skor Debris Index</th>
                        <th>Skor Kalkulus Index</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Bukal Gigi 16</td>
                        <td>{{$odontogram[0]->skor_debris_bukal_gigi_16}}</td>
                        <td>{{$odontogram[0]->skor_kalkulus_bukal_gigi_16}}</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Bukal Gigi 26</td>
                        <td>{{$odontogram[0]->skor_debris_bukal_gigi_26}}</td>
                        <td>{{$odontogram[0]->skor_kalkulus_bukal_gigi_26}}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Lingual Gigi 36</td>
                        <td>{{$odontogram[0]->skor_debris_lingual_gigi_36}}</td>
                        <td>{{$odontogram[0]->skor_kalkulus_lingual_gigi_36}}</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Lingual Gigi 46</td>
                        <td>{{$odontogram[0]->skor_debris_lingual_gigi_46}}</td>
                        <td>{{$odontogram[0]->skor_kalkulus_lingual_gigi_46}}</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Labial Gigi 11</td>
                        <td>{{$odontogram[0]->skor_debris_labial_gigi_11}}</td>
                        <td>{{$odontogram[0]->skor_kalkulus_labial_gigi_11}}</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Labial Gigi 31</td>
                        <td>{{$odontogram[0]->skor_debris_labial_gigi_31}}</td>
                        <td>{{$odontogram[0]->skor_kalkulus_labial_gigi_31}}</td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Debris Index') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->debris_index}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Kalkulus Index') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->kalkulus_index}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Skor OHI-s') }}</label>
                <label class="col-md-4 col-form-label">: {{$odontogram[0]->skor_ohi}}</label>
            </div>
            <div class="row mb-3 mt-3">
                <img src="{{asset('assets/img/hasil.png')}}" alt="" style="width: 50%;">
            </div>
        </div>
    </div>
    <label class="col-md-2 col-form-label mt-3"><b>Catatan Perawatan</b></label>
    <div class="row justify-content-center">   
        
        <div class="col-md-10">
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Tanggal Pemeriksaan') }}</label>
                <label class="col-md-4 col-form-label">: {{date('d-M-Y', strtotime($catatan[0]->tgl))}}</label>
            </div>
            <div class="row ">
                <label class="col-md-2 col-form-label">{{ __('Diagnosa') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->diagnosa}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Therapy') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->therapy}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Keterangan') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->keterangan}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Dokter') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->dokter}}</label>
            </div>
        </div>
    </div>

</div>
</section>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


