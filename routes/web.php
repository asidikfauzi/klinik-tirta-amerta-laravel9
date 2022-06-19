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
    // Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    // Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

    Route::get('home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    
    //Rekam Medik Umum
    Route::get('rekam-medik/dokter-umum', [App\Http\Controllers\RmUmumController::class, 'index'])->name('admin.dokter.umum.index');
    Route::get('pasien/umum/create', [App\Http\Controllers\RmUmumController::class, 'create'])->name('admin.create.pasien.umum');
    Route::post('pasien/umum/create', [App\Http\Controllers\RmUmumController::class, 'store'])->name('admin.create.pasien.umum');
    Route::post('pasien/umum/file/store', [App\Http\Controllers\RmUmumController::class, 'storeFile'])->name('admin.storefile.pasien.umum');
    Route::get('pasien/getdata', [App\Http\Controllers\RmUmumController::class, 'getDataRmUmum'])->name('admin.getdata.pasien.umum');
    Route::get('pasien/umum/edit/{id}', [App\Http\Controllers\RmUmumController::class, 'edit'])->name('admin.edit.pasien.umum');
    Route::post('pasien/umum/edit/{id}', [App\Http\Controllers\RmUmumController::class, 'update'])->name('admin.edit.pasien.umum');
    
    //File Rekam Medik Umum
    Route::get('pasien/getdata/pasien', [App\Http\Controllers\FileRmUmumController::class, 'getFileDataRmUmum'])->name('admin.filegetdata.pasien.umum');
    Route::get('pasien/umum/file/{id}', [App\Http\Controllers\FileRmUmumController::class, 'index'])->name('admin.file.pasien.umum');
    Route::get('pasien/umum/download', [App\Http\Controllers\FileRmUmumController::class, 'download'])->name('admin.download.pasien.umum');
    Route::get('pasien/umum/download/file/{id}', [App\Http\Controllers\FileRmUmumController::class, 'downloadFile'])->name('admin.downloadfile.pasien.umum');

    //Rekam Medik Gigi Dony
    Route::get('rekam-medik/dokter-gigi', [App\Http\Controllers\RmDonyController::class, 'index'])->name('admin.dokter.gigi.index');
    Route::get('pasien/gigi/create', [App\Http\Controllers\RmDonyController::class, 'create'])->name('admin.create.pasien.gigi');
    Route::post('pasien/gigi/create', [App\Http\Controllers\RmDonyController::class, 'store'])->name('admin.create.pasien.gigi');
    Route::post('pasien/gigi/file/store', [App\Http\Controllers\RmDonyController::class, 'storeFile'])->name('admin.storefile.pasien.gigi');
    Route::get('pasien/gigi/getdata', [App\Http\Controllers\RmDonyController::class, 'getDataRmDony'])->name('admin.getdata.pasien.gigi');
    Route::get('pasien/gigi/edit/{id}', [App\Http\Controllers\RmDonyController::class, 'edit'])->name('admin.edit.pasien.gigi');
    Route::post('pasien/gigi/edit/{id}', [App\Http\Controllers\RmDonyController::class, 'update'])->name('admin.edit.pasien.gigi');
    
    //File Rekam Medik Umum
    Route::get('pasien/gigi/getdata/pasien', [App\Http\Controllers\FileRmDonyController::class, 'getFileDataRmDony'])->name('admin.filegetdata.pasien.gigi');
    Route::get('pasien/gigi/file/{id}', [App\Http\Controllers\FileRmDonyController::class, 'index'])->name('admin.file.pasien.gigi');
    Route::get('pasien/gigi/download', [App\Http\Controllers\FileRmDonyController::class, 'download'])->name('admin.download.pasien.gigi');
    Route::get('pasien/gigi/download/file/{id}', [App\Http\Controllers\FileRmDonyController::class, 'downloadFile'])->name('admin.downloadfile.pasien.gigi');
    
    
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');


