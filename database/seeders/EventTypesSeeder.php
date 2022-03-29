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
            "event_type_name" => "Конкурс",
            "event_type_logo_name" => "Chalenge.png",
        ]);

        DB::table('event_types')->insert([
            "event_type_name" => "Конференция",
            "event_type_logo_name" => "Conference.png",
        ]);

        DB::table('event_types')->insert([
            "event_type_name" => "Олимпиада",
            "event_type_logo_name" => "Olympiad.png",
        ]);
    }
}
