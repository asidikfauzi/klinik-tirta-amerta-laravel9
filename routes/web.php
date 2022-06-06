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

    Route::get('home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


