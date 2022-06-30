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
    Route::get('pasien/getdetail', [App\Http\Controllers\RmUmumController::class, 'getDetailRmUmum'])->name('admin.getdetail.pasien.umum');
    Route::get('pasien/umum/edit/{id}', [App\Http\Controllers\RmUmumController::class, 'edit'])->name('admin.edit.pasien.umum');
    Route::post('pasien/umum/edit/{id}', [App\Http\Controllers\RmUmumController::class, 'update'])->name('admin.edit.pasien.umum');
    Route::get('pasien/umum/show/{id}', [App\Http\Controllers\RmUmumController::class, 'show'])->name('admin.show.pasien.umum');
    Route::get('pasien/umum/detail/{id}', [App\Http\Controllers\RmUmumController::class, 'detail'])->name('admin.detail.pasien.umum');

    //Rekam Medik Gigi Dony
    Route::get('rekam-medik/dokter-gigi', [App\Http\Controllers\RmDonyController::class, 'index'])->name('admin.dokter.gigi.index');
    Route::get('pasien/gigi/create', [App\Http\Controllers\RmDonyController::class, 'create'])->name('admin.create.pasien.gigi');
    Route::post('pasien/gigi/create', [App\Http\Controllers\RmDonyController::class, 'store'])->name('admin.create.pasien.gigi');
    Route::get('pasien/gigi/getdata', [App\Http\Controllers\RmDonyController::class, 'getDataRmDony'])->name('admin.getdata.pasien.gigi');
    Route::get('pasien/getdetail/gigi', [App\Http\Controllers\RmDonyController::class, 'getDetailRmDony'])->name('admin.getdetail.pasien.gigi');
    Route::get('pasien/gigi/edit/{id}', [App\Http\Controllers\RmDonyController::class, 'edit'])->name('admin.edit.pasien.gigi');
    Route::post('pasien/gigi/edit/{id}', [App\Http\Controllers\RmDonyController::class, 'update'])->name('admin.edit.pasien.gigi');
    Route::get('pasien/gigi/show/{id}', [App\Http\Controllers\RmDonyController::class, 'show'])->name('admin.show.pasien.gigi');
    Route::get('pasien/gigi/detail/{id}', [App\Http\Controllers\RmDonyController::class, 'detail'])->name('admin.detail.pasien.gigi');
    
});

Route::group(['prefix'=>'rm-umum', 'middleware'=>['isRmUmum','auth']], function(){

    Route::get('rekam-medik/dokter-umum', [App\Http\Controllers\RmUmum\UmumController::class, 'index'])->name('umum.index');
    Route::get('pasien/getdata', [App\Http\Controllers\RmUmum\UmumController::class, 'getDataRmUmum'])->name('umum.getdata');
    Route::get('pasien/getdetail/dokter-umum', [App\Http\Controllers\RmUmum\UmumController::class, 'getDetailRmUmum'])->name('umum.getdetail');
    Route::get('rekam-medik/umum/create/{id}', [App\Http\Controllers\RmUmum\UmumController::class, 'create'])->name('umum.create');
    Route::post('rekam-medik/umum/create/{id}', [App\Http\Controllers\RmUmum\UmumController::class, 'store'])->name('umum.create');
    Route::get('pasien/umum/show/{id}', [App\Http\Controllers\RmUmum\UmumController::class, 'show'])->name('umum.show');
    Route::get('pasien/umum/detail/{id}', [App\Http\Controllers\RmUmum\UmumController::class, 'detail'])->name('umum.detail');
});

Route::group(['prefix'=>'rm-gigi', 'middleware'=>['isRmDony','auth']], function(){

    Route::get('rekam-medik/dokter-gigi', [App\Http\Controllers\RmDony\DonyController::class, 'index'])->name('dony.index');
    Route::get('pasien/getdata', [App\Http\Controllers\RmDony\DonyController::class, 'getDataRmDony'])->name('dony.getdata');
    Route::get('pasien/getdetail/gigi', [App\Http\Controllers\RmDony\DonyController::class, 'getDetailRmDony'])->name('dony.getdetail');
    Route::get('rekam-medik/gigi/create/{id}', [App\Http\Controllers\RmDony\DonyController::class, 'create'])->name('dony.create');
    Route::post('rekam-medik/gigi/create/{id}', [App\Http\Controllers\RmDony\DonyController::class, 'store'])->name('dony.create');
    Route::get('pasien/gigi/show/{id}', [App\Http\Controllers\RmDony\DonyController::class, 'show'])->name('dony.show');
    Route::get('pasien/gigi/detail/{id}', [App\Http\Controllers\RmDony\DonyController::class, 'detail'])->name('dony.detail');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');


