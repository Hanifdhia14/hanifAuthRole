<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RepotuserController extends Controller
{
    public function index()
    {
        if(isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            // echo $tahun;exit;
            $nilai_dta= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.status', '=', '4')
            ->where('tbl_settarget_kerja.tahun', $tahun)
            ->get();
        } else {
            $nilai_dta= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.status', '=', '4')
            ->get();
        }

        return view('user.repotuser.index',compact('nilai_dta'));
    }
}
