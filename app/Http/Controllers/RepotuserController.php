<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class RepotuserController extends Controller
{
    public function index()
    {
        if(isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            $tipe_nilai = $_GET['tipe_nilai'];
            // echo $tahun;exit;
            $nilai_dta= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.status', '=', '4')
            ->where('tbl_settarget_kerja.tahun', $tahun)
            ->where('tbl_settarget_kerja.id_employee',auth()->user()->role)
            ->where('tbl_settarget_kerja.tipe_nilai', $tipe_nilai)
            ->get();
        } else {
            $nilai_dta= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.status', '=', '4')
            ->where('tbl_settarget_kerja.id_employee',auth()->user()->role)
            ->get();
        }

        return view('user.repotuser.index',compact('nilai_dta'));
    }
    public function print ()
    {
            // $tahun = $_GET['tahun'];
            // $tipe_nilai = $_GET['tipe_nilai'];
            // echo $tahun;exit;
            $nilai_dta= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.status', '=', '4')
            ->where('tbl_settarget_kerja.id_employee',auth()->user()->role)
            // ->where('tbl_settarget_kerja.tahun', $tahun)
            // ->where('tbl_settarget_kerja.tipe_nilai', $tipe_nilai)
            ->get();
        return view('v_printuser', compact('nilai_dta'));
    }

    public function printpdf ()
    {
        $prin= view('v_printuserpdf');

     // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($prin);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
