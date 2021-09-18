<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class Create_userController extends Controller
{
    public function index()
    {
        $create_user= User::all();
        return view('create_user.index', ['create_user'=>$create_user]);
    }
    public function store(Request $request)
    {
        $request->validate([
          'nama' => 'required',
          'email' => 'required',
          'role' => 'required',
          'password' => 'required',
      ]);
        $create_user= new User;
        $create_user-> nama = $request-> nama;
        $create_user-> email = $request-> email;
        $create_user-> role = $request-> role;
        $create_user-> password = $request-> password;
        $create_user->save();

        // alihkan halaman ke halaman Create User
        return redirect('create_user.index')-> with('status', 'Data Akses User Telah Berhasil Ditambahkan!');
    }
    public function edit(Request $request, User $create_user)
    {
        $request->validate([
          'nama' => 'required',
          'email' => 'required',
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
