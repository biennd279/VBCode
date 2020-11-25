<?php

namespace Database\Seeders;

use App\Models\Contest;
use App\Models\Participant;
use App\Models\Problem;
use App\Models\Submission;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record = 100000;
        $participants = Participant::all();
        $contest = Contest::first();
        $problems = $contest->problems;

        for($index = 0; $index < $record; $index++) {
            $problem = $problems->random(1)->first();
            $participant = $participants->random(1)->first();
            $user_id = $participant->user_id;
            $problem->submissions()->create([
                'result' => "Accepted",
                'file' => "/path/to/file.cpp",
                'status' => 'Accepted',
                'point' => rand(100, 200),
                'user_id' => $user_id,
            ]);
        }

    }
}
