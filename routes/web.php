<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    //register admin 
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

    Route::get('home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('rekam-medik/dokter-umum', [App\Http\Controllers\AdminController::class, 'indexRmUmum'])->name('admin.dokter.umum.index');
    Route::get('pasien/umum/create', [App\Http\Controllers\AdminController::class, 'createPasienUmum'])->name('admin.create.pasien.umum');
    Route::post('pasien/umum/create', [App\Http\Controllers\AdminController::class, 'storePasienUmum'])->name('admin.create.pasien.umum');
    Route::get('pasien/getdata', [App\Http\Controllers\AdminController::class, 'getDataRmUmum'])->name('admin.getdata.pasien.umum');
    Route::get('pasien/umum/edit/{id}', [App\Http\Controllers\AdminController::class, 'editRmUmum'])->name('admin.edit.pasien.umum');
    Route::post('pasien/umum/edit/{id}', [App\Http\Controllers\AdminController::class, 'updateRmUmum'])->name('admin.edit.pasien.umum');
    Route::get('pasien/umum/file/{id}', [App\Http\Controllers\AdminController::class, 'file'])->name('admin.file.pasien.umum');
    Route::get('pasien/umum/download', [App\Http\Controllers\AdminController::class, 'download'])->name('admin.download.pasien.umum');

    Route::get('rekam-medik/dokter-gigi', [App\Http\Controllers\AdminController::class, 'indexRmDony'])->name('admin.dokter.gigi.index');
    

    Route::get('home/getdata', [App\Http\Controllers\AdminController::class, 'getData'])->name('admin.getdata');
    Route::get('pasien/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin-create-pasien');
    Route::post('pasien/create', [App\Http\Controllers\AdminController::class, 'store'])->name('admin-create-pasien');
    Route::get('pasien/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin-edit-pasien');
    Route::post('pasien/edit/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin-edit-pasien');
    Route::get('pasien/non-aktif/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin-non-aktif-pasien');

    
    
    
    
    Route::get('non-aktif', [App\Http\Controllers\NonAktifController::class, 'index'])->name('admin.non.dashboard');
    Route::get('non-aktif/getdata', [App\Http\Controllers\NonAktifController::class, 'getData'])->name('admin.non.getdata');
    Route::get('pasien/aktifkan/{id}', [App\Http\Controllers\NonAktifController::class, 'aktifkan'])->name('admin-aktifkan-pasien');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');


