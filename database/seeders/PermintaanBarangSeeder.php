<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermintaanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permintaan_barang')->insert([
            'id_permintaan_barang'=> '1',
            'nip_peminta'=> '3030',
            'tanggal_permintaan'=> '2022-01-19',
            'surat_izin'=> 'izin.pdf',
            'nip_teknisi'=> '5671',
            'catatan'=> 'keperluan operasional'         
        ]);
        DB::table('permintaan_barang')->insert([
            'id_permintaan_barang'=> '2',
            'nip_peminta'=> '3030',
            'tanggal_permintaan'=> '2022-01-22',
            'surat_izin'=> 'izin.pdf',
            'nip_teknisi'=> '5671',
            'catatan'=> 'untuk backup'         
        ]);
        DB::table('permintaan_barang')->insert([
            'id_permintaan_barang'=> '3',
            'nip_peminta'=> '3030',
            'tanggal_permintaan'=> '2022-01-29',
            'surat_izin'=> 'izin.pdf',
            'nip_teknisi'=> '5671',
            'catatan'=> 'butuh cepat karena kebutuhan kerja sama'         
        ]);
    }
}
