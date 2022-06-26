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
 //register admin 
 

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

    Route::get('home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    
    //Rekam Medik Umum
    Route::get('rekam-medik/dokter-umum', [App\Http\Controllers\RmUmumController::class, 'index'])->name('admin.dokter.umum.index');
    Route::get('pasien/umum/create', [App\Http\Controllers\RmUmumController::class, 'create'])->name('admin.create.pasien.umum');
    Route::post('pasien/umum/create', [App\Http\Controllers\RmUmumController::class, 'store'])->name('admin.create.pasien.umum');
    Route::get('pasien/getdata', [App\Http\Controllers\RmUmumController::class, 'getDataRmUmum'])->name('admin.getdata.pasien.umum');
    Route::get('pasien/umum/edit/{id}', [App\Http\Controllers\RmUmumController::class, 'edit'])->name('admin.edit.pasien.umum');
    Route::post('pasien/umum/edit/{id}', [App\Http\Controllers\RmUmumController::class, 'update'])->name('admin.edit.pasien.umum');

    //Rekam Medik Gigi Dony
    Route::get('rekam-medik/dokter-gigi', [App\Http\Controllers\RmDonyController::class, 'index'])->name('admin.dokter.gigi.index');
    Route::get('pasien/gigi/create', [App\Http\Controllers\RmDonyController::class, 'create'])->name('admin.create.pasien.gigi');
    Route::post('pasien/gigi/create', [App\Http\Controllers\RmDonyController::class, 'store'])->name('admin.create.pasien.gigi');
    Route::get('pasien/gigi/getdata', [App\Http\Controllers\RmDonyController::class, 'getDataRmDony'])->name('admin.getdata.pasien.gigi');
    Route::get('pasien/gigi/edit/{id}', [App\Http\Controllers\RmDonyController::class, 'edit'])->name('admin.edit.pasien.gigi');
    Route::post('pasien/gigi/edit/{id}', [App\Http\Controllers\RmDonyController::class, 'update'])->name('admin.edit.pasien.gigi');
    
});

Route::group(['prefix'=>'rm-umum', 'middleware'=>['isRmUmum','auth']], function(){

    Route::get('rekam-medik/dokter-umum', [App\Http\Controllers\RmUmum\UmumController::class, 'index'])->name('umum.index');
    Route::get('pasien/getdata', [App\Http\Controllers\RmUmum\UmumController::class, 'getDataRmUmum'])->name('umum.getdata');
    Route::get('rekam-medik/umum/create/{id}', [App\Http\Controllers\RmUmum\UmumController::class, 'create'])->name('umum.create');
    Route::post('rekam-medik/umum/create/{id}', [App\Http\Controllers\RmUmum\UmumController::class, 'store'])->name('umum.create');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');


