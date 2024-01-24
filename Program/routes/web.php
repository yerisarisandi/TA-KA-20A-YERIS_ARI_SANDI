<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\StokController;

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

// Route::get('/', function () {
    // return view('welcome');
// });

    // buat rout halaman login
    Route::get('/login',[Login::class,'index']);

    // buat route halaman dashboard
    Route::get('/',[Dashboard::class,'index']);

        // buat route halaman dashboard (view)
        Route::get('/view',[Dashboard::class,'getView']);


    // buat route untuk ambil data login
    Route::post('/login/get',[Login::class,'getLogin']);

     // buat rout halaman logout
     Route::get('/logout',[Login::class,'setLogout']);

     Route::get('/stok',[StokController::class,'index']);

    