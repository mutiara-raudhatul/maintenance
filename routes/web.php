<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermintaanBarangController;
use App\Http\Controllers\PermintaanBarangUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusPermintaanController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\JenisMaintenanceController;
use App\Http\Controllers\JenisCheckController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DetailPermintaanController;
use App\Http\Controllers\Barang2Controller;
use App\Http\Controllers\DetailPermintaanUserController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\PermintaanMaintenanceController;
use App\Http\Controllers\ResponMaintenanceController;
use App\Http\Controllers\DokumenMaintenanceController;
use App\Http\Controllers\ResponPermintaanController;
use App\Http\Controllers\DetailResponPermintaanController;
use App\Http\Controllers\StatusBarangController;
use App\Http\Controllers\ModelBarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;

use App\Http\Controllers\MaintenanceTeknisiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});



// ----------------------------------------authenticate------------------------------------
    Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login')-> middleware('guest');
    Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('auth');
    Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'checkrole:admin_gudang']], function(){
    //Registrasi
    Route::get('/registrasi', 'App\Http\Controllers\RegistrasiController@index')->name('registrasi')-> middleware('auth');
    Route::post('/registrasi', 'App\Http\Controllers\RegistrasiController@store')->name('regis');

    //dashboard
    Route::get('/dashboard-admingudang', 'App\Http\Controllers\DashboardController@index')->name('dashboard-admingudang');
    Route::get('/history-admingudang', 'App\Http\Controllers\HistoriController@indexAG')->name('history-admingudang');
    Route::post('/history-admingudang', 'App\Http\Controllers\HistoriController@search')->name('search');
     
    //data user
    Route::get('/data-user', 'App\Http\Controllers\RegistrasiController@readData');
    Route::get('/edit-user/{id}', 'App\Http\Controllers\RegistrasiController@getUpdate');
    Route::post('/edit-user/{id}', 'App\Http\Controllers\RegistrasiController@setUpdate');
    Route::get('/delete-user/{id}', 'App\Http\Controllers\RegistrasiController@destroy')->name('delete-user');

    //---------------------------------------------BARANG
    Route::get('/data-jenis-barang',[BarangController::class, 'getDataJenis'])->name('data-jenis-barang'); //read
    Route::get('/data-model-barang/{id_jenis_barang}',[BarangController::class, 'getDataModel'])->name('data-model-barang');
    Route::get('/data-detail-barang/{id_model_barang}',[BarangController::class, 'getDataDetail'])->name('data-detail-barang');
    Route::get('/tampil-simpan-update-barang',[BarangController::class, 'getDataDetailRequest'])->name('tampil-simpan-update-barang');

    Route::get('/tambah-barang',[BarangController::class, 'getTambahBarang'])->name('tambah-barang'); //create
    Route::post('/simpan-barang',[BarangController::class, 'createBarang'])->name('simpan-barang');

    Route::get('/update-barang/{id_barang}',[BarangController::class, 'getUpdate'])->name('updateBarang'); //update
    Route::post('/update-barang/{id_barang}',[BarangController::class, 'setUpdate'])->name('update-barang');

    Route::get('/delete-barang/{id_barang}', [BarangController::class, 'destroy']);//delete

    //---------------------------------------------STATUS BARANG
    Route::get('/status-barang',[StatusBarangController::class, 'index'])->name('status-barang'); //read

    Route::get('/tambah-status-barang',[StatusBarangController::class, 'getTambahStatus'])->name('tambah-status-barang'); //create
    Route::post('/simpan-status-barang',[StatusBarangController::class, 'createStatus'])->name('simpan-status-barang');

    Route::get('/update-status-barang/{id_status_barang}',[StatusBarangController::class, 'getUpdate'])->name('updateStatusBarang'); //update
    Route::post('/update-status-barang/{id_status_barang}',[StatusBarangController::class, 'setUpdate']);

    Route::get('/delete-status-barang/{id_status_barang}', [StatusBarangController::class, 'destroy']);//delete

    //---------------------------------------------MODEL BARANG
    Route::get('/model-barang',[ModelBarangController::class, 'index'])->name('model-barang'); //read

    Route::get('/tambah-model-barang',[ModelBarangController::class, 'getTambahModel'])->name('tambah-model-barang'); //create
    Route::post('/simpan-model-barang',[ModelBarangController::class, 'createModel'])->name('simpan-model-barang');

    Route::get('/update-model-barang/{id_model_barang}',[ModelBarangController::class, 'getUpdate'])->name('updateModelBarang'); //update
    Route::post('/update-model-barang/{id_model_barang}',[ModelBarangController::class, 'setUpdate']);

    Route::get('/delete-model-barang/{id_model_barang}', [ModelBarangController::class, 'destroy']);//delete

    //---------------------------------------------JENIS BARANG
    Route::get('/jenis-barang',[JenisBarangController::class, 'index'])->name('jenis-barang'); //read

    Route::get('/tambah-jenis-barang',[JenisBarangController::class, 'getTambahJenis'])->name('tambah-jenis-barang'); //create
    Route::post('/simpan-jenis-barang',[JenisBarangController::class, 'createJenis'])->name('simpan-jenis-barang');

    Route::get('/update-jenis-barang/{id_jenis_barang}',[JenisBarangController::class, 'getUpdate'])->name('updateJenisBarang'); //update
    Route::post('/update-jenis-barang/{id_jenis_barang}',[JenisBarangController::class, 'setUpdate']);

    Route::get('/delete-jenis-barang/{id_jenis_barang}', [JenisBarangController::class, 'destroy']);//delete

    //---------------------------------------------HALAMAN UTAMA--------------------------------------------
    Route::get('/halaman-utama', function () {
        return view('gudang/halaman-utama');
    });
    
    //------- PERMINTAAN ADMIN----------
    //read permintaan
    // Route::get('/permintaan-barang', [PermintaanBarangController::class, 'index']);
    Route::get('/permintaan-barang', [PermintaanBarangController::class, 'index'])->name('permintaan-barang');
    //-------STATUS PERMINTAAN----------
    //read status
    Route::get('/status-permintaan', [StatusPermintaanController::class, 'index']);
    //create status
    Route::get('/tambah-status-permintaan',[StatusPermintaanController::class, 'getTambahStatus'])->name('tambah-status-permintaan');
    Route::post('/simpan-statusP',[StatusPermintaanController::class, 'createStatus'])->name('simpan-statusP');
    //delete status
    Route::get('/delete-permintaan/{id_status_permintaan}', [StatusPermintaanController::class, 'destroy']);
    //update status
    // Route::get('/edit-status-permintaan/{id_status_permintaan}', [StatusPermintaanController::class, 'edit'])->name('edit-status-permintaan');
    Route::get('/edit-status-permintaan/{id_status_permintaan}', [StatusPermintaanController::class, 'getUpdate'])->name('edit-status-permintaan');
    Route::post('/update-status-permintaan/{id_status_permintaan}', [StatusPermintaanController::class, 'setUpdate'])->name('update-status-permintaan');
     //read
    Route::get('/detail-permintaan-barang/{id_permintaan_barang}', [DetailPermintaanController::class, 'index'])->name('detail-permintaan-barang');
   
    //-------DETAIL PERMINTAAN----------
    //Route::get('/detail-permintaan-barang/{id_permintaan_barang}', [PermintaanBarangUserController::class, 'getDetailBarang']);
    // tolak permintaan barang
    Route::get('tolak-permintaan-barang/{id_permintaan_barang}', [DetailPermintaanController::class, 'reject']);
    // Route::get('/list-permintaan-barang',[PermintaanBarangController::class, 'listpermintaanbarang']);
    // Route::get('/list-permintaan-barang', function (listpermintaanbarang) {
    //     return view('permintaan-barang/list-permintaan-barang');
    // });
    //--------RESPON PERMINTAAN----------
    Route::get('/list-respon-permintaan',[ResponPermintaanController::class, 'index']);
    Route::get('/form-respon-permintaan/{id_permintaan_barang}',[ResponPermintaanController::class, 'getTambah']);
    Route::post('/tambah-respon-permintaan',[ResponPermintaanController::class, 'setTambah']);
    Route::get('/form-respon-barang',[DetailResponPermintaanController::class, 'getTambah']);
    Route::post('/tambah-barang-dipenuhi',[DetailResponPermintaanController::class, 'setTambah']);
    Route::get('/cancel-respon/{id_respon_permintaan}', [DetailResponPermintaanController::class, 'cancelRespon']);
    Route::get('/hapus-detail-dipenuhi/{id_detail_barang_dipenuhi}', [DetailResponPermintaanController::class, 'hapusBarang']); 
    Route::get('/detail-respon-permintaan/{id_respon_permintaan}',[DetailResponPermintaanController::class, 'index']);


});

