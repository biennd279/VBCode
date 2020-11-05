<?php

namespace Database\Seeders;

use App\Models\Contest;
use App\Models\Participation;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ContestSeeder::class,
            ParticipationSeeder::class,
            ProblemSeeder::class,
            CategorySeeder::class,
            CategoryProblemSeeder::class,
            SubmissionSeeder::class,

        ]);
    }
}
