<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Create_userController extends Controller
{
    public function index()
    {
        $create_user= User::all();
        $nama= Employee::select('nama')->get();
        return view('create_user.index', compact('create_user', 'nama'));


    }
    public function store(Request $request)
    {
        //      dd($request->all());
        $request->validate([
          'nama' => 'required',
          'email' => 'required',
          'nik_id' => 'required',
          'jabatan' => 'required',
          'divisi' => 'required',
          'direktorat' => 'required',
          'alamat' => 'required',
          'no_tlp' => 'required',
          'role' => 'required',
          'password' => 'required',
      ]);
        $create_user= new User;
        $create_user-> nama = $request-> nama;
        $create_user-> email = $request-> email;
        $create_user-> nik_id = $request-> nik_id;
        $create_user->divisi = $request->divisi;
        $create_user->jabatan = $request->jabatan;
        $create_user-> role = $request-> role;
        $create_user-> password = Hash::make($request-> password);
        $saveUser = $create_user->save();

        $newEmployeee = new Employee;
        $newEmployeee->nik_id = $request->nik_id;
        $newEmployeee->nama = $request->nama;
        $newEmployeee->jabatan = $request->jabatan;
        $newEmployeee->divisi = $request->divisi;
        $newEmployeee->direktorat = $request->direktorat;
        $newEmployeee->alamat = $request->alamat;
        $newEmployeee->email = $request->email;
        $newEmployeee->no_tlp = $request->no_tlp;
        $saveEmployee = $newEmployeee->save();

        if ($saveUser && $saveEmployee) {
            return redirect('create_user.index')-> with('status', 'Data Akses User Telah Berhasil Ditambahkan!');
        }
        else {
            return redirect('create_user.index')-> with('status', 'Data Akses User Telah Gagal Ditambahkan!');

        }
        // alihkan halaman ke halaman Create User
    }
    public function edit(Request $request, User $create_user)
    {
        $request->validate([
          'nama' => 'required',
          'email' => 'required',
          'nik_id' => 'required',
          'role' => 'required',
          'password' => 'required',
      ]);
        if ($request->isMethod('POST')) {
            $kdr = $request->all();
        }
        User::where('id', $request->id)
           ->update([
             'nama'=> $request->nama,
             'email'=> $request->email,
             'nik_id'=> $request->nik_id,
             'role'=> $request->role,
             'password' => $request->password,
         ]);
        return redirect('create_user.index')-> with('status', 'Data Akses Telah Berhasil Diubah!');
    }

    public function destroy($id)
    {
        // menghapus data akses berdasarkan id yang dipilih
        DB::table('users')->where('id', $id)->delete();

        // alihkan halaman ke halaman kuadran
        return redirect('create_user.index')-> with('status', 'Data Akses User Telah Berhasil Dihapuskan!');
    }
}
