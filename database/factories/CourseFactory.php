<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('now', '+2 month');
        return [
            //
            'name_course' => $this->faker-> sentence(4,true),
            'description' => $this->faker-> sentence(8,true),
            'start_date'  => $startDate,
            'end_date'    => $this->faker->dateTimeBetween($startDate, $startDate->format('Y-m-d').' +4 week')
        ];
    }
}
