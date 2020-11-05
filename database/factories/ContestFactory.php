<?php

namespace Database\Factories;

use App\Models\Contest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName,
            'description' => $this->faker->text,
            'time_start' => $this->faker->dateTimeBetween('now', '1 years'),
            'time_end' => $this->faker->dateTimeBetween('now', '1 years'),
        ];
    }
}
