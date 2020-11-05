<?php

namespace Database\Factories;

use App\Models\Contest;
use App\Models\Problem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Problem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'question' => $this->faker->text,
            'point' => $this->faker->numberBetween(100, 200),
            'contest_id' => Contest::all()->random(),
        ];
    }
}
