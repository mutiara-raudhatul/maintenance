<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_maintenance;
use App\Models\Jenis_check;
use App\Models\Jenis_barang;
use App\Models\Check;

class CheckController extends Controller
{
    public function index()
    {
        $dtCheck = Check::join('jenis_check', 'jenis_check.id_jenis_check', '=', 'check.id_jenis_check')
        ->join('jenis_barang', 'jenis_barang.id_jenis_barang', '=', 'check.id_jenis_barang')
        ->select('check.id_check','check.check','check.kondisi','check.informasi','jenis_check.id_jenis_check','jenis_check.jenis_check', 'jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang')
        ->paginate(15);
        //dd($dtJenisC);
        return view('maintenance.list-check', ['dtCheck' => $dtCheck]);
    }

    public function getTambah()
    {
        $jenis_check = Jenis_check::all();
        $jenis_barang = Jenis_barang::all();

        return view('maintenance.tambah-check', ['jenis_check' => $jenis_check, 'jenis_barang' => $jenis_barang]);
    }

    public function setTambah(Request $request)
    {        
        Check::create([
            'id_check' => $request->id_jenis_check,
            'check' => $request->check,
            'id_jenis_check' =>$request->jenis_check,
            'tipe_check' =>$request->tipe_check,
            'id_jenis_barang' =>$request->jenis_barang,
        ]);
        return redirect('check')->with('toast_success', 'Data Berhasil Tersimpan');


    }

    public function destroy($id_check)
    {
        $hapus = Check::findorfail($id_check);
        $hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