Route::group(['middleware' => ['auth', 'checkrole:admin_teknisi']], function(){

    Route::get('/dashboard-adminteknisi', 'App\Http\Controllers\DashboardController@dashAT')->name('dashboard-adminteknisi');
    Route::get('/history-adminteknisi', 'App\Http\Controllers\HistoriController@indexAT')->name('history-adminteknisi');
    Route::post('/history-adminteknisi', 'App\Http\Controllers\HistoriController@searchAT')->name('searchAT');

    //----PERMINTAAN MAINTENANCE ADMIN
    Route::get('/list-permintaan-maintenance',[PermintaanMaintenanceController::class, 'index']);
    Route::get('/list-maintenance-teknisi/{id_permintaan_maintenance}',[MaintenanceTeknisiController::class, 'index']);

    //----RESPON MAINTENANCE
    Route::get('/list-respon-maintenance',[ResponMaintenanceController::class, 'index']);
    Route::get('/form-respon-maintenance/{id_permintaan_maintenance}',[ResponMaintenanceController::class, 'getTambah'])->name('respon');
    Route::post('/form-respon-maintenance/{id_permintaan_maintenance}',[ResponMaintenanceController::class, 'setTambah'])->name('responS');
    Route::get('/update-respon-maintenance/{id_respon_maintenance}',[ResponMaintenanceController::class, 'getUpdate'])->name('update');
    Route::post('/update-respon-maintenance/{id_respon_maintenance}',[ResponMaintenanceController::class, 'setUpdate'])->name('update');
    //------------------------------------DOKUMEN MAINTENANCE
    Route::get('/list-dokumen-maintenance',[DokumenMaintenanceController::class, 'index'])->name('dokumen');
    Route::get('/update-dokumen-maintenance/{id_jenis_barang}',[DokumenMaintenanceController::class, 'getUpdate'])->name('dokumen');
    Route::post('/update-dokumen-maintenance/{id_jenis_barang}',[DokumenMaintenanceController::class, 'setUpdate']);
    //------------------------------------STATUS
    Route::get('/status',[StatusController::class, 'index'])->name('status');
    Route::get('/tambah-status',[StatusController::class, 'getTambahStatus'])->name('tambah-status');
    Route::post('/simpan-statusM',[StatusController::class, 'createStatus'])->name('simpan-statusM');
    Route::get('/update-status/{id_status_maintenance}',[StatusController::class, 'getUpdate'])->name('updateStatus');
    Route::post('/update-status/{id_status_maintenance}',[StatusController::class, 'setUpdate']);
    Route::get('/delete-status-maintenance/{id_status_maintenance}', [StatusController::class, 'destroy']);
    //-----------------------------------JENIS MAINTENANCE
    Route::get('/jenis-maintenance',[JenisMaintenanceController::class, 'index'])->name('jenis-maintenance');
    Route::get('/tambah-jenis-maintenance',[JenisMaintenanceController::class, 'getTambah']);
    Route::post('/simpan-jenis-maintenance',[JenisMaintenanceController::class, 'setTambah'])->name('simpan-jenis');
    Route::get('/delete-jenis-maintenance/{id_jenis_maintenance}', [JenisMaintenanceController::class, 'destroy']);
    Route::get('/update-jenis-maintenance/{id_jenis_maintenance}',[JenisMaintenanceController::class, 'getUpdate'])->name('updateJenisM');
    Route::post('/update-jenis-maintenance/{id_jenis_maintenance}',[JenisMaintenanceController::class, 'setUpdate']);

});

