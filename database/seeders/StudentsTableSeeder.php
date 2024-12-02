<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $faker = Faker::create();
        // for ($i = 0; $i < 1; $i++) {
        //     DB::table('students')->insert([
        //         'name' => $faker->name,
        //         'class' => $faker->numberBetween(1, 12),
        //         'section' => $faker->randomElement(['A', 'B', 'C', 'D']),
        //         'roll_no' => $faker->unique()->numberBetween(1, 100),
        //         'email' => $faker->unique()->safeEmail,
        //         'mobile' => "9187".$faker->unique()->numberBetween(999999,000000),
        //         'address' => $faker->address,
        //         'city' => $faker->city,
        //         'pincode' => $faker->numberBetween(111111,999999),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
