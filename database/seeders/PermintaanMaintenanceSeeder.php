<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermintaanMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permintaan_maintenance')->insert([
            'id_permintaan_maintenance'=> '1',
            'id_serial_number'=> 'LF7JDT',
            'tanggal_permintaan'=> '2022-02-10',
            'keterangan_maintenance'=> 'Layarnya bluescreen',
            'nip_teknisi'=> '5671',
            'jadwal_perbaikan' => '2022-02-11',
            'note'=>'udah bisa digunakan lagi',
            'lokasi'=>'ICT',
            'tanggal_selesai'=>'2022-02-11',
            'upload_form_maintenance'=>'maintenance_laptop.xls',
            'id_status_maintenance'=> '3'     
        ]);
        DB::table('permintaan_maintenance')->insert([
            'id_permintaan_maintenance'=> '2',
            'id_serial_number'=> 'NC2JDH',
            'tanggal_permintaan'=> '2022-03-30',
            'keterangan_maintenance'=> 'Keypadnya macet',
            'nip_teknisi'=> '5671',
            'jadwal_perbaikan' => '2022-04-2',
            'note'=>'',
            'lokasi'=>'ICT',
            'tanggal_selesai'=>'',
            'upload_form_maintenance'=>'',
            'id_status_maintenance'=> '1'
        ]);
    }
}
