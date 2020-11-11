<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Problem;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problems = Problem::all();
        foreach ($problems as $problem) {
            DB::table('category_problem')->insert([
               'problem_id' => $problem->id,
                'category_id' => Category::all()->random()->id,
                'created_at' => date_create(),
                'updated_at' => date_create()
            ]);
        }
    }
}
