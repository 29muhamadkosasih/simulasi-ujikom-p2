<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'name_petugas'  => 'Muhamad Kosasih',
            'username'      => 'admin',
            'password'      => 'password',
            'no_telp'       => '0877654679',
            'level'         => 'admin',
        ]);
        DB::table('petugas')->insert([
            'name_petugas'  => 'Muhamad Kosasih',
            'username'      => 'petugas',
            'password'      => 'password',
            'no_telp'       => '0877654679',
            'level'         => 'petugas',
        ]);
    }
}
