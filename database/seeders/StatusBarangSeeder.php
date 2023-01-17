<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_barang')->insert([
        	'id_status_barang' => '1',
            'status_barang' => 'Tersedia'
        ]);
        DB::table('status_barang')->insert([
        	'id_status_barang' => '2',
            'status_barang' => 'Dipakai'
        ]);
        DB::table('status_barang')->insert([
        	'id_status_barang' => '3',
            'status_barang' => 'Rusak'
        ]);
        DB::table('status_barang')->insert([
        	'id_status_barang' => '4',
            'status_barang' => 'Diperbaiki'
        ]);
        DB::table('status_barang')->insert([
        	'id_status_barang' => '5',
            'status_barang' => 'Hilang'
        ]);
    }
}
