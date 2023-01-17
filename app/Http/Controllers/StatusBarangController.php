<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status_barang;

class StatusBarangController extends Controller
{
    public function index()
    {
        $dtStatus = Status_barang::all();
        return view('gudang.status-barang', compact('dtStatus'));
    }

    public function getTambahStatus()
    {
        return view('gudang.tambah-status-barang');
    }

    public function createStatus(Request $request)
    {        
        Status_barang::create([
            'status_barang' =>$request->status_barang,
        ]);

        return redirect('status-barang')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_status_barang)
    {
        $editSt = Status_barang:: select('id_status_barang', 'status_barang')
        ->where('id_status_barang', '=', $id_status_barang)
        ->first();
        //dd($editSt);
        return view('gudang.update-status-barang', compact('editSt'));
        
    }

    public function setUpdate(Request $request,$id_status_barang)
    {
        $update = Status_Barang::where('id_status_barang', $id_status_barang)->update([
            'status_barang' => $request->status_barang,
        ]);
        if($update == true){
            return redirect('/status-barang')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/status-barang')->with('error', 'Update Gagal Dilakukan!');
        }
    }

    public function destroy($id_status_barang)
    {
        $status_hapus = Status_barang::findorfail($id_status_barang);
        $status_hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
