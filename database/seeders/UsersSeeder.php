<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'nip' => '3733',
            'role' => 'karyawan',
        	'username' => 'zulfahman',
            'name' => 'Zulfahman',
            'email' => 'zulfahman@gmail.com',
        	'password' => Hash::make('123456'),
            'unit_kerja' => 'Internal Audit',
            'eselon' => '2',
            'nohp' => '081266279891'
        ]);
        
        DB::table('users')->insert([
        	'nip' => '3276',
            'role' => 'admin_gudang',
        	'username' => 'alghazali',
            'name' => 'Alghazali',
            'email' => 'alghazali@gmail.com',
        	'password' => Hash::make('123456'),
            'unit_kerja' => 'EPDC Maintenance',
            'eselon' => '3',
            'nohp' => '081234567891'
        ]);

        DB::table('users')->insert([
        	'nip' => '3324',
            'role' => 'admin_teknisi',
        	'username' => 'wismalda',
            'name' => 'Wismalda',
            'email' => 'wismalda@gmail.com',
        	'password' => Hash::make('123456'),
            'unit_kerja' => 'RKC 23 Operation',
            'eselon' => '3',
            'nohp' => '081374347623'
        ]);


        DB::table('users')->insert([
        	'nip' => '5671',
            'role' => 'teknisi',
        	'username' => 'povita',
            'name' => 'Povita',
            'email' => 'povita@gmail.com',
        	'password' => Hash::make('123456'),
            'unit_kerja' => 'Mgt System',
            'eselon' => '4',
            'nohp' => '081344567891'
        ]);

        

        DB::table('users')->insert([
        	'nip' => '3030',
            'role' => 'karyawan',
        	'username' => 'danizen',
            'name' => 'Dani Zen',
            'email' => 'dani.zen@gmail.com',
        	'password' => Hash::make('123456'),
            'unit_kerja' => 'General Facility',
            'eselon' => '3',
            'nohp' => '081237877891'
        ]);
    }
}