Route::group(['middleware' => ['auth', 'checkrole:teknisi']], function(){

    Route::get('/dashboard-teknisi', 'App\Http\Controllers\DashboardController@dashT')->name('dashboard-teknisi');
    Route::get('/history-teknisi', 'App\Http\Controllers\HistoriController@indexT')->name('history-teknisi');
    Route::get('/history-barang-teknisi', 'App\Http\Controllers\HistoriController@indexTB')->name('history-barang-teknisi');
    //----MAINTENANCE TEKNISI
    Route::get('/list-maintenance-teknisi-respon',[MaintenanceTeknisiController::class, 'listRespon']);
    Route::get('/list-maintenance-teknisi',[MaintenanceTeknisiController::class, 'getMaintenance']);
    Route::get('/form-maintenance-teknisi/{id_permintaan_maintenance}',[MaintenanceTeknisiController::class, 'getTambah']);
    Route::post('/simpan-maintenance-teknisi/{id_permintaan_maintenance}',[MaintenanceTeknisiController::class, 'setTambah'])->name('simpanM');
    Route::get('/update-maintenance-teknisi/{id_maintenance_teknisi}',[MaintenanceTeknisiController::class, 'getUpdate']);
    Route::post('/update-maintenance-teknisi/{id_maintenance_teknisi}',[MaintenanceTeknisiController::class, 'setUpdate'])->name('updatePermintaan');

});

Route::group(['middleware' => ['auth', 'checkrole:karyawan']], function(){

    Route::get('/dashboard-karyawan', 'App\Http\Controllers\DashboardController@dashK');
    Route::get('/history-karyawan', 'App\Http\Controllers\HistoriController@indexK')->name('history-karyawan');
    Route::get('/history-barang-karyawan', 'App\Http\Controllers\HistoriController@indexKB')->name('history-barang-karyawan');

    
});

