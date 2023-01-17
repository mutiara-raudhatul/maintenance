<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class RegistrasiController extends Controller
{
    //menampilkan halaman registrasi
    public function index ()
    {
        return view('user.register');
    }

    //menyimpan data yang diregistrasi
    public function store (Request $request)
    {
        $validateData=$request->validate([
            'role'=>'required',
            'username'=>'required|max:255',
            'name'=>'required|max:255',
            'nip'=>'required|unique:users',
            'email'=> 'required|email|unique:users',
            'password'=>'required|min:6|max:255',
            'unit_kerja'=>'required',
            'eselon'=>'required',
            'nohp'=>'required'
        ]);

        // $validateData['password']=bcrypt($validateData['password']);

        $validateData['password']=Hash::make($validateData['password']);
        Users::create($validateData);
        return redirect('/login');
    }

    //menampilkan data user yang sudah terdaftar
    public function readData ()
    {
        $dtUsers = Users::all();
        $countUser = Users::count();

        $role= Users :: select ('role')
        -> orderBy('role', 'asc')
        -> distinct()
        -> get();

        return view('user.data-user', compact('dtUsers', 'countUser', 'role'));
    }

    //menampilkan halaman edit user
    public function getUpdate($id)
    {
        $updt = Users:: where('id', '=', $id)
        ->first();
        //dd($editSt);
        return view('user.edit-user', compact('updt'));  
    }

    //menyimpan data user yang diedit
    public function setUpdate(Request $request,$id)
    {
        $update = Users::where('id', $id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'username' => $request->username,
            'unit_kerja' => $request->unit_kerja,
            'email' => $request->email,
            'eselon' => $request->eselon,
            'nohp' => $request->nohp,
            'password' => $request->password
        ]);
        if($update == true){
            return redirect('/data-user')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/edit-user/{id}')->with('error', 'Update Gagal Dilakukan!');
        }
    }
    
    //menghapus data user yang dipilih
    public function destroy($id)
    {
        $user_hapus = Users::findorfail($id);
        $user_hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');   
    }
}
