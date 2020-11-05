<?php

namespace Database\Seeders;

use App\Models\Participation;
use Illuminate\Database\Seeder;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Participation::factory(30)->create();
    }
}
