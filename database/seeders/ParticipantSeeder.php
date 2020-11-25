<?php

namespace Database\Seeders;

use App\Models\Contest;
use App\Models\User;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $contests = Contest::all();
        $contests->each(function (Contest $contest) use ($users) {
           $contest->users()->sync($users->pluck('id')->toArray());
        });
    }
}
