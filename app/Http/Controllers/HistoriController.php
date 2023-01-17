<?php

namespace App\Http\Controllers;

use App\Models\Permintaan_barang;
use App\Models\Permintaan_maintenance;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //search berdasarkan periode
    public function search (Request $request){
        
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $dtHistory = DB::table('permintaan_barang')
        ->join ('users', 'users.nip', '=', 'permintaan_barang.nip')
        -> join ('detail_kebutuhan', 'detail_kebutuhan.id_permintaan_barang', '=', 'permintaan_barang.id_permintaan_barang')
        -> join ('jenis_barang', 'detail_kebutuhan.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        -> join ('status_permintaan', 'permintaan_barang.id_status_permintaan', '=', 'status_permintaan.id_status_permintaan')
        -> select()
        -> whereBetween('tanggal_permintaan', [$fromDate , $toDate ])
        -> get();


        $by = Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> whereBetween('tanggal_permintaan', [$fromDate, $toDate])
        -> distinct()
        -> get();

        $dtWaktu = DB::table('permintaan_barang')
        // ->where('nip', '=', '1')
        // ->where('id', '=', Auth::guard('anggota')->user()->nip)
        ->get('tanggal_permintaan');

        $waktu = Permintaan_barang :: select ('tanggal_permintaan')
        -> first();
        
        $wkt=$waktu['tanggal_permintaan'];
        $tgl = date('d/F/Y', strtotime($wkt));
        $tgl2 = date('d/M/Y', strtotime($wkt));

        $array=explode('/',$tgl);
        $tanggal=$array[0];
        $bulan=$array[1];
        $tahun=$array[2];

        $array2=explode('/',$tgl2);
        $bln=$array2[1];

        return view('History.history-admingudang', compact('dtHistory', 'fromDate', 'toDate', 'waktu', 'tanggal', 'bulan', 'tahun', 'bln', 'by'));
    }

    public function searchAT (Request $request){
        
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $dtHistoryAT = DB::table('permintaan_maintenance')
        -> join ('users', 'users.nip', '=', 'permintaan_maintenance.nip')
        -> join ('jenis_barang', 'permintaan_maintenance.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        -> join ('status_maintenance', 'permintaan_maintenance.id_status_maintenance', '=', 'status_maintenance.id_status_maintenance')
        -> select()
        -> whereBetween('tanggal_permintaan', [$fromDate , $toDate ])
        -> orderBy('tanggal_permintaan', 'desc')
        -> get();

        $by = Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> whereBetween('tanggal_permintaan', [$fromDate, $toDate])
        -> distinct()
        -> get();

        $dtWaktu = DB::table('permintaan_barang')
        ->get('tanggal_permintaan');

        $waktu = Permintaan_barang :: select ('tanggal_permintaan')
        -> first();
        
        $wkt=$waktu['tanggal_permintaan'];
        $tgl = date('d/F/Y', strtotime($wkt));
        $tgl2 = date('d/M/Y', strtotime($wkt));

        $array=explode('/',$tgl);
        $tanggal=$array[0];
        $bulan=$array[1];
        $tahun=$array[2];

        $array2=explode('/',$tgl2);
        $bln=$array2[1];

        return view('History.history-adminteknisi', compact('dtHistoryAT', 'fromDate', 'toDate', 'waktu', 'tanggal', 'bulan', 'tahun', 'bln', 'by'));
    }

    public function indexAG(){


        $dtHistory = DB::table('permintaan_barang')
        -> join ('users', 'users.nip', '=', 'permintaan_barang.nip')
        -> join('detail_kebutuhan', 'detail_kebutuhan.id_permintaan_barang', '=', 'permintaan_barang.id_permintaan_barang')
        -> join ('jenis_barang', 'detail_kebutuhan.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        -> join ('status_permintaan', 'permintaan_barang.id_status_permintaan', '=', 'status_permintaan.id_status_permintaan')
        -> orderBy('tanggal_permintaan', 'desc')
        -> get();

        $by = Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> distinct()
        -> get();

        $dtWaktu = DB::table('permintaan_barang')
        // ->where('nip', '=', '1')
        // ->where('id', '=', Auth::guard('anggota')->user()->nip)
        -> get('tanggal_permintaan');

        $waktu = Permintaan_barang :: select ('tanggal_permintaan')
        -> first();
        
        $wkt=$waktu['tanggal_permintaan'];
        $tgl = date('d/F/Y', strtotime($wkt));
        $tgl2 = date('d/M/Y', strtotime($wkt));

        $array=explode('/',$tgl);
        $tanggal=$array[0];
        $bulan=$array[1];
        $tahun=$array[2];

        $array2=explode('/',$tgl2);
        $bln=$array2[1];

        return view('History.history-admingudang', compact('dtHistory', 'waktu', 'tanggal', 'bulan', 'tahun', 'bln', 'by'));
    }

    public function indexAT(){

        $dtHistoryAT = DB::table('permintaan_maintenance')
        -> join ('users', 'users.nip', '=', 'permintaan_maintenance.nip')
        -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
        -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
        -> join ('jenis_barang', 'jenis_barang.id_jenis_barang','=','model_barang.id_jenis_barang')
        -> join ('status_maintenance', 'permintaan_maintenance.id_status_maintenance', '=', 'status_maintenance.id_status_maintenance')
        -> orderBy('tanggal_permintaan', 'desc')
        -> get();

        $by = Permintaan_maintenance :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> distinct()
        -> get();

        $dtWaktu = DB::table('permintaan_maintenance')
        // ->where('nip', '=', '1')
        // ->where('id', '=', Auth::guard('anggota')->user()->nip)
        ->get('tanggal_permintaan');

        $waktu = Permintaan_maintenance :: select ('tanggal_permintaan')
        -> first();
        
        $wkt=$waktu['tanggal_permintaan'];
        $tgl = date('d/F/Y', strtotime($wkt));
        $tgl2 = date('d/M/Y', strtotime($wkt));

        $array=explode('/',$tgl);
        $tanggal=$array[0];
        $bulan=$array[1];
        $tahun=$array[2];

        $array2=explode('/',$tgl2);
        $bln=$array2[1];

        return view('History.history-adminteknisi', compact('dtHistoryAT', 'waktu', 'tanggal', 'bulan', 'tahun', 'bln', 'by'));
    }

    public function indexK(){
        $dtLogin= \Auth::user()->nip;

        $dtHistory = DB::table('permintaan_barang')
        -> join ('users', 'users.nip', '=', 'permintaan_barang.nip')
        -> join('detail_kebutuhan', 'detail_kebutuhan.id_permintaan_barang', '=', 'permintaan_barang.id_permintaan_barang')
        -> join ('jenis_barang', 'detail_kebutuhan.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        -> join ('status_permintaan', 'permintaan_barang.id_status_permintaan', '=', 'status_permintaan.id_status_permintaan')
        -> orderBy('tanggal_permintaan', 'desc')
        -> where ('permintaan_barang.nip', '=', $dtLogin)
        -> get();

        $dtHistoryKM = DB::table('permintaan_maintenance')
        -> join ('users', 'users.nip', '=', 'permintaan_maintenance.nip')
        -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
        -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
        -> join ('jenis_barang', 'jenis_barang.id_jenis_barang','=','model_barang.id_jenis_barang')
        -> join ('status_maintenance', 'permintaan_maintenance.id_status_maintenance', '=', 'status_maintenance.id_status_maintenance')
        -> orderBy('tanggal_permintaan', 'desc')
        -> where ('permintaan_maintenance.nip', '=', $dtLogin)
        -> get();

        //--------------------------------log_maintenane
        $by = Permintaan_maintenance :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> where ('nip', '=', $dtLogin)
        -> distinct()
        -> get();
        
        $dtWaktu = DB::table('permintaan_maintenance')
        -> where ('nip', '=', $dtLogin)
        ->get('tanggal_permintaan');

        $waktu = Permintaan_maintenance :: select ('tanggal_permintaan')
        -> where ('nip', '=', $dtLogin)
        -> first();
        
        $wkt=$waktu['tanggal_permintaan'];
        $tgl = date('d/F/Y', strtotime($wkt));
        $tgl2 = date('d/M/Y', strtotime($wkt));

        $array=explode('/',$tgl);
        $tanggal=$array[0];
        $bulan=$array[1];
        $tahun=$array[2];

        $array2=explode('/',$tgl2);
        $bln=$array2[1];

        return view('History.history-karyawan', compact(
            'dtHistory', 'dtHistoryKM', 
            'waktu', 'tanggal', 'bulan', 'tahun', 'bln', 'by'
        )); 
    }

    public function indexKB(){
        $dtLogin= \Auth::user()->nip;

        $dtHistory = DB::table('permintaan_barang')
        -> join ('users', 'users.nip', '=', 'permintaan_barang.nip')
        -> join('detail_kebutuhan', 'detail_kebutuhan.id_permintaan_barang', '=', 'permintaan_barang.id_permintaan_barang')
        -> join ('jenis_barang', 'detail_kebutuhan.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        -> join ('status_permintaan', 'permintaan_barang.id_status_permintaan', '=', 'status_permintaan.id_status_permintaan')
        -> orderBy('tanggal_permintaan', 'desc')
        -> where ('permintaan_barang.nip', '=', $dtLogin)
        -> get();

        $dtHistoryKM = DB::table('permintaan_maintenance')
        -> join ('users', 'users.nip', '=', 'permintaan_maintenance.nip')
        -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
        -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
        -> join ('jenis_barang', 'jenis_barang.id_jenis_barang','=','model_barang.id_jenis_barang')
        -> join ('status_maintenance', 'permintaan_maintenance.id_status_maintenance', '=', 'status_maintenance.id_status_maintenance')
        -> orderBy('tanggal_permintaan', 'desc')
        -> where ('permintaan_maintenance.nip', '=', $dtLogin)
        -> get();

        //--------------------------------log_minta_barang
        $byb = Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> where ('nip', '=', $dtLogin)
        -> distinct()
        -> get();
        
        $dtWaktub = DB::table('permintaan_barang')
        -> where ('nip', '=', $dtLogin)
        ->get('tanggal_permintaan');

        $waktub = Permintaan_barang :: select ('tanggal_permintaan')
        -> where ('nip', '=', $dtLogin)
        -> first();
        
        $wktb=$waktub['tanggal_permintaan'];
        $tglb = date('d/F/Y', strtotime($wktb));
        $tgl2b = date('d/M/Y', strtotime($wktb));

        $arrayb=explode('/',$tglb);
        $tanggalb=$arrayb[0];
        $bulanb=$arrayb[1];
        $tahunb=$arrayb[2];

        $array2=explode('/',$tgl2b);
        $blnb=$array2[1];

        return view('History.history-barang-karyawan', compact(
            'dtHistory','waktub', 'tanggalb', 'bulanb', 'tahunb', 'blnb', 'byb'
        )); 
    }

    public function indexT(){
        $dtLogin= \Auth::user()->nip;

        $dtHistoryKM = DB::table('permintaan_maintenance')
        -> join ('users', 'users.nip', '=', 'permintaan_maintenance.nip')
        -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
        -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
        -> join ('jenis_barang', 'jenis_barang.id_jenis_barang','=','model_barang.id_jenis_barang')
        -> join ('status_maintenance', 'permintaan_maintenance.id_status_maintenance', '=', 'status_maintenance.id_status_maintenance')
        -> orderBy('tanggal_permintaan', 'desc')
        -> where ('permintaan_maintenance.nip', '=', $dtLogin)
        -> get();

        //--------------------------------log_maintenane
        $by = Permintaan_maintenance :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> where ('nip', '=', $dtLogin)
        -> distinct()
        -> get();
        
        $dtWaktu = DB::table('permintaan_maintenance')
        -> where ('nip', '=', $dtLogin)
        ->get('tanggal_permintaan');

        $waktu = Permintaan_maintenance :: select ('tanggal_permintaan')
        -> where ('nip', '=', $dtLogin)
        -> first();
        
        $wkt=$waktu['tanggal_permintaan'];
        $tgl = date('d/F/Y', strtotime($wkt));
        $tgl2 = date('d/M/Y', strtotime($wkt));

        $array=explode('/',$tgl);
        $tanggal=$array[0];
        $bulan=$array[1];
        $tahun=$array[2];

        $array2=explode('/',$tgl2);
        $bln=$array2[1];


        return view('History.history-teknisi', compact('dtHistoryKM', 'waktu', 'tanggal', 'bulan', 'tahun', 'bln', 'by')); 
    }

    public function indexTB(){
        $dtLogin= \Auth::user()->nip;

        $dtHistory = DB::table('permintaan_barang')
        -> join ('users', 'users.nip', '=', 'permintaan_barang.nip')
        -> join('detail_kebutuhan', 'detail_kebutuhan.id_permintaan_barang', '=', 'permintaan_barang.id_permintaan_barang')
        -> join ('jenis_barang', 'detail_kebutuhan.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang')
        -> join ('status_permintaan', 'permintaan_barang.id_status_permintaan', '=', 'status_permintaan.id_status_permintaan')
        -> orderBy('tanggal_permintaan', 'desc')
        -> where ('permintaan_barang.nip', '=', $dtLogin)
        -> get();

        //--------------------------------log_minta_barang
        $byb = Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M %Y')) as month_year"))
        -> orderBy('month_year', 'desc')
        -> where ('nip', '=', $dtLogin)
        -> distinct()
        -> get();
        
        $dtWaktub = DB::table('permintaan_barang')
        -> where ('nip', '=', $dtLogin)
        ->get('tanggal_permintaan');

        $waktub = Permintaan_barang :: select ('tanggal_permintaan')
        -> where ('nip', '=', $dtLogin)
        -> first();
        
        $wktb=$waktub['tanggal_permintaan'];
        $tglb = date('d/F/Y', strtotime($wktb));
        $tgl2b = date('d/M/Y', strtotime($wktb));

        $arrayb=explode('/',$tglb);
        $tanggalb=$arrayb[0];
        $bulanb=$arrayb[1];
        $tahunb=$arrayb[2];

        $array2=explode('/',$tgl2b);
        $blnb=$array2[1];

        return view('History.history-barang-teknisi', compact(
            'dtHistory','waktub', 'tanggalb', 'bulanb', 'tahunb', 'blnb', 'byb'
        )); 
    
    }
}