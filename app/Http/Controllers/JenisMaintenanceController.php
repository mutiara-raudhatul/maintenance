<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_maintenance;


class JenisMaintenanceController extends Controller
{
    public function index()
    {
         $dtJenisM = Jenis_maintenance::all();
        return view('maintenance.list-jenis-maintenance', compact('dtJenisM'));
    }

    public function getTambah()
    {
        return view('maintenance.tambah-jenis-maintenance');
    }

    public function setTambah(Request $request)
    {        
        Jenis_maintenance::create([
            'jenis_maintenance' =>$request->jenis_maintenance,
        ]);

        return redirect('jenis-maintenance')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_jenis_maintenance)
    {
        $edit = Jenis_maintenance:: select('id_jenis_maintenance', 'jenis_maintenance')
        ->where('id_jenis_maintenance', '=', $id_jenis_maintenance)
        ->first();
        //dd($editSt);
        return view('maintenance.update-jenis-maintenance', compact('edit'));
        
    }

    public function setUpdate(Request $request,$id_jenis_maintenance)
    {
        $update = Jenis_maintenance::where('id_jenis_maintenance', $id_jenis_maintenance)->update([
            'jenis_maintenance' => $request->jenis_maintenance,
        ]);
        if($update == true){
            return redirect('/jenis-maintenance')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/jenis-maintenance')->with('error', 'Update Gagal Dilakukan!');
        }
    }

    public function destroy($id_jenis_maintenance)
    {
        $hapus = Jenis_maintenance::findorfail($id_jenis_maintenance);
        $hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
