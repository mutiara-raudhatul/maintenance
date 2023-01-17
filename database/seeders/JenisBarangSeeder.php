<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'RT',
            'nama' => 'Router',
            'id_jenis_maintenance' => '1',
            'template_form_maintenance' => 'maintenance_net_router.xls'
        ]);
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'SW',
            'nama' => 'Switch',
            'id_jenis_maintenance' => '1',
            'template_form_maintenance' => 'maintenance_net_switch.xls'
        ]);
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'WR',
            'nama' => 'Wireless',
            'id_jenis_maintenance' => '1',
            'template_form_maintenance' => 'maintenance_net_wireless.xls'
        ]);
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'FR',
            'nama' => 'Firewall',
            'id_jenis_maintenance' => '1',
            'template_form_maintenance' => 'maintenance_net_firewall.xls'
        ]);
//--------------------------------------------------------------------------------
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'PJ',
            'nama' => 'Projector',
            'id_jenis_maintenance' => '2',
            'template_form_maintenance' => 'maintenance_mult_projector.xls'
        ]);
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'LS',
            'nama' => 'Layar Screen',
            'id_jenis_maintenance' => '2',
            'template_form_maintenance' => 'maintenance_mult_layarscreen.xls'
        ]);
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'PR',
            'nama' => 'Printer',
            'id_jenis_maintenance' => '2',
            'template_form_maintenance' => 'maintenance_mult_printer.xls'
        ]);
//------------------------------------------------------------------------
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'NB',
            'nama' => 'Notebook',
            'id_jenis_maintenance' => '3',
            'template_form_maintenance' => 'maintenance_komputer_notebook.xls'
        ]);
        DB::table('jenis_barang')->insert([
            'kode_jenis' => 'LP',
            'nama' => 'Laptop',
            'id_jenis_maintenance' => '3',
            'template_form_maintenance' => 'maintenance_komputer_laptop.xls'
        ]);
    }
}
