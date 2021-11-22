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

     function edit (Request $request, $id_kuadran)
    {
        // dd($id_kuadran);
        $this->validate($request, [
            'kode_kuadran' => 'required',
             'kuadran' => 'required',
             'start_date' => 'required',
             'end_date' => 'required',
        ]);

        DB::table('kuadran1')->where('id_kuadran',$id_kuadran)->update($request->except(['_token']));

        return redirect()->action([\App\Http\Controllers\KuadranController::class,'index'])
                        ->with('success','Kuadran Updated Successfully');
    }

    public function destroy($id_kuadran)
    {
        // menghapus data Kuadran berdasarkan kode_kuadran yang dipilih
        DB::table('kuadran1')->where('id_kuadran',$id_kuadran)->delete();

        // alihkan halaman ke halaman kuadran
        return redirect('kuadran.index')-> with('status', 'Data Kuadran Telah Berhasil Dihapuskan!');
    }
}
