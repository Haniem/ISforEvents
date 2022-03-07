<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_statuses')->insert([
            "event_status_name" => "Запланировано"
        ]);

        DB::table('event_statuses')->insert([
            "event_status_name" => "Идет сейчас"
        ]);

        DB::table('event_statuses')->insert([
            "event_status_name" => "Завершено"
        ]);

        DB::table('event_statuses')->insert([
            "event_status_name" => "Отменено"
        ]);
    }
}
