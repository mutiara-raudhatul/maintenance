<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respon_maintenance;
use App\Models\Jenis_maintenance;
use App\Models\Permintaan_maintenance;
use App\Models\Maintenance_teknisi;
use App\Models\Jenis_barang;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class MaintenanceTeknisiController extends Controller
{

    public function index($id_permintaan_maintenance)
    {
         $data = Maintenance_teknisi::join('permintaan_maintenance', 'permintaan_maintenance.id_permintaan_maintenance', '=','maintenance_teknisi.id_permintaan_maintenance')
         ->join('respon_maintenance', 'permintaan_maintenance.id_permintaan_maintenance', '=', 'respon_maintenance.id_permintaan_maintenance')
         ->join('users', 'users.id', '=', 'respon_maintenance.id_user')
         ->join('jenis_barang','jenis_barang.id_jenis_barang', '=','permintaan_maintenance.id_jenis_barang')
         ->join('model_barang', 'model_barang.id_jenis_barang', '=','jenis_barang.id_jenis_barang')
         ->join('barang', 'barang.id_model_barang','=','model_barang.id_model_barang')
         ->join('status_maintenance', 'status_maintenance.id_status_maintenance', '=', 'permintaan_maintenance.id_status_maintenance')
         ->select('permintaan_maintenance.tanggal_permintaan','permintaan_maintenance.keterangan','users.name','respon_maintenance.jadwal_perbaikan','jenis_barang.jenis_barang', 'status_maintenance.status_maintenance','maintenance_teknisi.lama_pengerjaan','maintenance_teknisi.upload_form_maintenance','maintenance_teknisi.note','maintenance_teknisi.lokasi','barang.id_serial_number')
         ->where('permintaan_maintenance.id_permintaan_maintenance','=', $id_permintaan_maintenance)
         ->orderBy('permintaan_maintenance.tanggal_permintaan', 'asc')
         ->first();
        return view('maintenance.list-maintenance-teknisi', ['data' => $data]);
    }

    public function getMaintenance()
    {
        $id_user = Auth::user()->id;
        $data = Maintenance_teknisi::join('permintaan_maintenance', 'permintaan_maintenance.id_permintaan_maintenance', '=','maintenance_teknisi.id_permintaan_maintenance')
         ->join('respon_maintenance', 'permintaan_maintenance.id_permintaan_maintenance', '=', 'respon_maintenance.id_permintaan_maintenance')
         ->join('users', 'users.id', '=', 'respon_maintenance.id_user')
         ->join('jenis_barang','jenis_barang.id_jenis_barang', '=','permintaan_maintenance.id_jenis_barang')
         ->join('status_maintenance', 'status_maintenance.id_status_maintenance', '=', 'permintaan_maintenance.id_status_maintenance')
         ->select('permintaan_maintenance.tanggal_permintaan','permintaan_maintenance.keterangan','permintaan_maintenance.id_user','users.name','respon_maintenance.jadwal_perbaikan','jenis_barang.jenis_barang', 'status_maintenance.status_maintenance','maintenance_teknisi.lama_pengerjaan','maintenance_teknisi.upload_form_maintenance','maintenance_teknisi.note','maintenance_teknisi.lokasi')
         ->where('respon_maintenance.id_user', '=', $id_user)
         ->orderBy('permintaan_maintenance.tanggal_permintaan', 'asc')
         ->paginate(15);
        return view('maintenance.list-maintenance-teknisi-teknisi', ['data' => $data]);
    }

    public function listRespon()
    {
        $id_user = Auth::user()->id;
        //$id_user=2;
        $data = Respon_maintenance::join('permintaan_maintenance', 'permintaan_maintenance.id_permintaan_maintenance', '=', 'respon_maintenance.id_permintaan_maintenance')
         ->join('users', 'users.id', '=', 'respon_maintenance.id_user')
         ->join('jenis_barang','jenis_barang.id_jenis_barang', '=','permintaan_maintenance.id_jenis_barang')
         ->join('maintenance_teknisi', 'maintenance_teknisi.id_permintaan_maintenance', '=','permintaan_maintenance.id_permintaan_maintenance','left outer')
         ->join('status_maintenance', 'status_maintenance.id_status_maintenance', '=', 'permintaan_maintenance.id_status_maintenance')
         ->select('permintaan_maintenance.tanggal_permintaan','permintaan_maintenance.keterangan','permintaan_maintenance.id_status_maintenance',
                'permintaan_maintenance.id_permintaan_maintenance','users.name','respon_maintenance.jadwal_perbaikan',
                'jenis_barang.jenis_barang', 'status_maintenance.status_maintenance','respon_maintenance.id_respon_maintenance',
                'maintenance_teknisi.lokasi','maintenance_teknisi.note','maintenance_teknisi.upload_form_maintenance', 'maintenance_teknisi.id_maintenance_teknisi')
         ->where('respon_maintenance.id_user', '=', $id_user)
         ->orderBy('permintaan_maintenance.tanggal_permintaan', 'asc')
         ->paginate(15);
        return view('maintenance.list-maintenance-teknisi-respon', ['data' => $data]);
    }

    public function getTambah($id_permintaan_maintenance)
    {
        $permintaan = Permintaan_maintenance::select('id_permintaan_maintenance')
        ->where('id_permintaan_maintenance','=', $id_permintaan_maintenance)
        ->first();

        $jenis_barang = Permintaan_maintenance::select('id_jenis_barang')
        ->where('id_permintaan_maintenance','=', $id_permintaan_maintenance)
        ->first();
        $id_jenis_barang = $jenis_barang->id_jenis_barang;
        //dd($id_jenis_barang);
        $barang = Barang::join('model_barang', 'model_barang.id_model_barang', '=', 'barang.id_model_barang')
        ->join('jenis_barang', 'jenis_barang.id_jenis_barang','=','model_barang.id_jenis_barang')
        ->select('barang.id_serial_number','model_barang.model_barang','jenis_barang.jenis_barang','jenis_barang.id_jenis_barang','barang.id_barang')
        ->where('jenis_barang.id_jenis_barang', '=', $id_jenis_barang)
        ->orderBy('jenis_barang.jenis_barang', 'asc')
        ->paginate(15);
        

        return view('maintenance.form-maintenance-teknisi', ['jenis_barang' => $jenis_barang, 'permintaan' => $permintaan, 'barang' => $barang]);
    }

     public function setTambah(Request $request, $id_permintaan_maintenance)
    {        
        
        $id_status_maintenance = 1;
        $id_user = Auth::user()->id;

        $request->validate([
            'upload_form_maintenance' => 'required|mimes:pdf,doc,docx,xlsx,xls',
        ]);
        
        $template_name = $request->upload_form_maintenance->getClientOriginalName() . '-' . time() . '-' . $request->upload_form_maintenance->extension();
        $request->upload_form_maintenance->move(public_path('dokumen-hasil'), $template_name);

        // $id_barang = Barang::where('id_serial_number','=', $request->id_barang)
        // ->select('id_barang') 
        // ->first();
        //$id_barang=1;
        Maintenance_teknisi::create([
            'lama_pengerjaan' => $request->lama_pengerjaan,
            'lokasi' =>$request->lokasi,
            'note' =>$request->note,
            'id_permintaan_maintenance' => $id_permintaan_maintenance,
            'upload_form_maintenance' =>$template_name,
            'id_barang' => $request->id_barang,
        ]);

        $id_status_maintenance = 3;
        Permintaan_maintenance::where('id_permintaan_maintenance', $id_permintaan_maintenance)->update([
            'id_status_maintenance' => $id_status_maintenance,
        ]);
        $id_status_barang = $request->status;
        $status_barang = Barang::where('id_barang','=', $request ->id_barang)->update([
            'id_status_barang' => $id_status_barang
        ]); 
        //dd($id_barang);
        return redirect('list-maintenance-teknisi-respon')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_maintenance_teknisi)
    {
        $edit = Maintenance_teknisi:: join('permintaan_maintenance','permintaan_maintenance.id_permintaan_maintenance','=','maintenance_teknisi.id_permintaan_maintenance')
        ->join('jenis_barang', 'jenis_barang.id_jenis_barang','=','permintaan_maintenance.id_jenis_barang')
        ->join('model_barang', 'model_barang.id_jenis_barang', '=','jenis_barang.id_jenis_barang')
        ->join('barang','barang.id_model_barang', '=','model_barang.id_model_barang')
        ->join('users','users.id','=','permintaan_maintenance.id_user')
        ->join('status_maintenance','status_maintenance.id_status_maintenance','=','permintaan_maintenance.id_status_maintenance')
        ->select('maintenance_teknisi.lama_pengerjaan','maintenance_teknisi.lokasi','maintenance_teknisi.note','maintenance_teknisi.upload_form_maintenance',
            'maintenance_teknisi.id_maintenance_teknisi','jenis_barang.jenis_barang','jenis_barang.id_jenis_barang', 'barang.id_serial_number', 'permintaan_maintenance.id_permintaan_maintenance','model_barang.model_barang')
        ->where('id_maintenance_teknisi', '=', $id_maintenance_teknisi)
        ->first();
        $jenis_barang = Jenis_barang::all();

        $jenis_barang = Permintaan_maintenance::join('maintenance_teknisi', 'maintenance_teknisi.id_permintaan_maintenance','=','permintaan_maintenance.id_permintaan_maintenance')
        ->select('permintaan_maintenance.id_jenis_barang')
        ->where('id_maintenance_teknisi','=', $id_maintenance_teknisi)
        ->first();
        $id_jenis_barang = $jenis_barang->id_jenis_barang;
        //dd($id_jenis_barang);
        $barang = Barang::join('model_barang', 'model_barang.id_model_barang', '=', 'barang.id_model_barang')
        ->join('jenis_barang', 'jenis_barang.id_jenis_barang','=','model_barang.id_jenis_barang')
        ->select('barang.id_serial_number','model_barang.model_barang','jenis_barang.jenis_barang','jenis_barang.id_jenis_barang','barang.id_barang')
        ->where('jenis_barang.id_jenis_barang', '=', $id_jenis_barang)
        ->orderBy('jenis_barang.jenis_barang', 'asc')
        ->whereNotIn('barang.id_serial_number', [$edit->id_serial_number])
        ->paginate(15);
        //dd($editSt);
        return view('maintenance.update-maintenance-teknisi', ['jenis_barang' => $jenis_barang, 'edit' => $edit, 'barang' => $barang]);
        
    }

    public function setUpdate(Request $request,$id_maintenance_teknisi)
    {
        $id_status_maintenance = 1;
        $id_user = Auth::user()->id;
        $request->validate([
            'upload_form_maintenance' => 'required|mimes:pdf,doc,docx,xlsx,xls',
        ]);
        
        $template_name = $request->upload_form_maintenance->getClientOriginalName() . '-' . time() . '-' . $request->upload_form_maintenance->extension();  
        $request->upload_form_maintenance->move(public_path('dokumen-hasil'), $template_name);
        $id_barang = Barang::where('id_serial_number','=', $request->id_barang)
        ->select('id_barang') 
        ->first();
        $update= Maintenance_teknisi::where('id_maintenance_teknisi', $id_maintenance_teknisi)
        ->update([
            'lama_pengerjaan' => $request->lama_pengerjaan,
            'lokasi' =>$request->lokasi,
            'note' =>$request->note,
            'id_permintaan_maintenance' => $request->id_permintaan_maintenance,
            'upload_form_maintenance' =>$template_name,
            'id_barang' => $id_barang->id_barang,
        ]);
        return redirect('list-maintenance-teknisi-respon')->with('toast_success', 'Data Berhasil Tersimpan');
    }



}
