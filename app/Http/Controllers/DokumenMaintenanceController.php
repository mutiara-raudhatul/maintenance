<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_barang;

class DokumenMaintenanceController extends Controller
{
    public function index()
    {
         $data = Jenis_barang::all();
        return view('maintenance.list-dokumen-maintenance', compact('data'));
    }

    public function getUpdate($id_jenis_barang)
    {
         $data = Jenis_barang::select('id_jenis_barang', 'jenis_barang')
         ->where('id_jenis_barang', '=', $id_jenis_barang)
         ->first();
        return view('maintenance.tambah_doc_maintenance', compact('data'));
    }

    public function setUpdate(Request $request,$id_jenis_barang)
    {        
        $request->validate([
            'template_form_maintenance' => 'required|mimes:pdf,doc,docx,xlsx,xls',
        ]);
        
        $template_name = $request->template_form_maintenance->getClientOriginalName() . '-' . time() . '-' . $request->template_form_maintenance->extension();
        $request->template_form_maintenance->move(public_path('template-doc'), $template_name);

        $update = Jenis_barang::where('id_jenis_barang', $id_jenis_barang)->update([
            'template_form_maintenance' => $template_name,
        ]);
        if($update == true){
            return redirect('/list-dokumen-maintenance')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/list-dokumen-maintenance')->with('error', 'Update Gagal Dilakukan!');
        }
    }

}
