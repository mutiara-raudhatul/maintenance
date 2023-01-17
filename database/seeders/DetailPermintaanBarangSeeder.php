<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPermintaanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_permintaan_barang')->insert([
            'id_permintaan_barang'=> '1',        
            'kode_jenis'=> 'RT',
            'id_status_permintaan'=> '1'        
        ]);
        DB::table('detail_permintaan_barang')->insert([
            'id_permintaan_barang'=> '1',
            'kode_jenis'=> 'LS',
            'id_status_permintaan'=> '1'        
        ]);
        DB::table('detail_permintaan_barang')->insert([
            'id_permintaan_barang'=> '1',
            'kode_jenis'=> 'LP',
            'id_status_permintaan'=> '2'        
        ]);
        DB::table('detail_permintaan_barang')->insert([
            'id_permintaan_barang'=> '2',
            'kode_jenis'=> 'WR',
            'id_status_permintaan'=> '1'        
        ]);
        DB::table('detail_permintaan_barang')->insert([
            'id_permintaan_barang'=> '2',
            'kode_jenis'=> 'PR',
            'id_status_permintaan'=> '3'        
        ]);
        DB::table('detail_permintaan_barang')->insert([
            'id_permintaan_barang'=> '3',
            'kode_jenis'=> 'FR',
            'id_status_permintaan'=> '2'        
        ]);
        DB::table('detail_permintaan_barang')->insert([
            'id_permintaan_barang'=> '3',
            'kode_jenis'=> 'PR',
            'id_status_permintaan'=> '3'        
        ]);
    }
}
