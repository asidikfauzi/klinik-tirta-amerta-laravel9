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
                <div class="card-header"><b>{{ __('REKAM MEDIK DOKTER GIGI') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dony.create',$data->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="no_pasien" class="col-md-4 col-form-label text-md-end">{{ __('No. Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="no_pasien" type="number"  maxlength="4"  class="form-control @error('no_pasien') is-invalid @enderror" name="no_pasien" value="{{ $data->id }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_kk" class="col-md-4 col-form-label text-md-end">{{ __('Nama KK') }}</label>

                            <div class="col-md-6">
                                <input id="nama_kk" type="text" class="form-control @error('nama_kk') is-invalid @enderror" name="nama_kk" value="{{ $data->nama_kk }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_pasien" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="nama_pasien" type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" value="{{ $data->nama_pasien }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="nama_pasien" value="{{ $data->jenis_kelamin }}" readonly>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ttl" class="col-md-4 col-form-label text-md-end">{{ __('Tempat, Tgl Lahir') }}</label>

                            <div class="col-md-3">
                                <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ $data->tempat }}" readonly>
                            </div>
                            <div class="col-md-3">
                                <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ $data->tgl_lahir }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_telepone" class="col-md-4 col-form-label text-md-end">{{ __('No. Telepone') }}</label>

                            <div class="col-md-6">
                                <input id="no_telepone" type="number" class="form-control" name="no_telepone" value="{{ $data->no_telepone }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-end">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" readonly>
                            </div>
                        </div>
                        <hr>
                        <label for="asessment"><b>Riwayat Medis</b></label>
                        <div class="row mb-3 mt-3">
                            <label for="golongan_darah" class="col-md-4 col-form-label text-md-end">{{ __('Golongan Darah') }}</label>

                            <div class="col-md-6">
                                <input id="golongan_darah" type="text" class="form-control" name="golongan_darah" placeholder="A/B/AB/O Rhesus:+/-" required autocomplete="golongan_darah">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tekanan_darah" class="col-md-4 col-form-label text-md-end">{{ __('Tekanan Darah') }}</label>

                            <div class="col-md-6">
                                <input id="tekanan_darah" type="text" class="form-control" name="tekanan_darah" placeholder=".../... mmHg Hipertensi/Hypotensi/Normal" required autocomplete="tekanan_darah">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="penyakit_jantung" class="col-md-4 col-form-label text-md-end">{{ __('Penyakit Jantung') }}</label>

                            <div class="col-md-6">
                                <input id="penyakit_jantung" type="text" class="form-control" name="penyakit_jantung" placeholder="Ada/Tidak Ada" required autocomplete="penyakit_jantung">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="asma" class="col-md-4 col-form-label text-md-end">{{ __('Asma') }}</label>

                            <div class="col-md-6">
                                <input id="asma" type="text" class="form-control" name="asma" placeholder="Ada/Tidak Ada" required autocomplete="asma">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="diabetes" class="col-md-4 col-form-label text-md-end">{{ __('Diabetes') }}</label>

                            <div class="col-md-6">
                                <input id="diabetes" type="text" class="form-control" name="diabetes" placeholder="Ada/Tidak Ada" required autocomplete="diabetes">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="haemophlia" class="col-md-4 col-form-label text-md-end">{{ __('Haemophlia') }}</label>

                            <div class="col-md-6">
                                <input id="haemophlia" type="text" class="form-control" name="haemophlia" placeholder="Ada/Tidak Ada" required autocomplete="haemophlia">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hepatitis" class="col-md-4 col-form-label text-md-end">{{ __('Hepatitis') }}</label>

                            <div class="col-md-6">
                                <input id="hepatitis" type="text" class="form-control" name="hepatitis" placeholder="Ada/Tidak Ada" required autocomplete="hepatitis">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gastritis" class="col-md-4 col-form-label text-md-end">{{ __('Gastritis') }}</label>

                            <div class="col-md-6">
                                <input id="gastritis" type="text" class="form-control" name="gastritis" placeholder="Ada/Tidak Ada" required autocomplete="gastritis">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="penyakit_lainnya" class="col-md-4 col-form-label text-md-end">{{ __('Penyakit Lainnya') }}</label>

                            <div class="col-md-6">
                                <input id="penyakit_lainnya" type="text" class="form-control" name="penyakit_lainnya" placeholder="Penyakit Lainnya" required autocomplete="penyakit_lainnya">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alergi_obat" class="col-md-4 col-form-label text-md-end">{{ __('Alergi Obat') }}</label>

                            <div class="col-md-6">
                                <input id="alergi_obat" type="text" class="form-control" name="alergi_obat" placeholder="Alergi Obat" required autocomplete="alergi_obat">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alergi_makanan" class="col-md-4 col-form-label text-md-end">{{ __('Alergi Makanan') }}</label>

                            <div class="col-md-6">
                                <input id="alergi_makanan" type="text" class="form-control" name="alergi_makanan" placeholder="Alergi Makanan" required autocomplete="alergi_makanan">
                            </div>
                        </div>
                        <hr>
                        <label for="asessment"><b>Pemeriksaan Ekstra Oral</b></label>
                        <div class="row mb-3 mt-3">
                            <label for="asimetri_wajah" class="col-md-4 col-form-label text-md-end">{{ __('Asimetri Wajah') }}</label>

                            <div class="col-md-6">
                                <input id="asimetri_wajah" type="text" class="form-control" name="asimetri_wajah" placeholder="Simetri/Asimetri" required autocomplete="asimetri_wajah">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="relasi_bibir" class="col-md-4 col-form-label text-md-end">{{ __('Relasi Bibir') }}</label>

                            <div class="col-md-6">
                                <input id="relasi_bibir" type="text" class="form-control" name="relasi_bibir" placeholder="Kompeten/Inkompeten" required autocomplete="relasi_bibir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tonus_bibir" class="col-md-4 col-form-label text-md-end">{{ __('Tonus Bibir') }}</label>

                            <div class="col-md-6">
                                <input id="tonus_bibir" type="text" class="form-control" name="tonus_bibir" placeholder="Hypotonus/Normal/Hypertonus" required autocomplete="tonus_bibir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tmj" class="col-md-4 col-form-label text-md-end">{{ __('TMJ') }}</label>

                            <div class="col-md-6">
                                <input id="tmj" type="text" class="form-control" name="tmj" placeholder="Normal/Ada Kelainan..." required autocomplete="tmj">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="klenjar_limfe" class="col-md-4 col-form-label text-md-end">{{ __('Kelenjar Limfe') }}</label>

                            <div class="col-md-6">
                                <input id="klenjar_limfe" type="text" class="form-control" name="klenjar_limfe" placeholder="Teraba/Teraba Sakit/Tidak Teraba" required autocomplete="klenjar_limfe">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="komplikasi" class="col-md-4 col-form-label text-md-end">{{ __('Komplikasi Pada Tindakan Dental Medis Sebelumnya') }}</label>

                            <div class="col-md-6">
                                <textarea id="komplikasi" class="form-control" name="komplikasi" rows="3" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="anamnesa" class="col-md-4 col-form-label text-md-end">{{ __('Anamnesa') }}</label>

                            <div class="col-md-6">
                                <textarea id="anamnesa" class="form-control" name="anamnesa" rows="3" cols="50"></textarea>
                            </div>
                        </div>
                        <hr>
                        <label for="asessment"><b>Formulir Pemeriksaan Odontogram</b></label>
                        <div class="row mb-3 mt-3">
                            <label for="11_51" class="col-md-2 col-form-label text-md-end">{{ __('11 [51]') }}</label>

                            <div class="col-md-4">
                                <input id="11_51" type="text" class="form-control" name="v11_51" placeholder="" required autocomplete="11_51">
                            </div>

                            <div class="col-md-4">
                                <input id="61_21" type="text" class="form-control" name="v61_21" placeholder="" required autocomplete="61_21">
                            </div>
                            <label for="61_21" class="col-md-1 col-form-label text-md-end">{{ __('[61] 21') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="12_52" class="col-md-2 col-form-label text-md-end">{{ __('12 [52]') }}</label>

                            <div class="col-md-4">
                                <input id="12_52" type="text" class="form-control" name="v12_52" placeholder="" required autocomplete="12_52">
                            </div>

                            <div class="col-md-4">
                                <input id="62_22" type="text" class="form-control" name="v62_22" placeholder="" required autocomplete="62_22">
                            </div>
                            <label for="62_22" class="col-md-1 col-form-label text-md-end">{{ __('[62] 22') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="13_53" class="col-md-2 col-form-label text-md-end">{{ __('13 [53]') }}</label>

                            <div class="col-md-4">
                                <input id="13_53" type="text" class="form-control" name="v13_53" placeholder="" required autocomplete="13_53">
                            </div>

                            <div class="col-md-4">
                                <input id="63_23" type="text" class="form-control" name="v63_23" placeholder="" required autocomplete="63_23">
                            </div>
                            <label for="63_23" class="col-md-1 col-form-label text-md-end">{{ __('[63] 23') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="14_54" class="col-md-2 col-form-label text-md-end">{{ __('14 [54]') }}</label>

                            <div class="col-md-4">
                                <input id="14_54" type="text" class="form-control" name="v14_54" placeholder="" required autocomplete="14_54">
                            </div>

                            <div class="col-md-4">
                                <input id="64_24" type="text" class="form-control" name="v64_24" placeholder="" required autocomplete="64_24">
                            </div>
                            <label for="64_24" class="col-md-1 col-form-label text-md-end">{{ __('[64] 24') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="15_55" class="col-md-2 col-form-label text-md-end">{{ __('15 [55]') }}</label>

                            <div class="col-md-4">
                                <input id="15_55" type="text" class="form-control" name="v15_55" placeholder="" required autocomplete="15_55">
                            </div>

                            <div class="col-md-4">
                                <input id="65_25" type="text" class="form-control" name="v65_25" placeholder="" required autocomplete="65_25">
                            </div>
                            <label for="65_25" class="col-md-1 col-form-label text-md-end">{{ __('[65] 25') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="16" class="col-md-2 col-form-label text-md-end">{{ __('16') }}</label>

                            <div class="col-md-4">
                                <input id="16" type="text" class="form-control" name="v16" placeholder="" required autocomplete="16">
                            </div>

                            <div class="col-md-4">
                                <input id="26" type="text" class="form-control" name="v26" placeholder="" required autocomplete="26">
                            </div>
                            <label for="26" class="col-md-1 col-form-label text-md-end">{{ __('26') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="17" class="col-md-2 col-form-label text-md-end">{{ __('17') }}</label>

                            <div class="col-md-4">
                                <input id="17" type="text" class="form-control" name="v17" placeholder="" required autocomplete="17">
                            </div>

                            <div class="col-md-4">
                                <input id="27" type="text" class="form-control" name="v27" placeholder="" required autocomplete="27">
                            </div>
                            <label for="27" class="col-md-1 col-form-label text-md-end">{{ __('27') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="18" class="col-md-2 col-form-label text-md-end">{{ __('18') }}</label>

                            <div class="col-md-4">
                                <input id="18" type="text" class="form-control" name="v18" placeholder="" required autocomplete="18">
                            </div>

                            <div class="col-md-4">
                                <input id="28" type="text" class="form-control" name="v28" placeholder="" required autocomplete="28">
                            </div>
                            <label for="28" class="col-md-1 col-form-label text-md-end">{{ __('28') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <img src="{{asset('assets/img/odontogram.png')}}" alt="" style="width: 60%; margin:auto;">
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="48" class="col-md-2 col-form-label text-md-end">{{ __('48') }}</label>

                            <div class="col-md-4">
                                <input id="48" type="text" class="form-control" name="v48" placeholder="" required autocomplete="48">
                            </div>

                            <div class="col-md-4">
                                <input id="38" type="text" class="form-control" name="v38" placeholder="" required autocomplete="38">
                            </div>
                            <label for="38" class="col-md-1 col-form-label text-md-end">{{ __('38') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="47" class="col-md-2 col-form-label text-md-end">{{ __('47') }}</label>

                            <div class="col-md-4">
                                <input id="47" type="text" class="form-control" name="v47" placeholder="" required autocomplete="47">
                            </div>

                            <div class="col-md-4">
                                <input id="37" type="text" class="form-control" name="v37" placeholder="" required autocomplete="37">
                            </div>
                            <label for="37" class="col-md-1 col-form-label text-md-end">{{ __('37') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="46" class="col-md-2 col-form-label text-md-end">{{ __('46') }}</label>

                            <div class="col-md-4">
                                <input id="46" type="text" class="form-control" name="v46" placeholder="" required autocomplete="46">
                            </div>

                            <div class="col-md-4">
                                <input id="36" type="text" class="form-control" name="v36" placeholder="" required autocomplete="36">
                            </div>
                            <label for="36" class="col-md-1 col-form-label text-md-end">{{ __('36') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="45_85" class="col-md-2 col-form-label text-md-end">{{ __('45 [85]') }}</label>

                            <div class="col-md-4">
                                <input id="45_85" type="text" class="form-control" name="v45_85" placeholder="" required autocomplete="45_85">
                            </div>

                            <div class="col-md-4">
                                <input id="75_35" type="text" class="form-control" name="v75_35" placeholder="" required autocomplete="75_35">
                            </div>
                            <label for="75_35" class="col-md-1 col-form-label text-md-end">{{ __('[75] 35') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="44_84" class="col-md-2 col-form-label text-md-end">{{ __('44 [84]') }}</label>

                            <div class="col-md-4">
                                <input id="44_84" type="text" class="form-control" name="v44_84" placeholder="" required autocomplete="44_84">
                            </div>

                            <div class="col-md-4">
                                <input id="74_34" type="text" class="form-control" name="v74_34" placeholder="" required autocomplete="74_34">
                            </div>
                            <label for="74_34" class="col-md-1 col-form-label text-md-end">{{ __('[74] 34') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="43_83" class="col-md-2 col-form-label text-md-end">{{ __('43 [83]') }}</label>

                            <div class="col-md-4">
                                <input id="43_83" type="text" class="form-control" name="v43_83" placeholder="" required autocomplete="43_83">
                            </div>

                            <div class="col-md-4">
                                <input id="73_33" type="text" class="form-control" name="v73_33" placeholder="" required autocomplete="73_33">
                            </div>
                            <label for="73_33" class="col-md-1 col-form-label text-md-end">{{ __('[73] 33') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="42_82" class="col-md-2 col-form-label text-md-end">{{ __('42 [82]') }}</label>

                            <div class="col-md-4">
                                <input id="42_82" type="text" class="form-control" name="v42_82" placeholder="" required autocomplete="42_82">
                            </div>

                            <div class="col-md-4">
                                <input id="72_32" type="text" class="form-control" name="v72_32" placeholder="" required autocomplete="72_32">
                            </div>
                            <label for="72_32" class="col-md-1 col-form-label text-md-end">{{ __('[72] 32') }}</label>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="41_81" class="col-md-2 col-form-label text-md-end">{{ __('41 [81]') }}</label>

                            <div class="col-md-4">
                                <input id="41_81" type="text" class="form-control" name="v41_81" placeholder="" required autocomplete="41_81">
                            </div>

                            <div class="col-md-4">
                                <input id="71_31" type="text" class="form-control" name="v71_31" placeholder="" required autocomplete="71_31">
                            </div>
                            <label for="71_31" class="col-md-1 col-form-label text-md-end">{{ __('[71] 31') }}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="occlusi" class="col-md-4 col-form-label text-md-end">{{ __('Occlusi') }}</label>

                            <div class="col-md-6">
                                <input id="occlusi" type="text" class="form-control @error('occlusi') is-invalid @enderror" name="occlusi" placeholder="Normal Bite/Cross Bite/Steep Bite" value="{{ old('occlusi') }}" required autocomplete="occlusi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="torus_palatinus" class="col-md-4 col-form-label text-md-end">{{ __('Torus Palatinus') }}</label>

                            <div class="col-md-6">
                                <input id="torus_palatinus" type="text" class="form-control @error('torus_palatinus') is-invalid @enderror" name="torus_palatinus" placeholder="Tidak Ada/Kecil/Sedang/Besar/Multiple" value="{{ old('torus_palatinus') }}" required autocomplete="torus_palatinus">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="torus_mandiboluris" class="col-md-4 col-form-label text-md-end">{{ __('Torus Mandiboluris') }}</label>

                            <div class="col-md-6">
                                <input id="torus_mandiboluris" type="text" class="form-control @error('torus_mandiboluris') is-invalid @enderror" name="torus_mandiboluris" placeholder="Tidak Ada/Sisi Kiri/Sisi Kanan/Kedua Sisi" value="{{ old('torus_mandiboluris') }}" required autocomplete="torus_mandiboluris">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="palatum" class="col-md-4 col-form-label text-md-end">{{ __('Palatum') }}</label>

                            <div class="col-md-6">
                                <input id="palatum" type="text" class="form-control @error('palatum') is-invalid @enderror" name="palatum" placeholder="Dalam/Sedang/Rendah" value="{{ old('palatum') }}" required autocomplete="palatum">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="diastema" class="col-md-4 col-form-label text-md-end">{{ __('Diastema') }}</label>

                            <div class="col-md-6">
                                <input id="diastema" type="text" class="form-control @error('diastema') is-invalid @enderror" name="diastema" placeholder="Tidak Ada/Ada: Jelaskan dimana dan berapa lebarnya" value="{{ old('diastema') }}" required autocomplete="diastema">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gigi_anomali" class="col-md-4 col-form-label text-md-end">{{ __('Gigi Anomali') }}</label>

                            <div class="col-md-6">
                                <input id="gigi_anomali" type="text" class="form-control @error('gigi_anomali') is-invalid @enderror" name="gigi_anomali" placeholder="Tidak Ada/Ada: Jelaskan gigi yang mana dan bentuknya" value="{{ old('gigi_anomali') }}" required autocomplete="gigi_anomali">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lain_lain" class="col-md-4 col-form-label text-md-end">{{ __('Lain-lain') }}</label>

                            <div class="col-md-6">
                                <input id="lain_lain" type="text" class="form-control @error('diastema') is-invalid @enderror" name="lain_lain" placeholder="Jelaskan yang tak tercakup diatas" value="{{ old('lain_lain') }}" required autocomplete="lain_lain">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="d" class="col-md-2 col-form-label text-md-end">{{ __('D') }}</label>
                            <div class="col-md-2">
                                <input id="d" type="text" class="form-control @error('d') is-invalid @enderror" name="d" placeholder="" value="{{ old('d') }}" required autocomplete="d">
                            </div>
                            <label for="m" class="col-md-1 col-form-label text-md-end">{{ __('M') }}</label>
                            <div class="col-md-2">
                                <input id="m" type="text" class="form-control @error('m') is-invalid @enderror" name="m" placeholder="" value="{{ old('m') }}" required autocomplete="m">
                            </div>
                            <label for="f" class="col-md-1 col-form-label text-md-end">{{ __('F') }}</label>
                            <div class="col-md-2">
                                <input id="f" type="text" class="form-control @error('f') is-invalid @enderror" name="f" placeholder="" value="{{ old('f') }}" required autocomplete="f">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <img src="{{asset('assets/img/gigi_dony.png')}}" alt="" style="width: 30%; margin:auto;">
                        </div>
                        <label for="pemeriksaan"><b>Pemeriksaan Gigi Yang Diperiksa</b></label>
                        <div class="row mb-3 mt-3">
                            <label for="skors" class="col-md-4 col-form-label text-md-end">{{ __('Bukal Gigi 16') }}</label>

                            <div class="col-md-3">
                                <input id="skor_debris_bukal_gigi_16" type="text" class="form-control @error('skor_debris_bukal_gigi_16') is-invalid @enderror" name="skor_debris_bukal_gigi_16" placeholder="Skor Debris Index" value="{{ old('skor_debris_bukal_gigi_16') }}" required autocomplete="skor_debris_bukal_gigi_16">
                            </div>
                            <div class="col-md-3">
                                <input id="skor_kalkulus_bukal_gigi_16" type="text" class="form-control @error('skor_kalkulus_bukal_gigi_16') is-invalid @enderror" name="skor_kalkulus_bukal_gigi_16" placeholder="Skor Kalkulus Index" value="{{ old('skor_kalkulus_bukal_gigi_16') }}" required autocomplete="skor_kalkulus_bukal_gigi_16">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="skors" class="col-md-4 col-form-label text-md-end">{{ __('Bukal Gigi 26') }}</label>

                            <div class="col-md-3">
                                <input id="skor_debris_bukal_gigi_26" type="text" class="form-control @error('skor_debris_bukal_gigi_26') is-invalid @enderror" name="skor_debris_bukal_gigi_26" placeholder="Skor Debris Index" value="{{ old('skor_debris_bukal_gigi_26') }}" required autocomplete="skor_debris_bukal_gigi_26">
                            </div>
                            <div class="col-md-3">
                                <input id="skor_kalkulus_bukal_gigi_26" type="text" class="form-control @error('skor_kalkulus_bukal_gigi_26') is-invalid @enderror" name="skor_kalkulus_bukal_gigi_26" placeholder="Skor Kalkulus Index" value="{{ old('skor_kalkulus_bukal_gigi_26') }}" required autocomplete="skor_kalkulus_bukal_gigi_26">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="skors" class="col-md-4 col-form-label text-md-end">{{ __('Lingual Gigi 36') }}</label>

                            <div class="col-md-3">
                                <input id="skor_debris_lingual_gigi_36" type="text" class="form-control @error('skor_debris_lingual_gigi_36') is-invalid @enderror" name="skor_debris_lingual_gigi_36" placeholder="Skor Debris Index" value="{{ old('skor_debris_lingual_gigi_36') }}" required autocomplete="skor_debris_lingual_gigi_36">
                            </div>
                            <div class="col-md-3">
                                <input id="skor_kalkulus_lingual_gigi_36" type="text" class="form-control @error('skor_kalkulus_lingual_gigi_36') is-invalid @enderror" name="skor_kalkulus_lingual_gigi_36" placeholder="Skor Kalkulus Index" value="{{ old('skor_kalkulus_lingual_gigi_36') }}" required autocomplete="skor_kalkulus_lingual_gigi_36">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="skors" class="col-md-4 col-form-label text-md-end">{{ __('Lingual Gigi 46') }}</label>

                            <div class="col-md-3">
                                <input id="skor_debris_lingual_gigi_46" type="text" class="form-control @error('skor_debris_lingual_gigi_46') is-invalid @enderror" name="skor_debris_lingual_gigi_46" placeholder="Skor Debris Index" value="{{ old('skor_debris_lingual_gigi_46') }}" required autocomplete="skor_debris_lingual_gigi_46">
                            </div>
                            <div class="col-md-3">
                                <input id="skor_kalkulus_lingual_gigi_46" type="text" class="form-control @error('skor_kalkulus_lingual_gigi_46') is-invalid @enderror" name="skor_kalkulus_lingual_gigi_46" placeholder="Skor Kalkulus Index" value="{{ old('skor_kalkulus_lingual_gigi_46') }}" required autocomplete="skor_kalkulus_lingual_gigi_46">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="skors" class="col-md-4 col-form-label text-md-end">{{ __('Labial Gigi 11') }}</label>

                            <div class="col-md-3">
                                <input id="skor_debris_labial_gigi_11" type="text" class="form-control @error('skor_debris_labial_gigi_11') is-invalid @enderror" name="skor_debris_labial_gigi_11" placeholder="Skor Debris Index" value="{{ old('skor_debris_labial_gigi_11') }}" required autocomplete="skor_debris_labial_gigi_11">
                            </div>
                            <div class="col-md-3">
                                <input id="skor_kalkulus_labial_gigi_11" type="text" class="form-control @error('skor_kalkulus_labial_gigi_11') is-invalid @enderror" name="skor_kalkulus_labial_gigi_11" placeholder="Skor Kalkulus Index" value="{{ old('skor_kalkulus_labial_gigi_11') }}" required autocomplete="skor_kalkulus_labial_gigi_11">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="skors" class="col-md-4 col-form-label text-md-end">{{ __('Labial Gigi 31') }}</label>

                            <div class="col-md-3">
                                <input id="skor_debris_labial_gigi_31" type="text" class="form-control @error('skor_debris_labial_gigi_31') is-invalid @enderror" name="skor_debris_labial_gigi_31" placeholder="Skor Debris Index" value="{{ old('skor_debris_labial_gigi_31') }}" required autocomplete="skor_debris_labial_gigi_31">
                            </div>
                            <div class="col-md-3">
                                <input id="skor_kalkulus_labial_gigi_31" type="text" class="form-control @error('skor_kalkulus_labial_gigi_31') is-invalid @enderror" name="skor_kalkulus_labial_gigi_31" placeholder="Skor Kalkulus Index" value="{{ old('skor_kalkulus_labial_gigi_31') }}" required autocomplete="skor_kalkulus_labial_gigi_31">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="debris_index" class="col-md-4 col-form-label text-md-end">{{ __('Debris Index') }}</label>

                            <div class="col-md-6">
                                <input id="debris_index" type="text" class="form-control @error('debris_index') is-invalid @enderror" name="debris_index" placeholder="Hasil / 6" value="{{ old('debris_index') }}" required autocomplete="debris_index">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kalkulus_index" class="col-md-4 col-form-label text-md-end">{{ __('Kalkulus Index') }}</label>

                            <div class="col-md-6">
                                <input id="kalkulus_index" type="text" class="form-control @error('kalkulus_index') is-invalid @enderror" name="kalkulus_index" placeholder="Hasil / 6" value="{{ old('kalkulus_index') }}" required autocomplete="kalkulus_index">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="skor_ohi" class="col-md-4 col-form-label text-md-end">{{ __('Skor OHI-s') }}</label>

                            <div class="col-md-6">
                                <input id="skor_ohi" type="text" class="form-control @error('skor_ohi') is-invalid @enderror" name="skor_ohi" placeholder="Debris Index + Kalkulus Index" value="{{ old('skor_ohi') }}" required autocomplete="skor_ohi">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <img src="{{asset('assets/img/hasil.png')}}" alt="" style="width: 50%; margin:auto;">
                        </div>
                        <hr>
                        <label for="catatan"><b>Catatan Perawatan</b></label>
                        <div class="row mb-3 mt-3">
                            <label for="tgl" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Perawatan') }}</label>

                            <div class="col-md-6">
                                <input id="tgl" type="date" class="form-control" name="tgl" required autocomplete="tgl">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="diagnosa" class="col-md-4 col-form-label text-md-end">{{ __('Diagnosa') }}</label>

                            <div class="col-md-6">
                                <textarea id="diagnosa" class="form-control" name="diagnosa" rows="3" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="therapy" class="col-md-4 col-form-label text-md-end">{{ __('Therapy') }}</label>

                            <div class="col-md-6">
                                <textarea id="therapy" class="form-control" name="therapy" rows="3" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="assasment" class="col-md-4 col-form-label text-md-end">{{ __('Assasment') }}</label>

                            <div class="col-md-6">
                                <textarea id="assasment" class="form-control" name="assasment" rows="3" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-end">{{ __('Keterangan') }}</label>

                            <div class="col-md-6">
                                <textarea id="keterangan" class="form-control" name="keterangan" rows="3" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="dokter" class="col-md-4 col-form-label text-md-end">{{ __('Dokter') }}</label>

                            <div class="col-md-6">
                                <input id="dokter" type="text" class="form-control" name="dokter" placeholder="Nama Dokter Pemeriksa" required autocomplete="dokter">
                            </div> 
                        </div>
                        
                        


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
