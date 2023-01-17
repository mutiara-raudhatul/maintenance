<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceTeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maintenance_teknisi')->insert([
            'id_maintenance_teknisi'=> '1',
            'lama_pengerjaan'=> '1',
            'lokasi'=> 'ICT',
            'upload_form_maintenance'=> 'maintenance_laptop.xls',
            'note'=> 'udah bisa digunakan lagi',
            'id_permintaan_maintenance'=> '1'          
        ]);
    }
}
