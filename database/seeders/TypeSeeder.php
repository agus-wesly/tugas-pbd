<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            'name' => 'Sepatu',
          ]);
        DB::table('types')->insert([
        'name' => 'Baju',
        ]);
        DB::table('types')->insert([
        'name' => 'Tas',
        ]);
        DB::table('types')->insert([
        'name' => 'Jam tangan',
        ]);
        DB::table('types')->insert([
        'name' => 'Kacamata',
        ]);
           
    }
}
