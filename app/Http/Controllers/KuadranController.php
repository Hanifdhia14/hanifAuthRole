<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kuadran;

use Illuminate\Support\Facades\DB;

class KuadranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuadran = Kuadran::all();
        return view('kuadran.index', ['kuadran'=>$kuadran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
              'kode_kuadran' => 'required',
              'kuadran' => 'required',
              'start_date' => 'required',
              'end_date' => 'required',
          ]);

        $kuadran = new kuadran;
        $kuadran-> kode_kuadran = $request-> kode_kuadran;
        $kuadran-> kuadran = $request-> kuadran;
        $kuadran-> start_date = $request-> start_date;
        $kuadran-> end_date = $request-> end_date;
        $kuadran->save();
        // alihkan halaman ke halaman kuadran
        return redirect('kuadran.index')-> with('status', 'Data Kuadran Telah Berhasil Ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kuadran $kuadran)
    {
        $request->validate([
             'kode_kuadran' => 'required',
             'kuadran' => 'required',
             'start_date' => 'required',
             'end_date' => 'required',
         ]);
        if ($request->isMethod('POST')) {
            $kdr = $request->all();
        }
        Kuadran::where('kode_kuadran', $request->kode_kuadran)
           ->update([
             'kode_kuadran'=> $request->kode_kuadran,
             'kuadran'=> $request->kuadran,
             'start_date'=> $request->start_date,
             'end_date'=> $request->end_date
         ]);
        return redirect('kuadran.index')-> with('status', 'Data Kuadran Telah Berhasil Diubah!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_kuadran)
    {
        // menghapus data Kuadran berdasarkan kode_kuadran yang dipilih
        DB::table('kuadran1')->where('kode_kuadran', $kode_kuadran)->delete();

        // alihkan halaman ke halaman kuadran
        return redirect('kuadran.index')-> with('status', 'Data Kuadran Telah Berhasil Dihapuskan!');
    }
}
