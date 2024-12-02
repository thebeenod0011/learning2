<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Studentparent>
 */
class StudentparentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'father' => $this->faker->name,
            'mother' => $this->faker->name,
            'section' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'roll_no' => $this->faker->unique()->numberBetween(1, 100),
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => "9187" . $this->faker->unique()->numberBetween(999999, 000000),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'student_id' => $this->faker->numberBetween(125, 999999),

        ];
    }
}
