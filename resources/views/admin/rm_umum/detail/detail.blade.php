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
            <div class="row ">
                <label class="col-md-2 col-form-label">{{ __('Nama Pasien') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->nama_pasien}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('No. BPJS') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->no_bpjs_ktp}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('TTL') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->tempat}}, {{date('d-m-Y', strtotime($data[0]->tgl_lahir))}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Umur') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->umur}}</label>
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
                <label class="col-md-2 col-form-label">{{ __('Status') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->status_perkawinan}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Agama') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->agama}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Pendidikan') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->pendidikan}}</label>
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
                <label class="col-md-2 col-form-label">{{ __('Penanggung Jawab') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->nama_penanggung_jawab}}</label>
            </div>
            <div class="row ">
                <label class="col-md-2 col-form-label">{{ __('Umur') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->umur_penanggung_jawab}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Pekerjaan') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->pekerjaan_penanggung_jawab}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Hubungan') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->hubungan_dengan_pasien}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Status Pasien') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->status_pasien}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Diberikan Edukasi') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->diberikan_edukasi}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Penerima Edukasi') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->penerima_edukasi}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Serangan Awal') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->serangan_awal}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Kondisi') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->kondisi}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Bahasa Sehari-hari') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->bahasa_sehari_hari}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Penterjemah') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->penterjemah}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Bahasa Isyarat') }}</label>
                <label class="col-md-4 col-form-label">: {{$riwayat[0]->bahasa_isyarat}}</label>
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
                <label class="col-md-2 col-form-label">{{ __('Subjective') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->subjective}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Objective') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->objective}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Assasment') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->assasment}}</label>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('Planning') }}</label>
                <label class="col-md-4 col-form-label">: {{$catatan[0]->planning}}</label>
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


