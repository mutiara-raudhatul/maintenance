<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_barang;
use App\Models\Jenis_maintenance;

class JenisBarangController extends Controller
{
    public function index()
    {
        $dtJenis = Jenis_barang::join('jenis_maintenance', 'jenis_barang.id_jenis_maintenance', '=', 'jenis_maintenance.id_jenis_maintenance')
        ->get([
            'jenis_barang.id_jenis_barang', 'jenis_barang.kode_barang', 'jenis_barang.jenis_barang', 'jenis_maintenance.id_jenis_maintenance', 'jenis_maintenance.jenis_maintenance'
        ]);

        return view('gudang.jenis-barang', compact('dtJenis'));
    }

    public function getTambahJenis()
    {
        $dtIDJenisMaintenance = Jenis_maintenance::all();
        $dtKode = Jenis_barang::all();

        return view('gudang.tambah-jenis-barang', compact('dtIDJenisMaintenance', 'dtKode'));
    }

    public function createJenis(Request $request)
    {        
        Jenis_barang::create([
            'jenis_barang' =>$request->jenis_barang,
            'kode_barang' =>$request->kode_barang,
            'id_jenis_maintenance' =>$request->id_jenis_maintenance,
        ]);
       
        return redirect('jenis-barang')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_jenis_barang)
    {
        
        $editJs = Jenis_barang::join('jenis_maintenance', 'jenis_barang.id_jenis_maintenance', '=', 'jenis_maintenance.id_jenis_maintenance')
        ->select('jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang', 'jenis_barang.kode_barang', 'jenis_maintenance.id_jenis_maintenance', 'jenis_maintenance.jenis_maintenance')
        ->where('id_jenis_barang', '=', $id_jenis_barang)
        ->first();

        $id_jenis_maintenance=Jenis_barang::join('jenis_maintenance', 'jenis_barang.id_jenis_maintenance', '=', 'jenis_maintenance.id_jenis_maintenance')
        ->select('jenis_maintenance.id_jenis_maintenance', 'jenis_maintenance.jenis_maintenance')
        ->where('id_jenis_barang', '=', $id_jenis_barang)
        ->first();
        
        $EditdtIDJenisMaintenance = Jenis_maintenance::whereNotIn('id_jenis_maintenance', [$id_jenis_maintenance->id_jenis_maintenance])->get();
        
        
        return view('gudang.update-jenis-barang', compact('editJs', 'EditdtIDJenisMaintenance'));
        
    }

    public function setUpdate(Request $request,$id_jenis_barang)
    {
        $update = Jenis_Barang::where('id_jenis_barang', $id_jenis_barang)->update([
            'jenis_barang' => $request->jenis_barang,
            'kode_barang' => $request->kode_barang,
            'id_jenis_maintenance' => $request->id_jenis_maintenance,
        ]);
        if($update == true){
            return redirect('/jenis-barang')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/jenis-barang')->with('error', 'Update Gagal Dilakukan!');
        }
    }

    public function destroy($id_jenis_barang)
    {
        $jenis_hapus = Jenis_barang::findorfail($id_jenis_barang);
        $jenis_hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
