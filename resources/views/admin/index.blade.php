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

@section('content')
<div class="content">
    <hr>
    <div class="topnav mb-3">
        <button onclick="window.location.href='{{route('admin-create-pasien')}}'" class="button button-submit">Tambah Pasien</button>
        <table id="table-pasien" class="display table-pasien" style="width: 100%;">
            <thead>
                <tr>
                    <th>No. Pasien</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
            </tbody>
        </table>
    </div>      
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
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
                    window.location = "/admin/pasien/delete/"+judulid+"" 
                    swal("Pasien berhasil dinon-aktifkan", {
                    icon: "success",
                    });
                } else {
                    swal("Pasien tidak jadi dinon-aktifkan");
                }
                });
        });


    });
</script>