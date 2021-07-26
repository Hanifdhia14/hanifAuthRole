<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('employee.index', ['employee'=>$employee]);
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
            'nik_id' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'direktorat' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
        ]);

        $employee = new employee;
        $employee-> nik_id = $request-> nik_id;
        $employee-> nama = $request-> nama;
        $employee-> jabatan = $request-> jabatan;
        $employee-> divisi = $request-> divisi;
        $employee-> direktorat= $request-> direktorat;
        $employee-> alamat = $request-> alamat;
        $employee-> email = $request-> email;
        $employee-> no_tlp = $request-> no_tlp;
        $employee->save();

        // alihkan halaman ke halaman pegawai
        return redirect('employee.index')-> with('status', 'Data Employee Telah Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
          'nik_id' => 'required',
          'nama' => 'required',
          'jabatan' => 'required',
          'divisi' => 'required',
          'direktorat' =>'required',
          'alamat' => 'required',
          'email' => 'required',
          'no_tlp' => 'required',
      ]);
        if ($request->isMethod('POST')) {
            $empl = $request->all();
        }
        //$employee=DB::table('employee')->where('nik', $request->nik)->update([
        // 'nik' => $request->nik,
        //'nama' => $request->nama,
        //   'level' => $request->level,
        //  'jabatan' => $request->jabatan,
        //   'unit_kerja' => $request->unit_kerja,
        //   'wilayah' => $request->wilayah,
        // 'email' => $request->email,
        //]);
        Employee::where('nik', $request->nik)
         ->update([
           '$nik_id' => $request->nik_id,
           'nama' => $request->nama,
           'jabatan' => $request->jabatan,
           'divisi' => $request->divisi,
           'direktorat' => $request->direktorat,
           'alamat' => $request->alamat,
           'email' => $request->email,
           'no_tlp' => $request->no_tlp
       ]);
        return redirect('employee.index')-> with('status', 'Data Employee Telah Berhasil Diubah!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_id)
    {  // menghapus data Kuadran berdasarkan id yang dipilih
        DB::table('employee')->where('nik_id', $nik_id)->delete();

        // alihkan halaman ke halaman kuadran
        return redirect('employee.index')-> with('status', 'Data Employee Telah Berhasil Dihapus!');
    }
}
