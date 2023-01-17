<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\Users;
use App\Models\Users;
use App\Models\Respon_maintenance;
use App\Models\Jenis_maintenance;
use App\Models\Barang;
use App\Models\Permintaan_maintenance;

class ResponMaintenanceController extends Controller
{
    public function index()
    {
         $data = Respon_maintenance::join('permintaan_maintenance', 'permintaan_maintenance.id_permintaan_maintenance', '=', 'respon_maintenance.id_permintaan_maintenance')
         ->join('users', 'users.id', '=', 'respon_maintenance.id_user')
         ->join('jenis_barang','jenis_barang.id_jenis_barang', '=','permintaan_maintenance.id_jenis_barang')
         ->join('status_maintenance', 'status_maintenance.id_status_maintenance', '=', 'permintaan_maintenance.id_status_maintenance')
         ->select('permintaan_maintenance.tanggal_permintaan','permintaan_maintenance.keterangan','permintaan_maintenance.id_status_maintenance',
                'users.name','respon_maintenance.jadwal_perbaikan','jenis_barang.jenis_barang', 'status_maintenance.status_maintenance','respon_maintenance.id_respon_maintenance')
         ->orderBy('permintaan_maintenance.tanggal_permintaan', 'asc')
         ->paginate(15);
        return view('maintenance.list-respon-maintenance', ['data' => $data]);
    }

    public function getTambah($id_permintaan_maintenance)
    {
        $data = Permintaan_maintenance::select('id_permintaan_maintenance')
        ->where('id_permintaan_maintenance', '=', $id_permintaan_maintenance)
        ->first();
        $respon = Users::all();
        
        //dd($dateNow);
        //$role = Auth::user()->;
        return view('maintenance.form-respon-maintenance', ['respon' => $respon, 'data'=>$data]);
       // return view('maintenance.form-respon-maintenance');
    }

    public function setTambah(Request $request, $id_permintaan_maintenance)
    {        
        Respon_maintenance::create([
            'jadwal_perbaikan' =>$request->jadwal_perbaikan,
            'id_user' => $request->id_user,
            'id_permintaan_maintenance' =>$request->id_permintaan_maintenance,
        ]);

        $id_status_maintenance = 2;
        Permintaan_maintenance::where('id_permintaan_maintenance', $id_permintaan_maintenance)->update([
            'id_status_maintenance' => $id_status_maintenance,
        ]);

        return redirect('list-respon-maintenance')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_respon_maintenance)
    {
        $edit = Respon_maintenance::join('users','users.id','=','respon_maintenance.id_user')
        ->select('respon_maintenance.id_respon_maintenance', 'respon_maintenance.jadwal_perbaikan', 'users.name', 'users.id')
        ->where('id_respon_maintenance', '=', $id_respon_maintenance)
        ->first();
        //dd($editSt);
        $user= Users::whereNotIn('id',[$edit->id])
        ->get();
        return view('maintenance.update-respon-maintenance', ['edit' => $edit, 'user'=>$user]);
        
    }

    public function setUpdate(Request $request,$id_respon_maintenance)
    {
        $update = Respon_maintenance::where('id_respon_maintenance', $id_respon_maintenance)
        ->update([
            'jadwal_perbaikan' => $request->jadwal_perbaikan,
            'id_user' => $request->id_user,
        ]);
        if($update == true){
            return redirect('/list-respon-maintenance')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/list-respon-maintenance')->with('error', 'Update Gagal Dilakukan!');
        }
    }

}
