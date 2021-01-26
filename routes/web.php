<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/testAdminOnly', [App\Http\Controllers\HomeController::class, 'testAdmin']);
Route::get('/testManagerOnly', [App\Http\Controllers\HomeController::class, 'testManager']);

//Kuadran:
//Route::get('kuadran.index', [\App\Http\Controllers\KuadranController::class,'index'])->name('kuadran.index');
//Route::POST('kuadran.index', [\App\Http\Controllers\KuadranController::class,'store'])->name('kuadran.index');
//Route::delete('kuadran.index', [\App\Http\Controllers\KuadranController::class,'destroy(kode_id)'])->name('kuadran.index');
    Route::get('kuadran.index', [\App\Http\Controllers\KuadranController::class,'index']);
    Route::POST('kuadran.index.store', [\App\Http\Controllers\KuadranController::class,'store']);
    Route::match(['get', 'POST'], 'kuadran.index.edit', [\App\Http\Controllers\KuadranController::class,'edit']);
    Route::get('kuadran.index.destroy{kode_id}', [\App\Http\Controllers\KuadranController::class,'destroy']);
