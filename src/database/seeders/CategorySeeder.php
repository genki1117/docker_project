<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_id' => 1,
            'category_name' => 'Laravel'
        ]);

        DB::table('categories')->insert([
            'category_id' => 2,
            'category_name' => 'Jave'
        ]);

        DB::table('categories')->insert([
            'category_id' => 3,
            'category_name' => 'TypeScript'
        ]);
    }
}
