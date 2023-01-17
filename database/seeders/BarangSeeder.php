<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
        	'id_serial_number' => 'LB2JDH',
            'nip' => null,
            'asset_tag' => '20190400001',
            'id_model_barang' => '6',
            'id_status_barang' => '1'
        ]); 
        DB::table('barang')->insert([
        	'id_serial_number' => 'NC2JDH',
            'nip' => null,
            'asset_tag' => '20190400002',
            'id_model_barang' => '7',
            'id_status_barang' => '1'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'LF7JDT',
            'nip' => '5671',
            'asset_tag' => '20190400003',
            'id_model_barang' => '6',
            'id_status_barang' => '2'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'L844DH',
            'nip' => null,
            'asset_tag' => '20190400004',
            'id_model_barang' => '6',
            'id_status_barang' => '3'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'IJ4EYH',
            'nip' => null,
            'asset_tag' => '20190400005',
            'id_model_barang' => '3',
            'id_status_barang' => '1'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'IQ13OG',
            'nip' => null,
            'asset_tag' => '20190400006',
            'id_model_barang' => '3',
            'id_status_barang' => '5'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'PJ4907',
            'nip' => null,
            'asset_tag' => '20190400007',
            'id_model_barang' => '4',
            'id_status_barang' => '5'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'PJ49ZS',
            'nip' => null,
            'asset_tag' => '20190400008',
            'id_model_barang' => '3',
            'id_status_barang' => '4'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'PJ4PLK',
            'nip' => null,
            'asset_tag' => '20190400009',
            'id_model_barang' => '4',
            'id_status_barang' => '5'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'PJ44DH',
            'nip' => null,
            'asset_tag' => '20190400010',
            'id_model_barang' => '4',
            'id_status_barang' => '4'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'AW68DU',
            'nip' => null,
            'asset_tag' => '20190400011',
            'id_model_barang' => '1',
            'id_status_barang' => '3'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'HJ4HPO',
            'nip' => null,
            'asset_tag' => '20190400012',
            'id_model_barang' => '2',
            'id_status_barang' => '5'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'HJ434A',
            'nip' => null,
            'asset_tag' => '20190400013',
            'id_model_barang' => '2',
            'id_status_barang' => '1'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'CJ4ZAP',
            'nip' => null,
            'asset_tag' => '20190400014',
            'id_model_barang' => '2',
            'id_status_barang' => '1'
        ]);
        DB::table('barang')->insert([
        	'id_serial_number' => 'CJPO93',
            'nip' => null,
            'asset_tag' => '20190400015',
            'id_model_barang' => '2',
            'id_status_barang' => '1'
        ]);
    }
}
