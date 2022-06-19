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
        
        <div class="row mt-5">
            <label for="upload" class="col-md-4 col-form-label text-md-end">{{ __('Upload File') }}</label>
            <div class="row col-md-6">
                <form action="{{route('admin.storefile.pasien.umum')}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    <input type="text" name="id" value="{{$data[0]->id}}" hidden>
                    <input type="text" name="no_pasien" value="{{$data[0]->users_no_pasien}}" hidden>
                    <input id="upload" type="file" class="form-control @error('upload') is-invalid @enderror" name="upload" required autocomplete="upload">
                    <input class="mt-2 form-control button button-submit" type="submit">
                </form>
                @error('upload')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <table id="table-file-umum" class="display table-file-umum stripe row-border order-column" style="width: 100%;" >
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script type="text/javascript">

$("#menu11Export").on("click", function () {
    $.ajax({
        url: `pasien/umum/download/file`,
        method: "GET",
        data: {
            kode_satker: kode_satker_tab11
        },
        success: function (success) {
            window.location.href = `pasien/umum/download/file/{id}`;
        },
    });
});
    $(document).ready(function(){

    fetch_data();

    function fetch_data(search='')
    {
        $('.table-file-umum').DataTable({

            language: {
                searchPlaceholder: 'Search...',
                sEmptyTable:   'Tidak ada data yang tersedia pada tabel ini',
                sProcessing:   'Sedang memproses...',
                // sLengthMenu:   'Tampilkan _MENU_ entri',
                sZeroRecords:  'Tidak ditemukan data yang sesuai',
                sInfo:         'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
                sInfoEmpty:    'Menampilkan 0 sampai 0 dari 0 entri',
                sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
                sInfoPostFix:  '',
                sSearch:       '',
                sUrl:          '',
                oPaginate: {
                sFirst:    'Pertama',
                sPrevious: 'Sebelumnya',
                sNext:     'Selanjutnya',
                sLast:     'Terakhir'
                }
            },
            paging: false,
            responsive: true,
            scrollY:"300px",
            scrollX: true,
            filter : true,
            lengthChange: false,
            scrollCollapse: true,
            fixedColumns:   {
                heightMatch: 'none'
            },

            ajax: {

                url:"{{ route('admin.filegetdata.pasien.umum') }}",
                data: {
                    search : search,
                }
            },
            columns:[
                    {
                        data: 'pembuatan', 
                        name: 'pembuatan', 
                    },
                    {data: 'download', name: 'download'},
            ]

            });

        }
    });
</script>
