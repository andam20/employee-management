<?php

namespace Database\Factories;

use App\Models\ManagerLine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [    
            'name'=> $this->faker->word(),
            'manager_line_id' => '1',
            'email'=> $this->faker->email(),
            'age'=> $this->faker->numberBetween(5,70),
            'salary'=> $this->faker->numberBetween(500,1000),
            'hired_date' =>  $this->faker->date(),
            'job_title' => $this->faker->word(),
            'gender' => $this->faker->randomElement(["male","female"]),
        ];
    }
}
