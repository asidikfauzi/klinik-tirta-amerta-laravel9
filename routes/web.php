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
});

Route::get('/', function () {
    return view('welcome');
})->name('home');


