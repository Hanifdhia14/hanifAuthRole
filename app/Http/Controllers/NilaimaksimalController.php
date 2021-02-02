<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nilaimaksimal;

use Illuminate\Support\Facades\DB;

class NilaimaksimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaimaksimal = Nilaimaksimal::all();
        return view('nilai_maksimal.index', ['nilai_maksimal'=>$nilaimaksimal]);
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
        'kode_nmax' => 'required',
        'nilai_maksimal'=> 'required',
    ]);
        $nilaimaksimal = new nilaimaksimal;
        $nilaimaksimal-> kode_nmax = $request-> kode_nmax;
        $nilaimaksimal-> nilai_maksimal = $request-> nilai_maksimal;
        $nilaimaksimal->save();
        // alihkan halaman ke halaman Nilai Maksimal
        return redirect('nilai_maksimal.index')-> with('status', 'Data Tipe Penilaian Telah Berhasil Diambahkan!');
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
    public function edit(Request $request, Nilaimaksimal $nilaimaksimal)
    {
        $request->validate([
      'kode_nmax' => 'required',
      'nilai_maksimal'=> 'required',
        ]);
        if ($request->isMethod('POST')) {
            $tp = $request->all();
        }
        Nilaimaksimal::where('kode_nmax', $request->kode_nmax)
          ->update([
            'kode_nmax'=> $request->kode_nmax,
            'nilai_maksimal'=> $request->nilai_maksimal
        ]);
        return redirect('nilai_maksimal.index')-> with('status', 'Data Nilai Maksimal Telah Berhasil Diubah!');
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
    public function destroy($kode_nmax)
    {
        // menghapus data nilai_maksimal berdasarkan kode_nmax yang dipilih
        DB::table('nilaimax')->where('kode_nmax', $kode_nmax)->delete();

        // alihkan halaman ke halaman nilai_maksimal
        return redirect('nilai_maksimal.index')-> with('status', 'Data Tipe Penilaian Telah Berhasil Dihapuskan!');
    }
}
