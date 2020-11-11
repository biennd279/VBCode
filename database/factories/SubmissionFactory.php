<?php

namespace Database\Factories;

use App\Models\Problem;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Submission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'result' => "Accepted",
            'file' => $this->faker->url,
            'point' => $this->faker->numberBetween(0, 100),
            'user_id' => User::all()->random()->id,
            'problem_id' => Problem::all()->random()->id
        ];
    }
}
