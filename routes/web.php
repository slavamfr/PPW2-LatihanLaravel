<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

/* Tampil Data Buku */
Route::get('/buku', [BukuController::class,'index']);

/* Tambah Buku */
Route::get('/buku/create', [BukuController::class,'create'])->name('buku.create');
Route::post('/buku', [BukuController::class,'store'])->name('buku.store');

/* Delete Data Buku */
Route::delete('/buku/{id}', [BukuController::class,'destroy'])->name('buku.destroy');

/* Edit Data Buku */
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

/* Cari Buku */
Route::get('/buku/search', 'BukuController@search')->name('buku.search');


Route::get('/about', function () {
    return view('about');
})->name('about');
