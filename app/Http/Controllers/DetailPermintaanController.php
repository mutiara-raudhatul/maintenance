<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Permintaan_barang;
use App\Models\Status_permintaan;
use App\Models\User;
use App\Models\Users;
use App\Models\Detail_kebutuhan;
use App\Models\Jenis_barang;

class DetailPermintaanController extends Controller
{
    public function index($id_permintaan_barang)
    {
        
        $data_user   = DB::table('permintaan_barang')
        ->join('users', 'permintaan_barang.id_user', '=', 'users.id')
        ->where('permintaan_barang.id_permintaan_barang', '=', $id_permintaan_barang)
        ->get();

        $data_detail = DB::table('detail_kebutuhan')
        ->join('permintaan_barang', 'permintaan_barang.id_permintaan_barang', '=', 'detail_kebutuhan.id_permintaan_barang')
        ->join('users', 'permintaan_barang.id_user', '=', 'users.id')
        ->join('status_permintaan', 'permintaan_barang.id_status_permintaan','=','status_permintaan.id_status_permintaan')
        ->join('jenis_barang', 'detail_kebutuhan.id_jenis_barang','=','jenis_barang.id_jenis_barang')
        ->where('permintaan_barang.id_permintaan_barang', '=', $id_permintaan_barang)
        ->get();

        return view('permintaan-barang.detail-permintaan-barang', compact('data_detail', 'data_user'));
        //return redirect('detail-permintaan-barang', compact('data_detail', 'data_user'));
    }

    public function reject(Request $request, $id_permintaan_barang)
    {
        $status = 3;
        $update = DB::table('permintaan_barang')
        ->where('id_permintaan_barang','=', $id_permintaan_barang)
        ->update([
            'id_status_permintaan'=> $status
        ]);
        // return view('permintaan-barang.list_permintaan_barang', compact('update'));
        return back()->with('success', 'Permintaan Berhasil Ditolak!');

    }

    
}