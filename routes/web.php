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
    Route::get('kuadran.index', [\App\Http\Controllers\KuadranController::class,'index']);
    Route::POST('kuadran.index.store', [\App\Http\Controllers\KuadranController::class,'store']);
    Route::match(['get', 'POST'], 'kuadran.index.edit', [\App\Http\Controllers\KuadranController::class,'edit']);
    Route::get('kuadran.index.destroy{kode_id}', [\App\Http\Controllers\KuadranController::class,'destroy']);

//kpi:
      Route::get('kpi.index', [\App\Http\Controllers\KpiController::class,'index']);
      Route::POST('kpi.index.store', [\App\Http\Controllers\KpiController::class,'store']);
      Route::match(['get', 'POST'], 'kpi.index.edit', [\App\Http\Controllers\KpiController::class,'edit']);
      Route::get('kpi.index.destroy{kode_kpi}', [\App\Http\Controllers\KpiController::class,'destroy']);

//tipe_penilaian:
          Route::get('tipe_penilaian.index', [\App\Http\Controllers\TipepenilaianController::class,'index']);
          Route::POST('tipe_penilaian.index.store', [\App\Http\Controllers\TipepenilaianController::class,'store']);
          Route::match(['get', 'POST'], 'tipe_penilaian.index.edit', [\App\Http\Controllers\TipepenilaianController::class,'edit']);
          Route::get('tipe_penilaian.index.destroy{kode_nilai}', [\App\Http\Controllers\TipepenilaianController::class,'destroy']);

// satuan:
              Route::get('satuan.index', [\App\Http\Controllers\SatuanController::class,'index']);
              Route::POST('satuan.index.store', [\App\Http\Controllers\SatuanController::class,'store']);
              Route::match(['get', 'POST'], 'satuan.index.edit', [\App\Http\Controllers\SatuanController::class,'edit']);
              Route::get('satuan.index.destroy{kode_satuan}', [\App\Http\Controllers\SatuanController::class,'destroy']);

//nilai_maksimal:
              Route::get('nilai_maksimal.index', [\App\Http\Controllers\NilaimaksimalController::class,'index']);
              Route::POST('nilai_maksimal.index.store', [\App\Http\Controllers\NilaimaksimalController::class,'store']);
              Route::match(['get', 'POST'], 'nilai_maksimal.index.edit', [\App\Http\Controllers\NilaimaksimalController::class,'edit']);
              Route::get('nilai_maksimal.index.destroy{kode_nmax}', [\App\Http\Controllers\NilaimaksimalController::class,'destroy']);

//document:
              Route::get('document.index', [\App\Http\Controllers\DocumentController::class,'index']);
              Route::POST('document.index.store', [\App\Http\Controllers\DocumentController::class,'store']);
              Route::match(['get', 'POST'], 'document.index.edit', [\App\Http\Controllers\DocumentController::class,'edit']);
              Route::get('document.index.destroy{kode_dcm}', [\App\Http\Controllers\DocumentController::class,'destroy']);

//Data Employee
                  Route::get('employee.index', [\App\Http\Controllers\EmployeeController::class,'index']);
                  Route::POST('employee.index.store', [\App\Http\Controllers\EmployeeController::class,'store']);
                  Route::match(['get', 'POST'], 'employee.index.edit', [\App\Http\Controllers\EmployeeController::class,'edit']);
                  Route::get('employee.index.destroy{nik}', [\App\Http\Controllers\EmployeeController::class,'destroy']);
