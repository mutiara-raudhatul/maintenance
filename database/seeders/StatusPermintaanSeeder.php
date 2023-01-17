<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPermintaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_permintaan')->insert([
        	'id_status_permintaan' => '1',
            'status_permintaan' => 'Diajukan',
            'keterangan'=> 'Permintaan barang telah diajukan kepada admin'
        ]); 
        DB::table('status_permintaan')->insert([
        	'id_status_permintaan' => '2',
            'status_permintaan' => 'Diterima',
            'keterangan'=> 'Permintaan barang telah diterima dan selesai'
        ]); 
        DB::table('status_permintaan')->insert([
        	'id_status_permintaan' => '3',
            'status_permintaan' => 'Ditolak',
            'keterangan'=> 'Permintaan barang telah ditolak oleh admin'
        ]); 
        DB::table('status_permintaan')->insert([
        	'id_status_permintaan' => '4',
            'status_permintaan' => 'Dipending',
            'keterangan'=> 'Permintaan barang sedang dalam proses pengadaan'
        ]); 
    }
}
