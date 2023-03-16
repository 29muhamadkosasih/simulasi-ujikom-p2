<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('masyarakat')->insert([
            'nik'  => '32012600',
            'name'      => 'Muhamad Kosasih',
            'username'      => 'muhamadkosasih',
            'password'      => 'password',
            'telp'      => '0988658000',
        ]);
        DB::table('masyarakat')->insert([
            'nik'  => '11132000',
            'name'      => 'Christiano',
            'username'      => 'user',
            'password'      => 'password',
            'telp'      => '0988658000',
        ]);
        DB::table('masyarakat')->insert([
            'nik'  => '2222600',
            'name'      => 'Abdul Wahab',
            'username'      => 'user',
            'password'      => 'password',
            'telp'      => '0988658000',
        ]);
    }
}
