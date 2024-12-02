<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'class' => $this->faker->numberBetween(1, 12),
            'section' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'roll_no' => $this->faker->unique()->numberBetween(1, 100),
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => "9187" . $this->faker->unique()->numberBetween(999999, 000000),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'pincode' => $this->faker->numberBetween(111111, 999999),
        ]; 
    }
}
