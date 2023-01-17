<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jenis_barang;
use App\Models\Model_barang;
use App\Models\Status_barang;

class BarangController extends Controller
{
    public function index()
    {
        // $dataBarang = Barang::join('model_barang', 'barang.id_model_barang', '=', 'model_barang.id_model_barang')
        // ->join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        // ->join('status_barang', 'barang.id_jenis_status', '=', 'status_barang.id_jenis_barang')
        // ->get([
        //     'barang.id_barang', 'barang.id_serial_number', 'barang.asset_tag', 'barang.hostname', 
        //     'model_barang.id_model_barang', 'model_barang.model_barang',
        //     'jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang', 'jenis_barang.kode_barang',
        //     'status_barang.id_status_barang', 'status_barang.status_barang'
        // ]);

        //return view('gudang.jenis-barang', compact('dtJenis'));
    }

    public function getDataJenis()
    {
        $jenis = DB::table('jenis_barang')
        ->get([
            'jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang'
        ]);
        
        $jumlah = Jenis_barang::count();

        $jenisnya = [];
        $idjenisnya = [];
        foreach ($jenis as $key) {
            $jenisnya[]=$key->jenis_barang;
            $idjenisnya[]=$key->id_jenis_barang;
            $idnya=$key->id_jenis_barang;
            $hitungmodel = collect(DB::SELECT("SELECT count(id_model_barang) as jumlah_j from model_barang where id_jenis_barang='$idnya'"))->first();
            $jumlah_jenis[] = $hitungmodel->jumlah_j;
        }

        // $jumlah_model = Model_barang::count(); //where id model barang = per jenis barang

        return view('gudang.data-jenis-barang', compact('jenis', 'jumlah', 'jenisnya', 'idjenisnya', 'jumlah_jenis'));
    }

    public function getDataModel($id_jenis_barang)
    {

        $lihat_model = DB::table('model_barang')
        ->join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        ->where('jenis_barang.id_jenis_barang', '=', $id_jenis_barang)
        ->get([
            'model_barang.id_model_barang', 'model_barang.model_barang'
        ]);
        $jumlah = Model_barang::where('id_jenis_barang','=',$id_jenis_barang)->count();

       $modelnya = [];
       $idmodelnya = [];
       $jumlah_model = [];
       foreach ($lihat_model as $key) {
            $modelnya[]=$key->model_barang;
            $idmodelnya[]=$key->id_model_barang;
            $idnya=$key->id_model_barang;
            $hitungmodel = collect(DB::SELECT("SELECT count(id_barang) as jumlah_m from barang where id_model_barang='$idnya'"))->first();
            $jumlah_model[] = $hitungmodel->jumlah_m;
        }

        // $data_barang = DB::table('barang')
        // ->join('model_barang', 'barang.id_model_barang', '=', 'model_barang.id_model_barang')
        // ->join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        // ->join('status_barang', 'barang.id_status_barang', 'status_barang.id_status_barang')
        // // ->where('jenis_barang.jenis_barang', '=', $jenis)
        // ->where('jenis_barang.id_jenis_barang', '=', $id_jenis_barang)
        // -> distinct()
        // ->get([
        //     'model_barang.id_model_barang', 'model_barang.model_barang', 'barang.id_barang', 'barang.id_serial_number', 'barang.asset_tag', 'barang.hostname', 'status_barang.status_barang' 
        // ]);

        // $jumlah_detail = Barang::count(); // where id barang = per model

        //$jenis= Jenis_barang::all();

        return view('gudang.data-model-barang', compact('lihat_model', 'jumlah', 'modelnya', 'idmodelnya', 'jumlah_model'));
    }

    public function getDataDetail($id_model_barang)
    {
        $dataDetail = DB::table('barang')
        ->join('model_barang', 'barang.id_model_barang', '=', 'model_barang.id_model_barang')
        ->join('status_barang', 'barang.id_status_barang', 'status_barang.id_status_barang')
        ->where('model_barang.id_model_barang', '=', $id_model_barang)
        ->get([
            'barang.id_barang', 'barang.id_serial_number', 'barang.asset_tag', 'barang.hostname', 'status_barang.status_barang' 
        ]);

        $jumlah = Barang::count();

        return view('gudang.data-detail-barang', compact('dataDetail', 'jumlah'));
    }

    public function getDataDetailRequest()
    {
        //MENGAKSES KEMBALI HALAMAN DATA BARANG SETELAH DI SIMPAN DAN DI UPDATE
        
        $dataDetail = DB::table('barang')
        ->join('model_barang', 'barang.id_model_barang', '=', 'model_barang.id_model_barang')
        ->join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        ->join('status_barang', 'barang.id_status_barang', 'status_barang.id_status_barang')
        ->get([
            'barang.id_barang', 'jenis_barang.id_jenis_barang',  'model_barang.id_model_barang', 'status_barang.id_status_barang', 'jenis_barang.jenis_barang', 'model_barang.model_barang', 'barang.id_serial_number', 'barang.asset_tag', 'barang.hostname', 'status_barang.status_barang'
        ]);

        // $dataDetail = DB::table('barang')
        // ->join('model_barang', 'barang.id_model_barang', '=', 'model_barang.id_model_barang')
        // ->join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        // ->join('status_barang', 'barang.id_status_barang', 'status_barang.id_status_barang')
        // ->get([
        //     'barang.id_barang', 'jenis_barang.jenis_barang', 'model_barang.model_barang', 'barang.id_serial_number', 'barang.asset_tag', 'barang.hostname', 'status_barang.status_barang'
        // ]);

        $jumlah = Barang::count(); 

        return view('gudang.tampil-simpan-update-barang', compact('dataDetail', 'jumlah'));
    }

