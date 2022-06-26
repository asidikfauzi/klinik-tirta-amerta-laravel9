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
<style>
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
    tr { height: 50px; }
</style>
<div class="content">
    <hr>
    <div class="topnav mb-3">
        <table id="table-pasien" class="display table-pasien stripe row-border order-column" style="width: 100%;" >
            <thead>
                <tr>
                    <th>No. Pasien</th>
                    <th>Nama KK</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nomor Telepone</th>
                    <th>Pekerjaan</th>
                    <th>RM</th>
                    <th>Tambah</th>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){

    fetch_data();

    function fetch_data(search='')
    {
        $('.table-pasien').DataTable({

            language: {
                searchPlaceholder: 'Search...',
                sEmptyTable:   'Tidak ada data yang tersedia pada tabel ini',
                sProcessing:   'Sedang memproses...',
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

            url:"{{ route('dony.getdata') }}",

            data: {
                search : search,
            }

            },
            columns:[
                    {data: 'id', name: 'id'},
                    {data: 'nama_kk', name: 'nama_kk'},
                    {data: 'nama_pasien', name: 'nama_pasien'},
                    {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'tgl_lahir', name: 'tgl_lahir'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'no_telepone', name: 'no_telepone'},
                    {data: 'pekerjaan', name: 'pekerjaan'},
                    {data: 'download', name: 'download'},
                    {data: 'aksi', name: 'aksi'}
            ]

            });

        }

        $("body").on("click", ".modal-deletetab1", function() {
            var judulid = $(this).attr('data-id');
            swal({
                title: "Yakin?",
                text: "kamu akan menghapus data ini ?",
                icon: "warning",
                buttons: ["Batal", "OK"],
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/delete/"+judulid+"" 
                    swal("Data berhasil dihapus", {
                    icon: "success",
                    });
                } else {
                    swal("Data Tidak Jadi dihapus");
                }
                });
        });
    });
</script>
