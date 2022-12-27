<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DokumenAktaController;
use App\Http\Controllers\DashboardController;
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


//Route::get('/home', function () {
 //   return view('home.home');
//});
Route::get('/register', function (   ) {
    return view('home.register');
});
Route::get('/session', function () {
    // Retrieve a piece of data from the session...
    $value = session('key');
});
Route::get('/home',[LoginController::class, 'home'])->name('login')->middleware('guest');

Route::post('/register',[RegisterController::class, 'store']);
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/new_dashboard',[DashboardController::class, 'dashboard'])->middleware('auth');

Route::get('/listKlien',[KlienController::class, 'listKlien']);
Route::get('/tambahKlien',[KlienController::class, 'tambahKlien']);
Route::post('/tambahKlien',[KlienController::class, 'store']);
Route::get('/detailKlien/{id}',[KlienController::class, 'show']);
Route::get('/editKlien/{id}',[KlienController::class, 'edit']);
Route::put('/editKlien/{id}', [KlienController::class,'update']);
Route::delete('/hapusKlien/{id}',[KlienController::class,'destroy']);

Route::get('/listKaryawan',[KaryawanController::class, 'listKaryawan']);
Route::get('/detailKaryawan/{id}',[KaryawanController::class, 'detailKaryawan']);
Route::get('/profile',[KaryawanController::class, 'profile']);
Route::get('/editProfile',[KaryawanController::class, 'editProfile']);
Route::post('/updateProfile',[KaryawanController::class, 'updateProfile']);

Route::get('/listAkta',[DokumenAktaController::class, 'listAkta']);
Route::get('/tambahAkta',[DokumenAktaController::class, 'tambahAkta']);
Route::post('/tambahAkta',[DokumenAktaController::class, 'store']);
Route::get('/detailAkta/{id}',[DokumenAktaController::class, 'detailAkta']);
Route::get('/editAkta/{id}',[DokumenAktaController::class, 'editAkta']);
Route::post('/updateAkta/{id}',[DokumenAktaController::class, 'updateAkta']);
Route::get('/cariAkta',[DokumenAktaController::class, 'cariAkta']);
Route::get('/hasilPencarian',[DokumenAktaController::class, 'hasilPencarian']);
Route::get('/minutaAkta/{id}',[DokumenAktaController::class, 'minutaAkta']);
Route::get('/uploadMinutaAkta/{id}',[DokumenAktaController::class, 'uploadMinutaAkta']);
Route::put('/updateMinutaAkta/{id}', [AnswerController::class,'updateMinutaAkta']);
Route::get('/salinanAkta/{id}',[DokumenAktaController::class, 'salinanAkta']);
Route::post('/tambahMinutaAkta/{id}',[DokumenAktaController::class, 'tambahMinutaAkta']);
Route::post('/tambahSalinanAkta/{id}',[DokumenAktaController::class, 'tambahSalinanAkta']);
Route::get('/uploadSalinanAkta/{id}',[DokumenAktaController::class, 'uploadSalinanAkta']);
Route::get('/uploadRevisiSalinan/{id}',[DokumenAktaController::class, 'uploadRevisiSalinan']);
Route::get('/revisiSalinanAkta/{id}',[DokumenAktaController::class, 'revisiSalinanAkta']);
Route::post('/tambahDokumenPendukung/{id}',[DokumenAktaController::class, 'tambahDokumenPendukung']);
Route::delete('/hapusDokumenPendukung/{id}',[DokumenAktaController::class, 'hapusDokumenPendukung']);
//Route::get('/listKlien', function (   ) {
  //  return view('klien.listKlien');
//});
//Route::get('/tambahKlien', function () {
//    return view('klien.tambahKlien');
//});

//Route::get('/detailKlien', function () {
 //   return view('klien.detailKlien');
//});
//Route::get('/listAkta', function () {
    return view('dokumenAkta.listDokumenAkta');
//});
//Route::get('/tambahAkta', function () {
 //   return view('dokumenAkta.tambahDokumenAkta');
//});
Route::get('/detailAkta', function () {
    return view('dokumenAkta.detailAkta');
});
//Route::get('/listKaryawan', function () {
 //   return view('karyawan.listKaryawan');
//});
Route::get('/detailKaryawan', function () {
    return view('karyawan.detailKaryawan');
});
Route::get('/cariAkta', function () {
    return view('dokumenAkta.cariDokumenAkta');
});
Route::get('/hasilPencarian', function () {
    return view('dokumenAkta.hasilPencarian');
});