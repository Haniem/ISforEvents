<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_levels')->insert([
            "event_level_name" => "Внутриколледжный",
        ]);

        DB::table('event_levels')->insert([
            "event_level_name" => "Университетский",
        ]);

        DB::table('event_levels')->insert([
            "event_level_name" => "Городской",
        ]);

        DB::table('event_levels')->insert([
            "event_level_name" => "Областной",
        ]);

        DB::table('event_levels')->insert([
            "event_level_name" => "Всероссийский",
        ]);

        DB::table('event_levels')->insert([
            "event_level_name" => "Международный",
        ]);
    }
}
