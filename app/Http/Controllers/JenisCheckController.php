<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_maintenance;
use App\Models\Jenis_check;

class JenisCheckController extends Controller
{
    public function index()
    {
        $dtJenisC = Jenis_check::join('jenis_maintenance', 'jenis_maintenance.id_jenis_maintenance', '=', 'jenis_check.id_jenis_maintenance')
        ->select('jenis_check.id_jenis_check', 'jenis_check.jenis_check', 'jenis_check.tipe_check', 'jenis_maintenance.id_jenis_maintenance', 'jenis_maintenance.jenis_maintenance')
        ->paginate(15);
        //dd($dtJenisC);
        return view('maintenance.list-jenis-check', ['dtJenisC' => $dtJenisC]);
    }

    public function getTambah()
    {
        $jenis_maintenance = Jenis_maintenance::all();

        return view('maintenance.tambah-jenis-check', ['jenis_maintenance' => $jenis_maintenance]);
    }

    public function setTambah(Request $request)
    {        
        Jenis_check::create([
            'id_jenis_check' => $request->id_jenis_check,
            'jenis_check' =>$request->jenis_check,
            'tipe_check' =>$request->tipe_check,
            'id_jenis_maintenance' =>$request->id_jenis_maintenance,
        ]);

        return redirect('jenis-check')->with('toast_success', 'Data Berhasil Tersimpan');


    }

    public function destroy($id_jenis_check)
    {
        $hapus = Jenis_check::findorfail($id_jenis_check);
        $hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
