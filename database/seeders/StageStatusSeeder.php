<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stage_statuses')->insert([
            "stage_status_name" => "Запланировано"
        ]);

        DB::table('stage_statuses')->insert([
            "stage_status_name" => "Идет сейчас"
        ]);

        DB::table('stage_statuses')->insert([
            "stage_status_name" => "Завершено"
        ]);

        DB::table('stage_statuses')->insert([
            "stage_status_name" => "Отменено"
        ]);
    }
}
