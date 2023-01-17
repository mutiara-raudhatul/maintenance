<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_maintenance')->insert([
        	'id_jenis_maintenance' => '1',
            'jenis_maintenance' => 'Network'
        ]);

        DB::table('jenis_maintenance')->insert([
        	'id_jenis_maintenance' => '2',
            'jenis_maintenance' => 'Multimedia'
        ]);

        DB::table('jenis_maintenance')->insert([
        	'id_jenis_maintenance' => '3',
            'jenis_maintenance' => 'Komputer'
        ]);
    }
}
