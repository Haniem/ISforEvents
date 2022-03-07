<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stage_formats')->insert([
            "stage_format_name" => "Заочный"
        ]);

        DB::table('stage_formats')->insert([
            "stage_format_name" => "Онлайн"
        ]);

        DB::table('stage_formats')->insert([
            "stage_format_name" => "Очный"
        ]);
    }
}
