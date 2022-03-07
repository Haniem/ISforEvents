<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stage_types')->insert([
            "stage_type_name" => "Отборочный"
        ]);

        DB::table('stage_types')->insert([
            "stage_type_name" => "Финал"
        ]);
    }
}
