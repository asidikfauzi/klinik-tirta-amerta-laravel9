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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><b>{{ __('TAMBAH PASIEN REKAM MEDIK DOKTER UMUM') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.create.pasien.umum') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="no_pasien" class="col-md-4 col-form-label text-md-end">{{ __('No. Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="no_pasien" type="number"  maxlength="4"  class="form-control @error('no_pasien') is-invalid @enderror" name="no_pasien" placeholder="0000" value="{{ old('no_pasien')}}" required autocomplete="no_pasien" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="nama_pasien" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="nama_pasien" type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" placeholder="Nama Pasien" value="{{ old('nama_pasien') }}" required autocomplete="nama_pasien">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_bpjs" class="col-md-4 col-form-label text-md-end">{{ __('No. BPJS/KTP') }}</label>

                            <div class="col-md-6">
                                <input id="no_bpjs" type="number" class="form-control @error('no_bpjs') is-invalid @enderror" name="no_bpjs" placeholder="BPJS/KTP" value="{{ old('no_bpjs') }}" required autocomplete="no_bpjs">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ttl" class="col-md-4 col-form-label text-md-end">{{ __('Tempat, Tgl Lahir') }}</label>

                            <div class="col-md-3">
                                <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" placeholder="Tempat Lahir" required autocomplete="tempat">
                            </div>
                            <div class="col-md-3">
                                <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required autocomplete="tgl_lahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="umur" class="col-md-4 col-form-label text-md-end">{{ __('Umur') }}</label>

                            <div class="col-md-6">
                                <input id="umur" type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" placeholder="Umur Pasien" required autocomplete="umur">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Alamat Pasien" required autocomplete="alamat">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_telepone" class="col-md-4 col-form-label text-md-end">{{ __('No. Telepone') }}</label>

                            <div class="col-md-6">
                                <input id="no_telepone" type="number" class="form-control" name="no_telepone" placeholder="08xxxxxxxxxx" required autocomplete="no_telepone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status_perkawinan" class="col-md-4 col-form-label text-md-end">{{ __('Status Perkawinan') }}</label>

                            <div class="col-md-6">
                                <input id="status_perkawinan" type="text" class="form-control" name="status_perkawinan" placeholder="Menikah/Pernah Menikah/Belum Menikah" required autocomplete="status_perkawinan">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="agama" class="col-md-4 col-form-label text-md-end">{{ __('Agama') }}</label>

                            <div class="col-md-6">
                                <input id="agama" type="text" class="form-control" name="agama" placeholder="Islam/Kristen/Katolik/Hindu/Budha" required autocomplete="agama">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-end">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" placeholder="PNS/TNI/Polisi/BUMN/BUMD/Pegawai Swasta/Petani/Pedagang/Lainnya" required autocomplete="pekerjaan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pendidikan" class="col-md-4 col-form-label text-md-end">{{ __('Pendidikan') }}</label>

                            <div class="col-md-6">
                                <input id="pendidikan" type="text" class="form-control" name="pendidikan" placeholder="SD/SMP/SLTA/Diploma S1/S2/S3" required autocomplete="pendidikan">
                            </div>
                        </div>
                        {{-- <hr>
                        <div class="row mb-3">
                            <label for="nama_penanggung_jawab" class="col-md-4 col-form-label text-md-end">{{ __('Nama Penanggung Jawab') }}</label>

                            <div class="col-md-6">
                                <input id="nama_penanggung_jawab" type="text" class="form-control" name="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab" required autocomplete="nama_penanggung_jawab">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="umur_penanggung_jawab" class="col-md-4 col-form-label text-md-end">{{ __('Umur') }}</label>

                            <div class="col-md-6">
                                <input id="umur_penanggung_jawab" type="text" class="form-control" name="umur_penanggung_jawab" placeholder="Umur Penanggung Jawab" required autocomplete="umur_penanggung_jawab">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pekerjaan_penanggung_jawab" class="col-md-4 col-form-label text-md-end">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan_penanggung_jawab" type="text" class="form-control" name="pekerjaan_penanggung_jawab" placeholder="Pekerjaan Penanggung Jawab" required autocomplete="pekerjaan_penanggung_jawab">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hubungan_dengan_pasien" class="col-md-4 col-form-label text-md-end">{{ __('Hubungan Dengan Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="hubungan_dengan_pasien" type="text" class="form-control" name="hubungan_dengan_pasien" placeholder="Suami/Istri/Ibu/Ayah/Lainnya" required autocomplete="hubungan_dengan_pasien">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status_pasien" class="col-md-4 col-form-label text-md-end">{{ __('Status Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="status_pasien" type="text" class="form-control" name="status_pasien" placeholder="Umum/Bpjs/Assuransi/Perusahaan/Akses Lain" required autocomplete="status_pasien">
                            </div>
                        </div>
                        <hr>
                        <label for="asessment"><b>Asesmen Kebutuhan Informasi Dan Edukasi</b></label>
                        <div class="row mb-3 mt-3">
                            <label for="diberikan_edukasi" class="col-md-8 col-form-label text-md-end">{{ __('Apakah pasien memungkinkan untuk diberikan edukasi ?') }}</label>

                            <div class="col-md-2">
                                <input id="diberikan_edukasi" type="text" class="form-control" name="diberikan_edukasi" placeholder="Ya/Tidak" required autocomplete="diberikan_edukasi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="penerima_edukasi" class="col-md-4 col-form-label text-md-end">{{ __('Penerima Edukasi') }}</label>

                            <div class="col-md-6">
                                <input id="penerima_edukasi" type="text" class="form-control" name="penerima_edukasi" placeholder="Pasien/Lainnya..." required autocomplete="penerima_edukasi">
                            </div>
                        </div>
                        <hr>
                        <label for="asessment"><b>Pengkajian Dilakukan Pada Penerimaan Edukasi</b></label>
                        <div class="row mb-3 mt-3">
                            <label for="kondisi" class="col-md-4 col-form-label text-md-end">{{ __('Kondisi Saat Ini') }}</label>

                            <div class="col-md-6">
                                <input id="kondisi" type="text" class="form-control" name="kondisi" placeholder="Bicara/Normal/Pelatipelo/Gagap/Bisu" required autocomplete="penerima_edukasi">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="serangan_awal" class="col-md-7 col-form-label text-md-end">{{ __('Serangan Awal Gangguan Biacara Kapan ?') }}</label>

                            <div class="col-md-3">
                                <input id="serangan_awal" type="text" class="form-control" name="serangan_awal" placeholder="Bulan/Tahun" required autocomplete="diberikan_edukasi">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="bahasa_sehari_hari" class="col-md-4 col-form-label text-md-end">{{ __('Bahasa Sehari-hari') }}</label>

                            <div class="col-md-6">
                                <input id="bahasa_sehari_hari" type="text" class="form-control" name="bahasa_sehari_hari" placeholder="Indonesia/Daerah/Inggris/Lainnya" required autocomplete="penerima_edukasi">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="penterjemah" class="col-md-4 col-form-label text-md-end">{{ __('Perlu Penterjemah ?') }}</label>

                            <div class="col-md-6">
                                <input id="penterjemah" type="text" class="form-control" name="penterjemah" placeholder="Tidak/Ya, Bahasa" required autocomplete="penterjemah">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="bahasa_isyarat" class="col-md-4 col-form-label text-md-end">{{ __('Bahasa Isyarat') }}</label>

                            <div class="col-md-6">
                                <input id="bahasa_isyarat" type="text" class="form-control" name="bahasa_isyarat" placeholder="Ya/Tidak" required autocomplete="bahasa_isyarat">
                            </div>
                        </div> --}}

                        <div class="row">
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