Route::group(['middleware' => ['auth', 'checkrole:karyawan,teknisi']], function(){

    //------- PERMINTAAN USER----------
    Route::get('/permintaan-barang-user', [PermintaanBarangUserController::class, 'index'])->name('permintaan-barang-user');
    Route::get('/cancel-permintaan-barang/{id_permintaan_barang}', [PermintaanBarangUserController::class, 'cancel']);
    // Route::get('/form-permintaan',[PermintaanBarangUserController::class, 'getTambah'])->name('form-permintaan');;
    // Route::post('/tambah-permintaan-barang/{id_pemintaan_barang}',[PermintaanBarangUserController::class, 'setTambah']);
    // Route::get('/form-permintaan-barang',[PermintaanBarangUserController::class, 'getTambah'])->name('form-permintaan-barang');
    Route::get('/form-permintaan', function () {
        return view('permintaan-barang/form-permintaan');
    });
    Route::get('/cancel-permintaan/{id_permintaan_barang}', [PermintaanBarangUserController::class, 'cancelPermintaan']);
    Route::get('/hapus-detail-kebutuhan/{id_detail_kebutuhan}', [PermintaanBarangUserController::class, 'hapusBarangKebutuhan']); 
    // Route::get('/detail-permintaan-barang/{id_permintaan_barang}', [PermintaanBarangUserController::class, 'getDetailBarang']);
    Route::get('/form-barang',[PermintaanBarangUserController::class, 'getTambahBarang']);
    Route::post('/tambah-permintaan-barang',[PermintaanBarangUserController::class, 'setTambah'])->name('tambah-permintaan-barang');

    // Route::get('/form-barang',[PermintaanBarangUserController::class, 'index']);
    // Route::get('/form-barang', function () {
    //     return view('permintaan-barang/form-barang');
    // });
    Route::post('/tambah-kebutuhan-barang',[PermintaanBarangUserController::class, 'setTambahBarang']);
    Route::get('/lihat-tambah-barang', [PermintaanBarangUserController::class, 'lihatTambahBarang']);
    // Route::get('/form-detail-barang', function () {
    //     return view('permintaan-barang/form-detail-barang');
    // });
    Route::get('/form-detail-barang', [PermintaanBarangUserController::class, 'getDetailBarang']);
    Route::get('/detail-permintaan-barang-user/{id_permintaan_barang}', [DetailPermintaanUserController::class, 'index'])->name('detail-permintaan-barang-user');
        //--------RESPON PERMINTAAN----------
    Route::get('/list-respon-permintaan-user',[ResponPermintaanController::class, 'indexUser']);
    Route::get('/detail-respon-permintaan-user/{id_respon_permintaan}',[DetailResponPermintaanController::class, 'indexUser']);

    //----PERMINTAAN MAINTENANCE USER
    Route::get('/permintaan-maintenance',[PermintaanMaintenanceController::class, 'getTambah']);
    Route::post('/simpan-permintaan-maintenance',[PermintaanMaintenanceController::class, 'setTambah'])->name('simpanPermintaan');

    Route::get('/update-permintaan-maintenance/{id_permintaan_maintenance}',[PermintaanMaintenanceController::class, 'getUpdate']);
    Route::post('/update-permintaan-maintenance/{id_permintaan_maintenance}',[PermintaanMaintenanceController::class, 'setUpdate'])->name('updatePermintaan');
    Route::get('/list-permintaan-maintenance-user',[PermintaanMaintenanceController::class, 'userIndex'])->name('list-permintaan-maintenance');
    Route::get('/cancel-permintaan-maintenance/{id_permintaan_maintenance}', [PermintaanMaintenanceController::class, 'cancel']);
    

});
// --------------------------------------------DASHBOARD------------------------------------------

// Route::get('/dashboard-admingudang', 'App\Http\Controllers\DashboardController@index')->name('dashboard-admingudang')-> middleware('auth');
// Route::get('/dashboard-adminteknisi', 'App\Http\Controllers\DashboardController@dashAT')->name('dashboard-adminteknisi')-> middleware('auth');
// Route::get('/dashboard-teknisi', 'App\Http\Controllers\DashboardController@dashT')- >name('dashboard-teknisi')-> middleware('auth');
// Route::get('/dashboard-karyawan', 'App\Http\Controllers\DashboardController@dashK')->name('dashboard-karyawan')-> middleware('auth');

//-----------------------------------------BARANG DI GUDANG-------------------------------------
