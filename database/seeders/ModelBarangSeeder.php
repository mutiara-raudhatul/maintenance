<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_barang')->insert([
        	'id_model_barang' => '1',
            'model_barang' => 'Asus WF',
            'kode_jenis' => 'WR',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '2',
            'model_barang' => 'Huawei WR',
            'kode_jenis' => 'WR',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '3',
            'model_barang' => 'Infocus P92',
            'kode_jenis' => 'PJ',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '4',
            'model_barang' => 'Sony L982',
            'kode_jenis' => 'PJ',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '5',
            'model_barang' => 'Asus WF',
            'kode_jenis' => 'WR',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '6',
            'model_barang' => 'Asus CoreI7',
            'kode_jenis' => 'LP',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '7',
            'model_barang' => 'HP Notebook CoreI5',
            'kode_jenis' => 'NB',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '8',
            'model_barang' => 'Acer CoreI5',
            'kode_jenis' => 'LP',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '9',
            'model_barang' => 'Cisco c98',
            'kode_jenis' => 'SW',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '10',
            'model_barang' => 'Edimax ES50',
            'kode_jenis' => 'SW',
        ]);
        DB::table('model_barang')->insert([
        	'id_model_barang' => '11',
            'model_barang' => 'Netgear IGS300',
            'kode_jenis' => 'SW',
        ]);
    }
}
