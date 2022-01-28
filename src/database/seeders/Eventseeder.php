<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Eventseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'event_id' => 1,
            'category_id' => 1,
            'title' => 'Laravelのもくもくの会',
            'date' => '2021-11-07',
            'start_time' => '15:00:00',
            'end_time' => '19:00:00',
            'content' => 'テストの詳細',
            'entry_fee' => 100,
        ]);

        DB::table('events')->insert([
            'event_id' => 2,
            'category_id' => 2,
            'title' => 'Javeのもくもくの会',
            'date' => '2021-11-09',
            'start_time' => '16:00:00',
            'end_time' => '20:00:00',
            'content' => 'Javeの詳細',
            'entry_fee' => 200,
        ]);

        DB::table('events')->insert([
            'event_id' => 3,
            'category_id' => 3,
            'title' => 'TypeScriptのもくもくの会',
            'date' => '2021-11-17',
            'start_time' => '13:00:00',
            'end_time' => '15:00:00',
            'content' => 'TypeScriptの詳細',
            'entry_fee' => 400,
        ]);
    }
}
