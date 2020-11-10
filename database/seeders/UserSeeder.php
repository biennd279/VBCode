<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'user' => 'test',
           'email' => 'test@mail.com',
           'name' => 'Test',
           'password' => bcrypt('password'),

        ]);
        User::factory(20)->create();

    }
}
