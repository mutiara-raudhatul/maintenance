<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Permintaan_barang;
use App\Models\Status_permintaan;
use App\Models\Detail_kebutuhan;
use App\Models\User;
use App\Models\Users;
use App\Models\Jenis_barang;
use Illuminate\Support\Facades\Auth;

class PermintaanBarangUserController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        $data_permintaan = DB::table('permintaan_barang')
        ->join('users', 'permintaan_barang.id_user', '=', 'users.id')
        ->join('status_permintaan', 'permintaan_barang.id_status_permintaan','=','status_permintaan.id_status_permintaan')
        ->where('permintaan_barang.id_user', '=', $id_user)
        ->get([
            'permintaan_barang.id_permintaan_barang', 'permintaan_barang.tanggal_permintaan', 'status_permintaan.status_permintaan'
        ]);

        return view('permintaan-barang.list-permintaan-barang-user', compact('data_permintaan'));
    }
    //batal permintaan user
    public function cancel($id_status_permintaan)
    {
        $permintaan_batal = Permintaan_barang::findorfail($id_status_permintaan);
        $permintaan_batal->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    //tampil form permintaan 
    public function getTambah()
    {
        $role = Auth::user()->role;

        return view('permintaan-barang.form-permintaan', ['role'=>$role]);
    }

    //simpan data permintaan
    public function setTambah(Request $request)
    {   

        $this->validate($request, [
            
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]);

        $id_status_permintaan = 1;
        $id_user = Auth::user()->id;
        $role = Auth::user()->role;
       
        if($role=='karyawan') {
        $template_name = $request->surat_izin->getClientOriginalName() . '-' . time() . '-' . $request->surat_izin->extension();
        $request->surat_izin->move(public_path('template-doc'), $template_name);

       
        }else{
            $template_name=NULL;
            
        }
        $tambah = Permintaan_barang::create([
            'tanggal_permintaan'   => $request->tanggal_permintaan,
            'surat_izin'           => $template_name,
            'id_user'              => $id_user,
            'id_status_permintaan' => $id_status_permintaan
        ]);

        if($tambah == true){
            return redirect('/form-barang')->with('toast_success', 'Tambah Berhasil Dilakukan');
        }
        else{
            return redirect('/permintaan-barang-user')->with('error', 'Tambah Gagal Dilakukan!');
        }
    }

    //tampil form barang 
    public function getTambahBarang()
    {

        $role = Auth::user()->role;
    
        //note belum diganti
    if($role=='teknisi') {
        $jenis_barang = Jenis_barang::all();
        
    }else{
        $jenis_barang = Jenis_barang::select('id_jenis_barang', 'jenis_barang', 'kode_barang')
        ->where('jenis_barang', 'not like', '%Sparepart%')
        ->get();
    }

        // $id_terakhir = collect(db::select("select max (id_permintaan_barang) AS id_max FROM permintaan_barang"))->first();
        $id_terakhir = Permintaan_barang::select('id_permintaan_barang')
        ->ORDERBY('id_permintaan_barang', 'DESC')
        ->limit(1)
        // ->first()
        ->get();

         $id = Permintaan_barang::max('id_permintaan_barang');
          
        $data_barang = DB::table('detail_kebutuhan')
        ->join('permintaan_barang', 'detail_kebutuhan.id_permintaan_barang', '=', 'permintaan_barang.id_permintaan_barang')
        ->join('jenis_barang', 'detail_kebutuhan.id_jenis_barang','=','jenis_barang.id_jenis_barang')
        ->WHERE('detail_kebutuhan.id_permintaan_barang', '=', $id)
        ->get();
        // dd($data_barang);

         return view('permintaan-barang.form-barang' , compact('jenis_barang', 'id_terakhir','data_barang') );
    }

    //tambahkan kebutuhan barang
    public function setTambahBarang(Request $request)
    {
        $tambah = Detail_kebutuhan::create([
            'id_jenis_barang'      =>$request->id_jenis_barang,
            'jumlah_permintaan'    =>$request->jumlah_permintaan,
            'id_permintaan_barang' =>$request->id_terakhir
        ]);
        if($tambah == true){
            return redirect('/form-barang')->with('toast_success', 'Tambah Berhasil Dilakukan');
        }
        else{
            return redirect('/permintaan-barang-user')->with('error', 'Tambah Gagal Dilakukan!');
        }
    }

    public function cancelPermintaan($id_permintaan_barang)
    {
        // dd($id_permintaan_barang);
        $permintaan_batal=Permintaan_barang::select('id_permintaan_barang')
        ->where('id_permintaan_barang','=', $id_permintaan_barang)
        
        ->delete();
// dd($permintaan_batal);
        // $permintaan_batal = Permintaan_barang::findorfail($id_terakhir);
        // $permintaan_batal->delete();
         return redirect('/form-permintaan')->with('success', 'Data berhasil dihapus!');
    }

    public function getDetailBarang($id_permintaan_barang)
    {
        $permintaan_cek=Permintaan_barang::select('id_permintaan_barang')
        ->where('id_permintaan_barang','=', $id_permintaan_barang);

        $data_barang = DB::table('detail_kebutuhan')
        ->join('respon_permintaan', 'detail_kebutuhan.id_permintaan_barang', '=', 'respon_permintaan.id_permintaan_barang')
        ->join('permintaan_barang', 'respon_permintaan.id_permintaan_barang', '=', 'permintaan_barang.id_permintaan_barang')
        ->join('jenis_barang', 'detail_kebutuhan.id_jenis_barang','=','jenis_barang.id_jenis_barang')
        ->WHERE('detail_kebutuhan.id_permintaan_barang', '=',  $id_permintaan_barang)
        ->get([
            'permintaan_barang.id_permintaan_barang', 'detail_kebutuhan.jumlah_permintaan', 'jenis_barang.id_jenis_barang','jenis_barang.jenis_barang'
        ]);

        // dd($data_barang);
          return view('permintaan-barang.form-detail-barang' , compact('permintaan_cek','data_barang') );
    }

    public function hapusBarangKebutuhan($id_detail_kebutuhan)
        { 
            $hapus_barang = Detail_kebutuhan::findorfail($id_detail_kebutuhan);
            $brg = Detail_kebutuhan::select('id_jenis_barang')
            ->where('id_detail_kebutuhan', '=', $id_detail_kebutuhan)
            ->first();

            // $id_status_barang = 1;
            // $status_barang = Barang::where('id_barang','=', $brg ->id_barang)->update([
            //     'id_status_barang' => $id_status_barang
            // ]); 

            $hapus_barang->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');

        }


}
