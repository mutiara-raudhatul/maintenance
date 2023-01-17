<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_maintenance')->insert([
        	'id_status_maintenance' => '1',
            'status_maintenance' => 'Dilaporkan'
        ]);
        DB::table('status_maintenance')->insert([
        	'id_status_maintenance' => '2',
            'status_maintenance' => 'Diterima'
        ]);
        DB::table('status_maintenance')->insert([
        	'id_status_maintenance' => '3',
            'status_maintenance' => 'Selesai'
        ]);        
    }
}
