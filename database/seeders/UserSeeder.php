<?php

namespace Database\Seeders;

use App\Models\Role;
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
            'role_id' => Role::first()->id,

        ]);
        User::factory(20)->create();

    }
}
