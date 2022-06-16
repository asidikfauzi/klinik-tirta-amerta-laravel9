@extends('layouts.login')

<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/button.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/app-klinik.css')}}">

@section('content')
<section class="content">
<div class="container">
    <button onclick="window.location.href='{{route('admin.download.pasien.umum')}}'" class="button button-submit" style="float: right;"><i class="bi bi-download"></i> Download File</button>
    <div class="row justify-content-center mt-4">   
        <div class="col-md-12">
            <div class="row">
                <label class="col-md-2 col-form-label">{{ __('No. Pasien') }}</label>
                <label class="col-md-4 col-form-label">: {{$data[0]->users_no_pasien}}</label>
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
    <div class="row mt-4">
        <table id="table-pasien" class="display table-pasien stripe row-border order-column" style="width: 100%;" >
            <thead>
                <tr>
                    <th>Tgl</th>
                    <th>Link Download</th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
            </tbody>
        </table>
    </div>
</div>
</section>
@endsection
