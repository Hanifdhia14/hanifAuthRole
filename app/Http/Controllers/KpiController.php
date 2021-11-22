<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Kpi;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$kpi11 = DB::table('kpi11')->get();
        $kpi = Kpi::all();
        return view('Kpi.index', ['kpi'=>$kpi]);
    }


    public function store(Request $request)
    {
        $request->validate([
        'kode_kpi' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'nama_kpi' => 'required',
        'description' => 'required',
        'polaritas' => 'required',
        'rumus' => 'required',
        'satuan' => 'required',
        'dokumen' => 'required'
      ]);
        $kpi = new kpi;
        $kpi-> kode_kpi = $request-> kode_kpi;
        $kpi-> start_date = $request-> start_date;
        $kpi-> end_date = $request-> end_date;
        $kpi-> nama_kpi = $request-> nama_kpi;
        $kpi-> description = $request-> description;
        $kpi-> polaritas= $request-> polaritas;
        $kpi-> rumus= $request-> rumus;
        $kpi-> satuan= $request-> satuan;
        $kpi-> dokumen= $request-> dokumen;
        $kpi->save();
        // alihkan halaman ke halaman pegawai
        return redirect('kpi.index')-> with('status', 'Data KPI Telah Berhasil Ditambahkan!');
    }


    public function edit(Request $request, $id_kpi)
    {

        $request->validate([
          'kode_kpi' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'nama_kpi' => 'required',
          'description' => 'required',
          'polaritas' => 'required',
          'rumus' => 'required',
          'satuan' => 'required',
          'dokumen' => 'required'
      ]);

        DB::table('kpi1')->where('id_kpi',$id_kpi)->update($request->except(['_token']));
        return redirect('kpi.index')-> with('status', 'Data kpi Telah Berhasil Diubah!');
    }

    public function destroy($id_kpi)
    {
        // menghapus data kpi berdasarkan kode_kpi yang dipilih
        DB::table('kpi1')->where('id_kpi',$id_kpi)->delete();


        // alihkan halaman ke halaman kpi
        return redirect('kpi.index')-> with('status', 'Data KPI Telah Berhasil Dihapuskan!');
    }
}
