<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Target_kerja;
use App\Models\User;

class ApprovalController extends Controller
{
    public function index()
    {
        $data_pegawai = DB::table('tbl_settarget_kerja')
            ->join('kuadran', 'kuadran.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi', 'kpi.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->join('data_karyawan', 'data_karyawan.id_employee', '=', 'tbl_settarget_kerja.id_employee')
            ->select('data_karyawan.nama', 'data_karyawan.jabatan', 'tbl_settarget_kerja.*', 'kuadran.kuadran', 'kpi.nama_kpi')
            ->get();

        $nama_pegawai = User::where('role', '=', 'user')->get();
        // dd($nama_pegawai);

        return view('leader.approv.index', compact('data_pegawai', 'nama_pegawai'));
    }
    public function detail($id)
    {
        $data_pegawai = DB::table('tbl_settarget_kerja')
            ->join('kuadran', 'kuadran.id_kuadran', '=', 'tbl_settarget_kerja.id_kuadran')
            ->join('kpi', 'kpi.id_kpi', '=', 'tbl_settarget_kerja.id_kpi')
            ->where('tbl_settarget_kerja.id_employee', '=', $id)
            ->where('tbl_settarget_kerja.status', '=', '1')
            ->select('tbl_settarget_kerja.*', 'kuadran.kuadran', 'kpi.nama_kpi')
            ->get();
        //  dd($data_pegawai);
        $nama_pegawai = User::where('id', '=', $id)->first();
        return view('leader.approv.detail', compact('data_pegawai', 'nama_pegawai'));
    }


    public function approv(Request $request)
    {
        DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $request->id_settarget_kerja)->update(['status' => '3']);

        // $temp = DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $request->id_settarget_kerja)->first();
        // Semester::create([
        //     'id_settarget_kerja	' => $temp->id_settarget_kerja,
        //     'semester1' => 0,
        //     'semester2' => 0,
        // ]);
        return redirect()->back()->with('status', 'Data Setting Target Kerja APPROVAL!');
    }
    public function editapprov(Request $request)
    {
        $edit =  DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $request->id_settarget_kerja)->first();
        return response()->json($edit);
    }
    public function notapprov(Request $request)
    {
        DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $request->id_settarget_kerja)->update(['status' => '2']);
        return redirect()->back()->with('status', 'Data Setting Target Kerja NOT  APPROVAL!');
    }
    public function komen(Request $request)
    {
        DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $request->id_settarget_kerja)->update(['komen' => $request->komen]);
        return redirect()->back()->with('komen', 'Data Umpan Balik Telah Dikirim');
    }
    public function editkomen(Request $request)
    {
        $komen =  DB::table('tbl_settarget_kerja')->where('id_settarget_kerja', $request->id_settarget_kerja)->first();
        return response()->json($komen);
    }
}