    public function getTambahBarang()
    {
        //dropdown
        $jenis_barang = Jenis_barang::all();
        $model_barang = Model_barang::all();
        $kode_perusahaan = "SIPDG";

        return view('gudang.tambah-barang', compact('jenis_barang', 'model_barang','kode_perusahaan'));
    }

    public function createBarang(Request $request)
    {       
        $kode_perusahaan = $request->kode_perusahaan;
        $bulan_tahun = $request->bulan_tahun;
        $kode_model = $request->id_model_barang;
        //$kode_barang = $request->id_jenis_barang;
        $kode_barang = Jenis_barang::select('kode_barang')
        ->where('id_jenis_barang','=',$request->id_jenis_barang)
        ->first();
        
        
        $AutoInc = 1;
        $id = Barang::all();
        $no;
        if($id == null)
        {
            $AutoInc = 1;
        }
        else
        {
            $AutoIn = Barang::max('id_barang');
            $AutoInc =  $AutoIn+1;
        }
        //$x = ((int)$data->kode)+1;
        $hasil_kode = sprintf("%02s", $kode_model);
        $hasil_autoInc = sprintf("%05s", $AutoInc);
    
        $asset_tag = $kode_perusahaan.$bulan_tahun."-".$hasil_kode."-".$kode_barang->kode_barang."-".$hasil_autoInc;
       // dd($asset_tag);
        
        $status_barang = 1;
        Barang::create([
            'id_jenis_barang' =>$request->id_jenis_barang,
            'id_serial_number' =>$request->id_serial_number,
            'id_model_barang' =>$request->id_model_barang,
            'asset_tag' => $asset_tag,
            'id_status_barang' => $status_barang,
        ]);
       
        return redirect('/tampil-simpan-update-barang')->with('toast_success', 'Data Berhasil Tersimpan');
    }

    public function getUpdate($id_barang)
    {
        
        $data = Barang::join('model_barang', 'model_barang.id_model_barang', '=', 'barang.id_model_barang')
        ->join('jenis_barang','jenis_barang.id_jenis_barang', '=','model_barang.id_jenis_barang')
        ->join('status_barang','status_barang.id_status_barang', '=','barang.id_status_barang')
        ->select('barang.id_barang', 'barang.id_serial_number', 'barang.asset_tag','barang.hostname', 'status_barang.id_status_barang', 'status_barang.status_barang',
            'model_barang.id_model_barang', 'model_barang.model_barang',
            'jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang')
        ->where('id_barang', '=', $id_barang)
        ->first();
        //dd($data);
        
        //jenis barang
        $id_jenis_barang = Barang::join('model_barang', 'barang.id_model_barang', '=', 'model_barang.id_model_barang')
        ->join('jenis_barang', 'model_barang.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        ->select('jenis_barang.id_jenis_barang', 'jenis_barang.jenis_barang')
        ->where('id_barang', '=', $id_barang)
        ->first();
        $edit_jenis_barang = Jenis_barang::whereNotIn('id_jenis_barang', [$id_jenis_barang->id_jenis_barang])->get();
        
        //model barang
        $id_model_barang = Barang::join('model_barang', 'barang.id_model_barang', '=', 'model_barang.id_model_barang')
        ->select('model_barang.id_model_barang', 'model_barang.model_barang')
        ->where('id_barang', '=', $id_barang)
        ->first();
        $edit_model_barang = Model_barang::whereNotIn('id_model_barang', [$id_model_barang->id_model_barang])->get();

        //status
        $id_status_barang = Barang::join('status_barang', 'barang.id_status_barang', '=', 'status_barang.id_status_barang')
        ->select('status_barang.id_status_barang', 'status_barang.status_barang')
        ->where('id_barang', '=', $id_barang)
        ->first();
        $edit_status_barang = Status_barang::whereNotIn('id_status_barang', [$id_status_barang->id_status_barang])->get();


        return view('gudang.update-barang', compact('data', 'edit_jenis_barang', 'edit_model_barang', 'edit_status_barang'));
        
    }

    public function setUpdate(Request $request,$id_barang)
    {
        $update = Barang::where('id_barang', $id_barang)->update([
            'id_serial_number' => $request->id_serial_number,
            'id_model_barang' => $request->id_model_barang,
            'id_status_barang' => $request->id_status_barang,
            // 'asset_tag' => $request->asset_tag,
        ]);
        //dd( $request->asset_tag);
        if($update == true){
            return redirect('/tampil-simpan-update-barang')->with('toast_success', 'Update Berhasil Dilakukan');
        }
        else{
            return redirect('/tampil-simpan-update-barang')->with('error', 'Update Gagal Dilakukan!');
        }
    }

    // public function destroy($id_jenis_barang)
    // {
    //     $jenis_hapus = Jenis_barang::findorfail($id_jenis_barang);
    //     $jenis_hapus->delete();
    //     return back()->with('success', 'Data berhasil dihapus!');
    // }
}
