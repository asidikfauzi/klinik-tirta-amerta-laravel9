@extends('layouts.login')

<link rel="stylesheet" type="text/css" href="{{asset('css/table.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/button.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/app-klinik.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')

<div class="content">
    <div class="topnav mb-3">
        <button onclick="window.location.href='{{route('admin-create-pasien')}}'" class="button button-submit">Tambah Pasien</button>
        <div class="search-container">
            <form action="/action_page.php">
              <input type="text" class="search" placeholder="Search.." name="search">
              <i style="padding: 15px;" class="fa fa-search"></i>
            </form>
        </div>
        <table class="table-pasien">
            <tr>
                <th>No. Pasien</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>No. Pasien</td>
                <td>Nama</td>
                <td>Umur</td>
                <td>Alamat</td>
                <td>Alamat</td>
            </tr>
            <tr>
                <td>No. Pasien</td>
                <td>Nama</td>
                <td>Umur</td>
                <td>Alamat</td>
                <td>Alamat</td>
            </tr>
            <tr>
                <td>No. Pasien</td>
                <td>Nama</td>
                <td>Umur</td>
                <td>Alamat</td>
                <td>Alamat</td>
            </tr>
        </table>
    </div>      
</div>

@endsection
