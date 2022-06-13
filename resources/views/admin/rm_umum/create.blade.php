@extends('layouts.login')

<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/button.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/app-klinik.css')}}">

@section('content')
<section class="content">
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Pasien') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.create.pasien.umum') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="no_pasien" class="col-md-4 col-form-label text-md-end">{{ __('No. Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="no_pasien" type="number"  maxlength="4"  class="form-control @error('no_pasien') is-invalid @enderror" name="no_pasien" value="{{ old('no_pasien')}}" required autocomplete="no_pasien" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}" required autocomplete="password" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="confirm_password" class="col-md-4 col-form-label text-md-end">{{ __('Confirm-Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="{{ old('confirm_password')}}" required autocomplete="confirm_password" autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="row mb-3">
                            <label for="nama_pasien" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="nama_pasien" type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" value="{{ old('nama_pasien') }}" required autocomplete="nama_pasien">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_bpjs" class="col-md-4 col-form-label text-md-end">{{ __('No. BPJS') }}</label>

                            <div class="col-md-6">
                                <input id="no_bpjs" type="number" class="form-control @error('no_bpjs') is-invalid @enderror" name="no_bpjs" value="{{ old('no_bpjs') }}" required autocomplete="no_bpjs">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ttl" class="col-md-4 col-form-label text-md-end">{{ __('Tempat, Tgl Lahir') }}</label>

                            <div class="col-md-3">
                                <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" required autocomplete="tempat">
                            </div>
                            <div class="col-md-3">
                                <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required autocomplete="tgl_lahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="umur" class="col-md-4 col-form-label text-md-end">{{ __('Umur') }}</label>

                            <div class="col-md-6">
                                <input id="umur" type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" required autocomplete="umur">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" required autocomplete="alamat">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_telepone" class="col-md-4 col-form-label text-md-end">{{ __('No. Telepone') }}</label>

                            <div class="col-md-6">
                                <input id="no_telepone" type="number" class="form-control" name="no_telepone" required autocomplete="no_telepone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status_perkawinan" class="col-md-4 col-form-label text-md-end">{{ __('Status Perkawinan') }}</label>

                            <div class="col-md-6">
                                <input id="status_perkawinan" type="text" class="form-control" name="status_perkawinan" required autocomplete="status_perkawinan">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="agama" class="col-md-4 col-form-label text-md-end">{{ __('Agama') }}</label>

                            <div class="col-md-6">
                                <input id="agama" type="text" class="form-control" name="agama" required autocomplete="agama">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-end">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" required autocomplete="pekerjaan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pendidikan" class="col-md-4 col-form-label text-md-end">{{ __('Pendidikan') }}</label>

                            <div class="col-md-6">
                                <input id="pendidikan" type="text" class="form-control" name="pendidikan" required autocomplete="pendidikan">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-1 offset-md-4">
                                <input class="button button-submit" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
