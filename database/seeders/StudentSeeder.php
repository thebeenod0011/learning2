<?php 
// database/seeders/StudentSeeder.php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use the factory to create 1000 students
        Student::factory(100)->create();
    }
}
