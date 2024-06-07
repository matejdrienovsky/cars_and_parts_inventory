<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seed the cars table with example data
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'Volvo',
            'registration_number'=>'AA328AD',
            'is_registered' => True,
        ]);
        DB::table('cars')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'Audi',
            'registration_number'=>'BB328BB',
            'is_registered' => True,
        ]);
        DB::table('cars')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'BMW',
            'is_registered' => False,
        ]);
    }
}
