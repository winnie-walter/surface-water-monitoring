<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\temperature>
 */
class TemperatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'temperature' => $this->faker->numberBetween(-10.0,100.0),
            'day'=>$this->faker->randomelement(['monday','tuesday','wednesday','thursday','friday','saturday','sunday']),
            //
        ];
    }
}
