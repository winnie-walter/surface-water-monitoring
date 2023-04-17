<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flowrate>
 */
class FlowrateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'flowrate' => $this->faker->numberBetween(0,100),
            'day'=>$this->faker->randomelement(['monday','tuesday','wednesday','thursday','friday','saturday','sunday']),
            //
        ];
    }
}
