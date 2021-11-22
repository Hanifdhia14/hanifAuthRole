<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Target_kerja;
//Tabel Kuadran
use App\Models\Kuadran;
//Tabel KPI
use App\Models\Kpi;
//Tabel Karyawan
use App\Models\Employee;
//Tabel Tipe Penilaian
use App\Models\Bulanan;
use App\Models\Semester;
use App\Models\Quarter;
use App\Models\Tahunan;



class Target_kerjaController extends Controller
{
    public function index($id)
    {
        // $set_target= Target_kerja::all();
        $set_target = DB:: table( 'tbl_settarget_kerja')
        ->join('kuadran1', 'kuadran1.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
        ->join('kpi1', 'kpi1.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
        ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
        ->where('tbl_settarget_kerja.id_employee',$id)
        ->get();

        $data_pegawai= DB:: table( 'tbl_settarget_kerja')
        ->join('employee', 'employee.id_employee', '=', 'tbl_settarget_kerja.id_employee')
        ->select('employee.nik_id', 'employee.nama', 'employee.jabatan', 'employee.divisi')
        ->first();

        $kuadrans= Kuadran::select('id_kuadran', 'kuadran')->get();
        $kpis= Kpi::select('id_kpi','nama_kpi')->get();

        return view('user.target_kerja.index', compact('kuadrans', 'kpis', 'set_target','data_pegawai'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'bobot' => 'max:100',

          ]);
        $set_target = new target_kerja;
        $set_target-> id_employee = $request->id_employee;
        $set_target-> tahun = $request->tahun;
        $set_target -> id_kuadran = $request-> id_kuadran;
        $set_target -> id_kpi = $request-> id_kpi;
        $set_target -> tipe_nilai = $request-> tipe_nilai;
        $set_target -> target_absolut = $request-> target_absolut;
        $set_target -> bobot = $request-> bobot;
        $set_target -> save();
        // alihkan halaman ke tbl_settarget_kerja

     return redirect('user.target_kerja.index')-> with('status', 'Data Setting Target Kerja Berhasil Ditambahkan!');


    }


    public function edit(Request $request, $id_settarget_kerja)
    {
        // dd($request->get('id_kuadran'));
       $update= DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $id_settarget_kerja)
      ->update([

       'tahun' => $request->tahun,
       'id_kuadran' => $request-> id_kuadran,
       'id_kpi' => $request-> id_kpi,
       'tipe_nilai'=>$request-> tipe_nilai,
       'target_absolut' => $request-> target_absolut,
       'bobot' => $request-> bobot,
       'status'=> 0,
      ]);
    //    dd($update);
        return redirect('user.target_kerja.index')-> with('status', 'Data Setting Traget Telah Berhasil Diubah!');
    }


    public function destroy($id_settarget_kerja)
    {
        DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $id_settarget_kerja)->delete();
        return redirect('user.target_kerja.index')-> with('status', 'Data Setting Traget Telah Berhasil Dihapuskan!');
    }


    public function apply($id)
    {
        DB::table('tbl_settarget_kerja')->where('id_employee', $id)->where('status','=','0')->update(['status'=>'1' ]);
        return redirect('user.target_kerja.index')-> with('status', 'Data Setting Target Kerja Telah Apply!');
    }

}
