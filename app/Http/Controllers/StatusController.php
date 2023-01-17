<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status_maintenance;


class StatusController extends Controller
{

    public function index()
    {
         $dtStatus = Status_maintenance::all();
        return view('maintenance.lihat-status', compact('dtStatus'));
    }

    public function getTambahStatus()
    {
        return view('maintenance.tambah-status');
    }

    public function createStatus(Request $request)
    {        
        Status_maintenance::create([
            'status_maintenance' =>$request->status_maintenance,
        ]);

        return redirect('status')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_status_maintenance)
    {
        $editSt = Status_maintenance:: select('id_status_maintenance', 'status_maintenance')
        ->where('id_status_maintenance', '=', $id_status_maintenance)
        ->first();
        //dd($editSt);
        return view('maintenance.update-status', compact('editSt'));
        
    }

    public function setUpdate(Request $request,$id_status_maintenance)
    {
        $update = Status_maintenance::where('id_status_maintenance', $id_status_maintenance)->update([
            'status_maintenance' => $request->status_maintenance,
        ]);
        if($update == true){
            return redirect('/status')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/status')->with('error', 'Update Gagal Dilakukan!');
        }
    }

    public function destroy($id_status_maintenance)
    {
        $status_hapus = Status_maintenance::findorfail($id_status_maintenance);
        $status_hapus->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
