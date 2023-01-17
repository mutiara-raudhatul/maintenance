<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model_barang;
use App\Models\Jenis_barang;

class ModelBarangController extends Controller
{
    public function index()
    {
        //$dtModel = Model_barang::all();
        $dtModel = Model_barang::join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        ->get([
            'model_barang.id_model_barang', 'model_barang.model_barang', 'jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang'
        ]);
        return view('gudang.model-barang', compact('dtModel'));
    }

    public function getTambahModel()
    {
        $dtJenis = Jenis_barang::all();
        return view('gudang.tambah-model-barang', compact('dtJenis'));
    }

    public function createModel(Request $request)
    {        
        Model_barang::create([
            'model_barang' =>$request->model_barang,
            'id_jenis_barang' =>$request->id_jenis_barang,
        ]);

        return redirect('model-barang')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_model_barang)
    {
        // $editMd = Model_barang:: select('id_status_barang', 'status_barang')
        // ->where('id_status_barang', '=', $id_status_barang)
        // ->first();
        $editMd = Model_barang::join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        ->select('model_barang.id_model_barang', 'model_barang.model_barang', 'jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang')
        ->where('id_model_barang', '=', $id_model_barang)
        ->first();

        $id_jenis_barang = Model_barang::join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        ->select('jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang')
        ->where('id_model_barang', '=', $id_model_barang)
        ->first();

        $EditdtIDModel = Jenis_barang::whereNotIn('id_jenis_barang', [$id_jenis_barang->id_jenis_barang])->get();
        //dd($editSt);
        return view('gudang.update-model-barang', compact('editMd', 'EditdtIDModel'));
        
    }

    public function setUpdate(Request $request,$id_model_barang)
    {
        $update = Model_Barang::where('id_model_barang', $id_model_barang)->update([
            'model_barang' => $request->model_barang,
            'id_jenis_barang' => $request->id_jenis_barang,
        ]);
        if($update == true){
            return redirect('/model-barang')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/model-barang')->with('error', 'Update Gagal Dilakukan!');
        }
    }

    public function destroy($id_model_barang)
    {
        $model_hapus = Model_barang::findorfail($id_model_barang);
        $model_hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
