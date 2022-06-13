@extends('layouts.login')

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
<div class="content">

    <div class="topnav">
        <div class="column">
            <div class="card" style="background-color:#1E90FF;">
                <a href="">
                    <img src="{{asset('assets/img/dokter_umum.png')}}" alt="dokter_umum" class="image-index">
                    <h1 style="color: white">Rekam Medik Dokter Umum</h1>
                </a>
            </div>
        </div>
        <div class="column">
            <div class="card" style="background-color:#228B22;">
                <a href="">
                    <img src="{{asset('assets/img/dokter_gigi.png')}}" alt="dokter_gigi" class="image-index">
                    <h1 style="color: white">Rekam Medik Dokter Gigi</h1>
                </a>
            </div>
        </div>
    </div>      
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

{{-- <script type="text/javascript">
    $(document).ready(function(){

    fetch_data();

    function fetch_data(search='')
    {
        $('#table-pasien').DataTable({

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
            paging: true,
            // responsive: false,
            // processing: true,
            scrollX: true,
            // filter : false,
            lengthChange: false,

            ajax: {

            url:"{{ route('admin.getdata') }}",

            data: {
                search : search,
            }

            },

            columns:[
                    {data: 'no_pasien', name: 'no_pasien'},
                    {data: 'nama', name: 'nama'},
                    {data: 'umur', name: 'umur'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'status', name: 'status'},
                    {data: 'aksi', name: 'aksi'},

            ]

            });

        }

        $("body").on("click", ".modal-deletetab1", function() {
            var judulid = $(this).attr('data-id');
            swal({
                title: "Yakin?",
                text: "kamu akan non-aktifkan pasien ini ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/pasien/non-aktif/"+judulid+"" 
                    swal("Pasien berhasil dinon-aktifkan", {
                    icon: "success",
                    });
                } else {
                    swal("Pasien tidak jadi dinon-aktifkan");
                }
                });
        });


    });
</script> --}}