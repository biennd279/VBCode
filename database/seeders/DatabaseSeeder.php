<?php

namespace Database\Seeders;

use App\Models\Contest;
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
        ]);

        User::factory(20)->create();
        Contest::factory(5)->create();
    }
}
