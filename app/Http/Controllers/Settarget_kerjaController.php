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
use Illuminate\Support\Facades\Auth;

class Settarget_kerjaController extends Controller
{
    public function index($id)
    {

        if(isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            $set_target= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran', 'kuadran.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi', 'kpi.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('data_karyawan', 'data_karyawan.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.id_employee',$id)
            ->where('tbl_settarget_kerja.tahun', $tahun)
            ->get();
        } else {
            $set_target= DB:: table( 'tbl_settarget_kerja')
            ->join('kuadran', 'kuadran.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi', 'kpi.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('data_karyawan', 'data_karyawan.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->where('tbl_settarget_kerja.id_employee',$id)
            ->get();
        }

        $data_pegawai= DB:: table( 'tbl_settarget_kerja')
        ->join('data_karyawan', 'data_karyawan.id_employee', '=', 'tbl_settarget_kerja.id_employee')
        ->select('data_karyawan.nik_id', 'data_karyawan.nama', 'data_karyawan.jabatan', 'data_karyawan.divisi')
        ->first();

        $kuadrans= Kuadran::select('id_kuadran', 'kuadran')->get();
        $kpis= Kpi::select('id_kpi','nama_kpi')->get();

        return view('user.target_kerja.index', compact('kuadrans', 'kpis', 'set_target','data_pegawai'));

    }


    public function tambah(Request $request)
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
        //   echo "Tes";
        $user = Auth()->user();
        return redirect()->route('user.target_kerja', $user->id)-> with('status', 'Data Setting Target Kerja Berhasil Ditambahkan!');
    //  return redirect('user.target_kerja.index')-> with('status', 'Data Setting Target Kerja Berhasil Ditambahkan!');


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
    $user = Auth()->user();
    return redirect()->route('user.target_kerja', $user->id)-> with('status', 'Data Setting Traget Telah Berhasil Diubah!');
        // return redirect('user.target_kerja.index')-> with('status', 'Data Setting Traget Telah Berhasil Diubah!');
    }


    public function hapus($id_settarget_kerja)
    {
        // echo $id_settarget_kerja;exit;
        DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $id_settarget_kerja)->delete();
        $user = Auth()->user();
        // dd($user);
        return redirect()->route('user.target_kerja', $user->id)-> with('status', 'Data Setting Target Telah Berhasil Dihapuskan!');
    }


    public function apply($id)
    {
        // $user = Auth()->user()/;
        // dd($id);
        DB::table('tbl_settarget_kerja')->where('id_employee', $id)->where('status','=','0')->update(['status'=>'1' ]);
        return redirect()->route('user.target_kerja', $id)-> with('status', 'Data Setting Target Kerja Telah Apply!');
        // return redirect('user.target_kerja.index')-> with('status', 'Data Setting Target Kerja Telah Apply!');
    }

}
