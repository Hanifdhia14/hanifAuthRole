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
Route::get('coba', [\App\Http\Controllers\Coba_Controller::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/testAdminOnly', [App\Http\Controllers\HomeController::class, 'testAdmin']);
Route::get('/testManagerOnly', [App\Http\Controllers\HomeController::class, 'testManager']);


  //ADMIN INTERFACE
Route::group(['middleware' => ['auth','cekrole:admin']], function () {

    //Kuadran:
    Route::get('kuadran.index', [\App\Http\Controllers\KuadranController::class,'index']);
    Route::POST('kuadran.index.store', [\App\Http\Controllers\KuadranController::class,'store']);
    Route::match(['get', 'POST'], 'kuadran.index.edit{id_kuadran}', [\App\Http\Controllers\KuadranController::class,'edit']);
    Route::get('kuadran.index.destroy{id_kuadran}', [\App\Http\Controllers\KuadranController::class,'destroy']);

    //kpi:
    Route::get('kpi.index', [\App\Http\Controllers\KpiController::class,'index']);
    Route::POST('kpi.index.store', [\App\Http\Controllers\KpiController::class,'store']);
    Route::match(['get', 'POST'], 'kpi.index.edit{id_kpi}', [\App\Http\Controllers\KpiController::class,'edit']);
    Route::get('kpi.index.destroy{id_kpi}', [\App\Http\Controllers\KpiController::class,'destroy']);

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

    //Report User Admin
    Route::get('repotkpi.index',[\App\Http\Controllers\Repot_kpiController::class,'index']);
});



    //USER INTERFACE

Route::group(['middleware' => ['auth','cekrole:user']], function () {

    Route::get('/home1', [App\Http\Controllers\HomeController::class, 'index1'])->name('home1');
    // target kerja
    Route::get('user/target_kerja/{id}', [\App\Http\Controllers\Target_kerjaController::class,'index'])->name('user.target_kerja');
    Route::POST('user.target_kerja.index', [\App\Http\Controllers\Target_kerjaController::class,'store']);
    Route::match(['get', 'POST'], 'user.target_kerja.index.edit{id_settarget_kerja}', [\App\Http\Controllers\Target_kerjaController::class,'edit']);
    Route::get('user/target_kerja/destroy/{id_settarget_kerja}', [\App\Http\Controllers\Target_kerjaController::class,'destroy'])->name('user.target_kerja.delete');

    //Nilai Target
    Route::get('user/nilai_target/{id}', [\App\Http\Controllers\Nilai_targetController::class,'index'])->name('user.nilai_target');
    Route::get('user.nilai_target{id}', [\App\Http\Controllers\Nilai_targetController::class,'modal']);
    Route::POST('user.nilai_target{id_settarget_kerja}', [\App\Http\Controllers\Nilai_targetController::class,'realisasi'])->name('realisasi');

    //Apply
    Route::get( 'user/target_kerja/apply/{id}', [\App\Http\Controllers\Target_kerjaController::class,'apply'])->name('user.target_kerja.apply');
    Route::POST('user/nilai_target/edit/{id_settarget_kerja}',[\App\Http\Controllers\Nilai_targetController::class,'realisasi'])->name('user.nilai_target.edit');
    //Submit
    Route::get( 'user/nilai_target/submit/{id_settarget_kerja}', [\App\Http\Controllers\Nilai_targetController::class,'submit'])->name('user.nilai_target.submit');
    //Report user
    Route::get('user.repotuser.index', [\App\Http\Controllers\RepotuserController::class,'index'])->name('user.repotuser.index');
});



    //LEADER INTERFACE
Route::group(['middleware' => ['auth','cekrole:leader']], function () {

    Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index2'])->name('home2');
    // target kerja
    Route::get(    'leader.target_kerjaleader.index', [\App\Http\Controllers\Target_kerjaleaderController::class,'index']);
    //Nilai Target
    Route::get('leader.nilai_targetleader.index', [\App\Http\Controllers\Nilai_targetleaderController::class,'index']);

    //Approval leader
    Route::get('leader.approv.index', [\App\Http\Controllers\ApprovController::class,'index']);
    Route::get('leader.approv.detail{id}', [\App\Http\Controllers\ApprovController::class,'detail']);

    // Approv:
    Route::post('leader.approv.approv{id_settarget_kerja}', [\App\Http\Controllers\ApprovController::class,'approv'])->name('approv');
    Route::get('leader.approv.edit{id_settarget_kerja}',[\App\Http\Controllers\ApprovController::class,'editapprov']);

    // Not Approv:
     Route::post('leader.approv.notapprov{id_settarget_kerja}', [\App\Http\Controllers\ApprovController::class,'notapprov'])->name('notapprov');

    //Addkomen
    Route::get('leader.approv.detail.komen{id_settarget_kerja}',[\App\Http\Controllers\ApprovController::class,'komen'])->name('komen');;
    Route::get('leader.approv.detail.editkomen{id_settarget_kerja}',[\App\Http\Controllers\ApprovController::class,'editkomen']);

    //Report leader
    Route::get('leader.repotleader.index', function () {
        return view('leader.repotleader.index');
    });

    //nilai Staff
    Route::get('leader.nilai_staff.index', function () {
        return view('leader.nilai_staff.index');
    });
});
