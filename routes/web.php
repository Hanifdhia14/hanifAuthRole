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
Route::get('/home1', [App\Http\Controllers\HomeController::class, 'index1'])->name('home1');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index2'])->name('home2');
Route::get('/testAdminOnly', [App\Http\Controllers\HomeController::class, 'testAdmin']);
Route::get('/testManagerOnly', [App\Http\Controllers\HomeController::class, 'testManager']);

Route::group(['middleware' => ['auth','cekrole:admin']], function () {
    //Admin Interface

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

    //Create_User
    Route::get('create_user.index', [\App\Http\Controllers\Create_userController::class,'index']);
    Route::POST('create_user.index.store', [\App\Http\Controllers\Create_userController::class,'store']);
    Route::match(['get', 'POST'], 'create_user.index.edit', [\App\Http\Controllers\Create_userController::class,'edit']);
    Route::get('create_user.index.destroy{id}', [\App\Http\Controllers\Create_userController::class,'destroy']);

    //Data Employee
    Route::get('employee.index', [\App\Http\Controllers\EmployeeController::class,'index']);
    Route::POST('employee.index.store', [\App\Http\Controllers\EmployeeController::class,'store']);
    Route::match(['get', 'POST'], 'employee.index.edit', [\App\Http\Controllers\EmployeeController::class,'edit']);
    Route::get('employee.index.destroy{nik}', [\App\Http\Controllers\EmployeeController::class,'destroy']);
});


Route::group(['middleware' => ['auth','cekrole:user']], function () {//user Interface

    // target kerja
    Route::get('user.target_kerja.index', [\App\Http\Controllers\Target_kerjaController::class,'index']);
    Route::POST('user.target_kerja.index', [\App\Http\Controllers\Target_kerjaController::class,'store']);
    Route::match(['get', 'POST'], 'user.target_kerja.index.edit', [\App\Http\Controllers\Target_kerjaController::class,'edit']);
    Route::get('user.target_kerja.index.destroy{id_kerja}', [\App\Http\Controllers\Target_kerjaController::class,'destroy']);

    //Nilai Target
    Route::get('user.nilai_target.index', [\App\Http\Controllers\Nilai_targetController::class,'index']);

    //Report user
    Route::get('user.repotuser.index', [\App\Http\Controllers\RepotuserController::class,'index']);
});



Route::group(['middleware' => ['auth','cekrole:leader']], function () {//user Interface

    //Leaderterface

    // target kerja
    Route::get(
        'leader.target_kerjaleader.index',
        [\App\Http\Controllers\Target_kerjaleaderController::class,'index']
    );
    //Nilai Target
    Route::get('leader.nilai_targetleader.index', [\App\Http\Controllers\Nilai_targetleaderController::class,'index']);

    //Approval leader
    Route::get('leader.approv.index', [\App\Http\Controllers\ApprovController::class,'index']);

    //Report leader
    Route::get('leader.repotleader.index', function () {
        return view('leader.repotleader.index');
    });

    //nilai Staff
    Route::get('leader.nilai_staff.index', function () {
        return view('leader.nilai_staff.index');
    });
});
