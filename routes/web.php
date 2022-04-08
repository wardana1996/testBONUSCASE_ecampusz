<?php

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

Route::get('/', function () {
    return view('login_instansi');
});

Route::get('/register', function () {
    return view('register_instansi');
});


Route::post('/register/success', [App\Http\Controllers\userController::class, 'registrasi'])->name('user.registrasi');
Route::post('/login/success', [App\Http\Controllers\userController::class, 'login'])->name('user.login');
Route::get('/logout/success', [App\Http\Controllers\userController::class, 'logout'])->name('user.logout');
Route::get('/instansi', [App\Http\Controllers\instansiController::class, 'index'])->name('instansi.index');
Route::post('/instansi/create', [App\Http\Controllers\instansiController::class, 'create'])->name('instansi.create');
Route::get('/instansi/edit/{id}', [App\Http\Controllers\instansiController::class, 'edit'])->name('instansi.edit');
Route::post('/instansi/update/{id}', [App\Http\Controllers\instansiController::class, 'update'])->name('instansi.update');
Route::delete('/instansi/delete/{id}', [App\Http\Controllers\instansiController::class, 'delete'])->name('instansi.delete');
