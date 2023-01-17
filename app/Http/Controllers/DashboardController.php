<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Permintaan_maintenance;
use App\Models\Detail_permintaan_barang;
use App\Models\Permintaan_barang;
use App\Models\Status_permintaan;
use App\Models\Jenis_barang;
use App\Models\Barang;
use App\Models\Users;
use App\Models\Respon_maintenance;
use App\Models\Respon_permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashAT()
    {
        // $nip = \Auth::user()->nip;
        $nip = '3324';

        //jumlahhh
        $jumjenisbarang = Jenis_barang::count();
        $jumperminbarang = Permintaan_maintenance::count();
        $mintabarang = Permintaan_maintenance::where('id_status_maintenance','=','1')->count();
        $teknisi = Users::where('role','=','Teknisi')->count();
        $jumperbaikan = Permintaan_maintenance::where('id_status_maintenance','=','2')->count();

        //grafik 1
        $jenis_barang= Detail_permintaan_barang :: select ('detail_permintaan_barang.kode_jenis', 'jenis_barang.nama')
        -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','detail_permintaan_barang.kode_jenis')
        -> orderBy('kode_jenis', 'asc')
        -> distinct()
        -> get();

        $categories_jenis = [];
        foreach($jenis_barang as $jj){
            $categories_jenis[]=$jj->nama;
            $cate_jenis=$jj->kode_jenis;
            $chartuser_jenis    = collect(DB::SELECT("SELECT count(id_permintaan_barang) AS jumlah from detail_permintaan_barang where kode_jenis='$cate_jenis'"))->first();
            $jumlah_jenis[] = $chartuser_jenis->jumlah;
        }

        //grafik 2
        $tahun= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%Y')) as byear"))
        -> orderBy('byear', 'asc')
        -> distinct()
        -> get();

        $categories = [];
        foreach($tahun as $tt){
            $categories[]=$tt->byear;
            $cate=$tt->byear;
            $chartuser_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where year(tanggal_permintaan)='$cate'"))->first();
            $jumlah_user_pb[] = $chartuser_pb->jumlah;

            $chartuser_pm    = collect(DB::SELECT("SELECT count(users.nip) AS jumlah from users join barang on barang.nip=users.nip join permintaan_maintenance on permintaan_maintenance.id_serial_number=barang.id_serial_number where year(permintaan_maintenance.tanggal_permintaan)='$cate'"))->first();
            $jumlah_user_pm[] = $chartuser_pm->jumlah;
        }

        //ini bulannya belum muncul
        $tahun_now=date('Y');

        $bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%m')) as bmonth"))
        -> orderBy('bmonth', 'asc')
        -> distinct()
        -> get();

        $nama_bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M')) as nmonth"))
        -> orderBy('nmonth', 'asc')
        -> distinct()
        -> get();

        $categories_bulan = [];
        foreach($bulan as $bb){
            foreach($nama_bulan as $nb){
            $categories_bulan[]=$nb->nmonth;
            }
            $catem=$bb->bmonth;
            $chartuser_bulan_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where month(tanggal_permintaan)='$catem'"))->first();
            $jumlah_user_bulan_pb[] = $chartuser_bulan_pb->jumlah;

            $chartuser_bulan_pm    = collect(DB::SELECT("SELECT count(users.nip) AS jumlah from users join barang on barang.nip=users.nip join permintaan_maintenance on permintaan_maintenance.id_serial_number=barang.id_serial_number where month(tanggal_permintaan)='$catem'"))->first();
            $jumlah_user_bulan_pm[] = $chartuser_bulan_pm->jumlah;
        }

        //grafik 4
        $jenis_maintenance= Permintaan_maintenance :: select ('permintaan_maintenance.id_serial_number', 'jenis_barang.kode_jenis', 'jenis_barang.nama')
        -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
        -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
        -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','model_barang.kode_jenis')
        -> orderBy('kode_jenis', 'asc')
        -> distinct()
        -> get();

        $categories_maint = [];
        foreach($jenis_maintenance as $jm){
            $categories_maint[]=$jm->nama;
            $cate_maint=$jm->kode_jenis;
            $chartuser_maint  = collect(DB::SELECT("SELECT count(id_permintaan_maintenance) AS jumlah from permintaan_maintenance join barang on barang.id_serial_number=permintaan_maintenance.id_serial_number join model_barang on model_barang.id_model_barang=barang.id_model_barang join jenis_barang on jenis_barang.kode_jenis=model_barang.kode_jenis where jenis_barang.kode_jenis='$cate_maint'"))->first();
            $jumlah_maint[] = $chartuser_maint->jumlah;
        }

    	return view('Dashboard.dashboard-adminteknisi',
            compact(
                'jumjenisbarang', 
                'jumperminbarang', 
                'mintabarang', 
                'teknisi',
                'jumperbaikan',  
                'tahun', 
                'jenis_barang'), [
                'jenis_barang'=>$jenis_barang, 
                'jenis_maintenance'=>$jenis_maintenance, 
                'tahun'=>$tahun, 
                'categories'=>$categories, 
                'categories_jenis'=>$categories_jenis, 
                'categories_bulan'=>$categories_bulan, 
                'categories_maint'=>$categories_maint, 
                'jumlah_maint'=>$jumlah_maint, 
                'jumlah_user_pb'=>$jumlah_user_pb, 
                'jumlah_user_pm'=>$jumlah_user_pm, 
                'jumlah_jenis'=>$jumlah_jenis, 
                'jumlah_user_bulan_pb'=>$jumlah_user_bulan_pb, 
                'jumlah_user_bulan_pm'=>$jumlah_user_bulan_pm
            ]);
    }

    public function dashT()
    {
        // $nip = \Auth::user()->nip;
        $nip = '5671';

        //jumlahhh
        $jumjenisbarang = Jenis_barang::count();
 
        $jumperminbarang = Permintaan_barang:: join ('users','permintaan_barang.nip','=','users.nip') 
        -> where('permintaan_barang.nip','=',$nip)
        -> count();

        $jumperminmaintenance = Permintaan_maintenance::join ('users','permintaan_maintenance.nip','=','users.nip') 
        -> where('permintaan_maintenance.nip','=',$nip)
        -> count();

        $jumperbaikan = Respon_maintenance::where('nip_teknisi','=',$nip)->count();
        $jumpenugasan = Respon_permintaan::where('nip_teknisi','=',$nip)->count();

 //grafik 1
        $jenis_barang= Detail_permintaan_barang :: select ('detail_permintaan_barang.kode_jenis', 'jenis_barang.nama')
        -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','detail_permintaan_barang.kode_jenis')
        -> orderBy('kode_jenis', 'asc')
        -> distinct()
        -> get();

        $categories_jenis = [];
        foreach($jenis_barang as $jj){
            $categories_jenis[]=$jj->nama;
            $cate_jenis=$jj->kode_jenis;
            $chartuser_jenis    = collect(DB::SELECT("SELECT count(id_permintaan_barang) AS jumlah from detail_permintaan_barang where kode_jenis='$cate_jenis'"))->first();
            $jumlah_jenis[] = $chartuser_jenis->jumlah;
        }

        //grafik 2

        $tahun= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%Y')) as byear"))
        // -> where('permintaan_barang.nip','=',$nip)
        -> orderBy('byear', 'asc')
        -> distinct()
        -> get();

        $categories = [];
        foreach($tahun as $tt){
            $categories[]=$tt->byear;
            $cate=$tt->byear;
            $chartuser_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where year(tanggal_permintaan)='$cate'"))->first();
            $jumlah_user_pb[] = $chartuser_pb->jumlah;

            $chartuser_pm    = collect(DB::SELECT("SELECT count(nip) AS jumlah from permintaan_maintenance where year(tanggal_permintaan)='$cate'"))->first();
            $jumlah_user_pm[] = $chartuser_pm->jumlah;
        }

        //ini bulannya belum muncul
        $tahun_now=date('Y');

        $bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%m')) as bmonth"))
        -> orderBy('bmonth', 'asc')
        -> distinct()
        -> get();

        $nama_bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M')) as nmonth"))
        -> orderBy('nmonth', 'asc')
        -> distinct()
        -> get();

        $categories_bulan = [];
        foreach($bulan as $bb){
            foreach($nama_bulan as $nb){
            $categories_bulan[]=$nb->nmonth;
            }
            $catem=$bb->bmonth;
            $chartuser_bulan_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where month(tanggal_permintaan)='$catem'"))->first();
            $jumlah_user_bulan_pb[] = $chartuser_bulan_pb->jumlah;

            $chartuser_bulan_pm    = collect(DB::SELECT("SELECT count(nip) AS jumlah from permintaan_maintenance where month(tanggal_permintaan)='$catem'"))->first();
            $jumlah_user_bulan_pm[] = $chartuser_bulan_pm->jumlah;
        }

        //grafik 4
        $jenis_maintenance= Permintaan_maintenance :: select ('permintaan_maintenance.id_serial_number', 'jenis_barang.kode_jenis', 'jenis_barang.nama')
        -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
        -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
        -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','model_barang.kode_jenis')
        -> orderBy('kode_jenis', 'asc')
        -> distinct()
        -> get();

        $categories_maint = [];
        foreach($jenis_maintenance as $jm){
            $categories_maint[]=$jm->nama;
            $cate_maint=$jm->kode_jenis;
            $chartuser_maint    = collect(DB::SELECT("SELECT count(id_permintaan_maintenance) AS jumlah from permintaan_maintenance join barang on barang.id_serial_number=permintaan_maintenance.id_serial_number join model_barang on model_barang.id_model_barang=barang.id_model_barang join jenis_barang on jenis_barang.kode_jenis=model_barang.kode_jenis where jenis_barang.kode_jenis='$cate_maint'"))->first();
            $jumlah_maint[] = $chartuser_maint->jumlah;
        }

    	return view('Dashboard.dashboard-teknisi',
            compact(
                'jumjenisbarang', 
                'jumperminbarang',
                'jumperminmaintenance',
                'jumperbaikan',  
                'jumpenugasan',
                'tahun', 
                'jenis_barang'), [
                'jenis_barang'=>$jenis_barang, 
                'jenis_maintenance'=>$jenis_maintenance, 
                'tahun'=>$tahun, 
                'categories'=>$categories, 
                'categories_jenis'=>$categories_jenis, 
                'categories_bulan'=>$categories_bulan, 
                'categories_maint'=>$categories_maint, 
                'jumlah_maint'=>$jumlah_maint, 
                'jumlah_user_pb'=>$jumlah_user_pb, 
                'jumlah_user_pm'=>$jumlah_user_pm, 
                'jumlah_jenis'=>$jumlah_jenis, 
                'jumlah_user_bulan_pb'=>$jumlah_user_bulan_pb, 
                'jumlah_user_bulan_pm'=>$jumlah_user_bulan_pm
            ]);
    }

    public function dashK(){
        // $nip = \Auth::user()->nip;
        $nip = '3030';

        //jumlahhh
        $jumjenisbarang = Jenis_barang::count();
 
        $jumperminbarang = Permintaan_barang:: join ('users','permintaan_barang.nip','=','users.nip') 
        -> where('permintaan_barang.nip','=',$nip)
        -> count();

        $jumperminmaintenance = Permintaan_maintenance::join ('users','permintaan_maintenance.nip','=','users.nip') 
        -> where('permintaan_maintenance.nip','=',$nip)
        -> count();


    //grafik 1
       $jenis_barang= detail_permintaan_barang :: select ('detail_permintaan_barang.kode_jenis', 'jenis_barang.nama')
       -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','detail_permintaan_barang.kode_jenis')
       -> orderBy('kode_jenis', 'asc')
       -> distinct()
       -> get();

       $categories_jenis = [];
       foreach($jenis_barang as $jj){
           $categories_jenis[]=$jj->nama;
           $cate_jenis=$jj->kode_jenis;
           $chartuser_jenis    = collect(DB::SELECT("SELECT count(detail_permintaan_barang.id_permintaan_barang) AS jumlah from detail_permintaan_barang join permintaan_barang ON permintaan_barang.id_permintaan_barang=detail_permintaan_barang.id_permintaan_barang where detail_permintaan_barang.kode_jenis='$cate_jenis' and permintaan_barang.nip=$nip"))->first();
           $jumlah_jenis[] = $chartuser_jenis->jumlah;
       }

       //grafik 2
       $tahun= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%Y')) as byear"))
    //    -> where('permintaan_barang.nip','=',$nip)
       -> orderBy('byear', 'asc')
       -> distinct()
       -> get();

       $categories = [];
       foreach($tahun as $tt){
           $categories[]=$tt->byear;
           $cate=$tt->byear;
           $chartuser_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where year(tanggal_permintaan)='$cate' and nip=$nip"))->first();
           $jumlah_user_pb[] = $chartuser_pb->jumlah;

           $chartuser_pm    = collect(DB::SELECT("SELECT count(nip) AS jumlah from permintaan_maintenance where year(tanggal_permintaan)='$cate' and nip=$nip"))->first();
           $jumlah_user_pm[] = $chartuser_pm->jumlah;
       }

       //ini bulannya belum muncul
       $tahun_now=date('Y');

       $bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%m')) as bmonth"))
       -> orderBy('bmonth', 'asc')
       -> distinct()
       -> get();

       $nama_bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M')) as nmonth"))
       -> orderBy('nmonth', 'asc')
       -> distinct()
       -> get();

       $categories_bulan = [];
       foreach($bulan as $bb){
           foreach($nama_bulan as $nb){
           $categories_bulan[]=$nb->nmonth;
           }
           $catem=$bb->bmonth;
           $chartuser_bulan_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where month(tanggal_permintaan)='$catem' and nip=$nip"))->first();
           $jumlah_user_bulan_pb[] = $chartuser_bulan_pb->jumlah;

           $chartuser_bulan_pm    = collect(DB::SELECT("SELECT count(nip) AS jumlah from permintaan_maintenance where month(tanggal_permintaan)='$catem' and nip=$nip"))->first();
           $jumlah_user_bulan_pm[] = $chartuser_bulan_pm->jumlah;
       }

       //grafik 4
       $jenis_maintenance= Permintaan_maintenance :: select ('permintaan_maintenance.id_serial_number', 'jenis_barang.kode_jenis', 'jenis_barang.nama')
       -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
       -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
       -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','model_barang.kode_jenis')
       -> orderBy('kode_jenis', 'asc')
    //    -> where('permintaan_maintenance.nip','=',$nip)
       -> distinct()
       -> get();


            $categories_maint = [];
            foreach($jenis_maintenance as $jm){
                $categories_maint[]=$jm->nama;
                $cate_maint=$jm->kode_jenis;
                $chartuser_maint    = collect(DB::SELECT("SELECT count(id_permintaan_maintenance) AS jumlah from permintaan_maintenance join barang on barang.id_serial_number=permintaan_maintenance.id_serial_number join model_barang on model_barang.id_model_barang=barang.id_model_barang join jenis_barang on jenis_barang.kode_jenis=model_barang.kode_jenis where jenis_barang.kode_jenis='$cate_maint' and nip='$nip'"))->first();
                $jumlah_maint[] = $chartuser_maint->jumlah;
            }


       return view('Dashboard.dashboard-karyawan',
           compact(
               'jumjenisbarang', 
               'jumperminbarang',
               'jumperminmaintenance',
               'tahun', 
               'jenis_barang'), [
               'jenis_barang'=>$jenis_barang, 
               'jenis_maintenance'=>$jenis_maintenance, 
               'tahun'=>$tahun, 
               'categories'=>$categories, 
               'categories_jenis'=>$categories_jenis, 
               'categories_bulan'=>$categories_bulan, 
               'categories_maint'=>$categories_maint, 
               'jumlah_maint'=>$jumlah_maint, 
               'jumlah_user_pb'=>$jumlah_user_pb, 
               'jumlah_user_pm'=>$jumlah_user_pm, 
               'jumlah_jenis'=>$jumlah_jenis, 
               'jumlah_user_bulan_pb'=>$jumlah_user_bulan_pb, 
               'jumlah_user_bulan_pm'=>$jumlah_user_bulan_pm
           ]);
    }

    public function index()
    {
        //jumlahhh
        $jumjenisbarang = Jenis_barang::count();
        $jumbarang = Barang::count();
        $jumperminbarang = Permintaan_barang::count();
        $belumdiproses = Permintaan_barang::where('id_status_permintaan','=','1')->count();
        $jumperminmaintenance = Permintaan_maintenance::count();
        $jumuser = Users::count();

        $jenis_barang= Detail_permintaan_barang :: select ('detail_permintaan_barang.kode_jenis', 'jenis_barang.nama')
        -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','detail_permintaan_barang.kode_jenis')
        -> orderBy('kode_jenis', 'asc')
        -> distinct()
        -> get();

        $categories_jenis = [];
        foreach($jenis_barang as $jj){
            $categories_jenis[]=$jj->nama;
            $cate_jenis=$jj->kode_jenis;
            $chartuser_jenis    = collect(DB::SELECT("SELECT count(id_permintaan_barang) AS jumlah from detail_permintaan_barang where kode_jenis='$cate_jenis'"))->first();
            $jumlah_jenis[] = $chartuser_jenis->jumlah;
        }

        //ini betul
        $tahun= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%Y')) as byear"))
        -> orderBy('byear', 'asc')
        -> distinct()
        -> get();

        $categories = [];
        foreach($tahun as $tt){
            $categories[]=$tt->byear;
            $cate=$tt->byear;
            $chartuser_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where year(tanggal_permintaan)='$cate'"))->first();
            $jumlah_user_pb[] = $chartuser_pb->jumlah;
            
            $chartuser_pm    = collect(DB::SELECT("SELECT count(nip) AS jumlah from permintaan_maintenance where year(tanggal_permintaan)='$cate'"))->first();
            $jumlah_user_pm[] = $chartuser_pm->jumlah;
        }

        //ini bulannya belum muncul
        $tahun_now=date('Y');

        $bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%m')) as bmonth"))
        -> orderBy('bmonth', 'asc')
        -> distinct()
        -> get();

        $nama_bulan= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%M')) as nmonth"))
        -> orderBy('nmonth', 'asc')
        -> distinct()
        -> get();

        $categories_bulan = [];
        foreach($bulan as $bb){
            foreach($nama_bulan as $nb){
            $categories_bulan[]=$nb->nmonth;
            }
            $catem=$bb->bmonth;
            $chartuser_bulan_pb     = collect(DB::SELECT("SELECT count(nip_peminta) AS jumlah from permintaan_barang where month(tanggal_permintaan)='$catem'"))->first();
            $jumlah_user_bulan_pb[] = $chartuser_bulan_pb->jumlah;

            $chartuser_bulan_pm    = collect(DB::SELECT("SELECT count(nip) AS jumlah from permintaan_maintenance where month(tanggal_permintaan)='$catem'"))->first();
            $jumlah_user_bulan_pm[] = $chartuser_bulan_pm->jumlah;
        }

        // $jenis= Permintaan_barang :: join ('detail_permintaan_barang', 'permintaan_barang.id_permintaan_barang','=','detail_permintaan_barang.id_permintaan_barang')
        // -> join ('jenis_barang', 'detail_permintaan_barang.kode_jenis','=','jenis_barang.kode_jenis') 
        // -> get();

//         $jenis= Detail_permintaan_barang :: select ('jenis_barang.kode_jenis', 'jenis_barang.nama')
//         -> join ('jenis_barang', 'detail_permintaan_barang.kode_jenis','=','jenis_barang.kode_jenis')
//         -> orderBy('kode_jenis', 'asc')
//         -> distinct()
//         -> get();

//         $c_jenis = [];
//         foreach($jenis as $jj){
//             $c_jenis[]=$jj->jenis_barang;
//             $cate_j=$jj->kode_jenis;
//             $jumlah_j=[];
//             $chart_j = Detail_permintaan_barang::select ('id_detail_permintaan_barang')
//             -> where('kode_jenis','=',$cate_j)
//             -> count();
//             // $chart_j    = collect(DB::SELECT("SELECT count(id_detail_permintaan_barang) AS jum from detail_permintaan_barang where kode_jenis='$cate_j'"))->first();            
//             $jumlah_j[] = $chart_j;
//         }
// dd($chart_j);



        //Jumlah permintaan barang
        // $tot_permintaan_barang = Permintaan_barang::where(\DB::raw("DATE_FORMAT(tanggal_permintaan, '%Y')"),$value)->count();


        // $year = ['06-2022','07-2022','08-2022','09-2022'];

        //menyiapkan data untuk chart

        // $permintaan_maintenance = [];
        // foreach ($permintaan_maintenance as $key => $value) {
        //     $permintaan_maintenance[] = Permintaan_maintenance::where(\DB::raw("DATE_FORMAT(tanggal_permintaan, '%Y')"),$value)->count();
        // }

        // $permintaan_barang = [];
        // foreach ($permintaan_barang as $key => $value) {
        //     $permintaan_barang[] = Permintaan_barang::where(\DB::raw("DATE_FORMAT(tanggal_permintaan, '%Y')"),$value)->count();
        // }


// ------------------------------ini
        // $tahun= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%Y')) as byear"))
        // -> orderBy('byear', 'desc')
        // -> distinct()
        // -> get();


        // $categories=[];
        // foreach($tahun as $by){
        //     $categories=$by->byear;

        //     $pb=Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%Y')) as byear"),'=',$categories)
        //     -> count();
        // }
// ------------------------------------sampai ini

        // $tt= Permintaan_barang :: select (DB::raw("(DATE_FORMAT(tanggal_permintaan, '%Y')) as byear"))
        // -> orderBy('byear', 'desc')
        // -> distinct()
        // -> get();

        

        // $pm = [];
        // foreach ($tt as $key => $value) {
        //     $pm[] = Permintaan_maintenance::where(\DB::raw("DATE_FORMAT(tanggal_permintaan, '%Y')"),$value)->count();
        // }

        // $user = [];
        // foreach ($year as $key => $value) {
        //     $user[] = Permintaan_barang::where(\DB::raw("DATE_FORMAT(tanggal_permintaan, '%m-%Y')"),$value)->count();
        // }
        // return view('Dashboard.dashboard-admingudang',['$tahun'=>$tahun])->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));

        //grafik 4
        $jenis_maintenance= Permintaan_maintenance :: select ('permintaan_maintenance.id_serial_number', 'jenis_barang.kode_jenis', 'jenis_barang.nama')
        -> join ('barang', 'barang.id_serial_number','=','permintaan_maintenance.id_serial_number')
        -> join ('model_barang', 'model_barang.id_model_barang','=','barang.id_model_barang')
        -> join ('jenis_barang', 'jenis_barang.kode_jenis','=','model_barang.kode_jenis')
        -> orderBy('kode_jenis', 'asc')
        -> distinct()
        -> get();

        $categories_maint = [];
        foreach($jenis_maintenance as $jm){
            $categories_maint[]=$jm->nama;
            $cate_maint=$jm->kode_jenis;
            $chartuser_maint  = collect(DB::SELECT("SELECT count(id_permintaan_maintenance) AS jumlah from permintaan_maintenance join barang on barang.id_serial_number=permintaan_maintenance.id_serial_number join model_barang on model_barang.id_model_barang=barang.id_model_barang join jenis_barang on jenis_barang.kode_jenis=model_barang.kode_jenis where jenis_barang.kode_jenis='$cate_maint'"))->first();
            $jumlah_maint[] = $chartuser_maint->jumlah;
        }

    	return view('Dashboard.dashboard-admingudang', 
            compact(
                'jumjenisbarang', 
                'jumperminbarang', 
                'jumbarang', 
                'jumperminmaintenance', 
                'jumuser', 
                'belumdiproses', 
                'tahun', 
                'jenis_maintenance',
                'jenis_barang'), [
                'jenis_barang'=>$jenis_barang, 
                'tahun'=>$tahun, 
                'categories'=>$categories, 
                'categories_jenis'=>$categories_jenis, 
                'categories_bulan'=>$categories_bulan, 
                'categories_maint' => $categories_maint,
                'jumlah_user_pb'=>$jumlah_user_pb, 
                'jumlah_user_pm'=>$jumlah_user_pm, 
                'jumlah_jenis'=>$jumlah_jenis, 
                'jumlah_maint'=>$jumlah_maint,
                'jumlah_user_bulan_pb'=>$jumlah_user_bulan_pb, 
                'jumlah_user_bulan_pm'=>$jumlah_user_bulan_pm
            ]);
    }
}