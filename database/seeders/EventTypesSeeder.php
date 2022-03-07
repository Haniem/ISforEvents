<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
            "event_type_name" => "Конкурс"
        ]);

        DB::table('event_types')->insert([
            "event_type_name" => "Конференция"
        ]);

        DB::table('event_types')->insert([
            "event_type_name" => "Олимпиада"
        ]);
    }
}
