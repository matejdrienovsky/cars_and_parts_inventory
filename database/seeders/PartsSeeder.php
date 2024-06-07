<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class PartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seed the database with parts for each car.
     */
    public function run(): void
    {
        $parts = ['Engine', 'Brakes', 'Suspension', 'Transmission', 'Exhaust', 'Wheels', 'Tires', 'Interior', 'Exterior', 'Electronics'];
        $cars = DB::table('cars')->pluck('id');

        foreach ($cars as $car) {
            foreach ($parts as $part) {
                DB::table('parts')->insert([
                    'id' => Uuid::uuid4(),
                    'name' => $part,
                    'serialnumber'=> Str::random(10),
                    'car_id' => $car,
                ]);
            }
        }
    }
}
