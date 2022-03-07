<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_statuses')->insert([
            "request_status_name" => "Запланировано"
        ]);

        DB::table('request_statuses')->insert([
            "request_status_name" => "Идет сейчас"
        ]);

        DB::table('request_statuses')->insert([
            "request_status_name" => "Завершено"
        ]);

        DB::table('request_statuses')->insert([
            "request_status_name" => "Отменено"
        ]);
    }
}
