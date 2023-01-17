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

class DetailPermintaanUserController extends Controller
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
        ->join('jenis_barang', 'detail_kebutuhan.id_jenis_barang','=','jenis_barang.id_jenis_barang')
        ->where('permintaan_barang.id_permintaan_barang', '=', $id_permintaan_barang)
        ->get();
        // dd($data_detail);
        // return view('permintaan-barang.detail-permintaan-barang', ['data_user' => $data_user, 'data_detail' => $data_detail]);
        return view('permintaan-barang.detail-permintaan-barang-user', compact('data_detail', 'data_user'));
    }
}
