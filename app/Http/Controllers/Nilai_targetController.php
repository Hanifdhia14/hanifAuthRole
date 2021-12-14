<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Target_kerja;
class Nilai_targetController extends Controller
{
    public function index($id)
    {
        if(isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            // echo $tahun;exit;
            $nilai_dta= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.status', '=', '3')
            ->where('tbl_settarget_kerja.id_employee',$id)
            ->where('tbl_settarget_kerja.tahun', $tahun)
            ->get();
        } else {
            $nilai_dta= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.status', '=', '3')
            ->where('tbl_settarget_kerja.id_employee',$id)
            ->get();
        }



        // dd($realbulan);
        return view('user.nilai_target.index', compact('nilai_dta'));
    }


    public function modal ($id)
    {
        $data = DB::table( 'tbl_settarget_kerja')
        ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
        ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
        ->leftJoin('tbl_bulanan', 'tbl_bulanan.id_settarget_kerja', '=', 'tbl_settarget_kerja.id_settarget_kerja')
        ->leftJoin('tbl_quarter', 'tbl_quarter.id_settarget_kerja', '=', 'tbl_settarget_kerja.id_settarget_kerja')
        ->leftJoin('tbl_semester', 'tbl_semester.id_settarget_kerja', '=', 'tbl_settarget_kerja.id_settarget_kerja')
        ->leftJoin('tbl_tahunan', 'tbl_tahunan.id_settarget_kerja', '=', 'tbl_settarget_kerja.id_settarget_kerja')
        ->where('tbl_settarget_kerja.status', '=', '3')
        ->where('tbl_settarget_kerja.id_settarget_kerja',$id)
        ->first();
        return response()->json($data);
    }

    public function realisasi (Request $request, $id_settarget_kerja)
    {
        $real= DB:: table( 'tbl_settarget_kerja')
        ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
        ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
        ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
        ->where('tbl_settarget_kerja.status', '=', '3')
        ->where('tbl_settarget_kerja.id_settarget_kerja',$id_settarget_kerja)
        ->first();
        // dd($real->tipe_nilai);

        if($real->tipe_nilai === 'Bulanan'){
            $bulanan = DB::table('tbl_bulanan')->where('id_settarget_kerja', $id_settarget_kerja)->first();
            if(isset($bulanan))
            {
                DB::table('tbl_bulanan')->where('id_settarget_kerja', $id_settarget_kerja)->delete();
                DB::table('tbl_bulanan')->insert([
                    ['januari' => $request->januari,
                    'februari' => $request->februari,
                    'maret' => $request->maret,
                    'april' => $request->april,
                    'mei' => $request->mei,
                    'juni' => $request->juni,
                    'juli' => $request->juli,
                    'agustus' => $request->agustus,
                    'september' => $request->september,
                    'oktober' => $request->oktober,
                    'november' => $request->november,
                    'desember' => $request->desember, 'id_settarget_kerja' => $id_settarget_kerja],
                ]);
            } else{

            // dd($request->all());
                DB::table('tbl_bulanan')->insert([
                    ['januari' => $request->januari,
                    'februari' => $request->februari,
                    'maret' => $request->maret,
                    'april' => $request->april,
                    'mei' => $request->mei,
                    'juni' => $request->juni,
                    'juli' => $request->juli,
                    'agustus' => $request->agustus,
                    'september' => $request->september,
                    'oktober' => $request->oktober,
                    'november' => $request->november,
                    'desember' => $request->desember, 'id_settarget_kerja' => $id_settarget_kerja],
                ]);
            }
        }
        if($real->tipe_nilai === 'Quarter'){
            $quarter = DB::table('tbl_quarter')->where('id_settarget_kerja', $id_settarget_kerja)->first();
            if(isset($quarter))
            {
                DB::table('tbl_quarter')->where('id_settarget_kerja', $id_settarget_kerja)->delete();
                DB::table('tbl_quarter')->insert([
                    ['quarter1' => $request->quarter1,
                    'quarter2' => $request->quarter2,
                    'quarter3' => $request->quarter3,
                    'quarter4' => $request->quarter4,
                    'id_settarget_kerja' => $id_settarget_kerja],
                ]);
            } else{
                DB::table('tbl_quarter')->insert([
                    ['quarter1' => $request->quarter1,
                    'quarter2' => $request->quarter2,
                    'quarter3' => $request->quarter3,
                    'quarter4' => $request->quarter4,
                    'id_settarget_kerja' => $id_settarget_kerja],
                ]);
            }
        }
        if($real->tipe_nilai === 'Semester'){
            $semester = DB::table('tbl_semester')->where('id_settarget_kerja', $id_settarget_kerja)->first();
            if(isset($semester))
            {
                DB::table('tbl_semester')->where('id_settarget_kerja', $id_settarget_kerja)->delete();
                DB::table('tbl_semester')->insert([
                    ['semester1' => $request->semester1, 'semester2' => $request->semester2, 'id_settarget_kerja' => $id_settarget_kerja],
                ]);
            } else{
                DB::table('tbl_semester')->insert([
                    ['semester1' => $request->semester1, 'semester' => $request->semester2, 'id_settarget_kerja' => $id_settarget_kerja],
                ]);
            }
        }
        if($real->tipe_nilai === 'Tahunan'){
            $tahunan = DB::table('tbl_tahunan')->where('id_settarget_kerja', $id_settarget_kerja)->first();
            if(isset($tahunan))
            {
                DB::table('tbl_tahunan')->where('id_settarget_kerja', $id_settarget_kerja)->update([
                    'nilai_tahun' => $request->tahun1,
                ]);
            } else{
                DB::table('tbl_tahunan')->insert([
                    'nilai_tahun' => $request->tahun1,
                    'id_settarget_kerja' => $id_settarget_kerja,
                ]);
            }
        }
        return redirect()->back()-> with('status', 'Data Berhasil Disimpan!');
    }


    public function destroy($id)
    {
    }
}
