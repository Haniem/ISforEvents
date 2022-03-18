<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('result_types')->insert([
            "result_type_name" => "Результаты не подведены",
            "is_awardee" => "0",
            "is_winner" => "0"
        ]);

        DB::table('result_types')->insert([
            "result_type_name" => "1 место",
            "is_awardee" => "0",
            "is_winner" => "1"
        ]);

        DB::table('result_types')->insert([
            "result_type_name" => "2 место",
            "is_awardee" => "0",
            "is_winner" => "1"
        ]);

        DB::table('result_types')->insert([
            "result_type_name" => "3 место",
            "is_awardee" => "0",
            "is_winner" => "1"
        ]);

        DB::table('result_types')->insert([
            "result_type_name" => "Финалист",
            "is_awardee" => "1",
            "is_winner" => "0"
        ]);

        DB::table('result_types')->insert([
            "result_type_name" => "Победа в заочном туре",
            "is_awardee" => "1",
            "is_winner" => "0"
        ]);

        DB::table('result_types')->insert([
            "result_type_name" => "Публикация",
            "is_awardee" => "1",
            "is_winner" => "0"
        ]);

        DB::table('result_types')->insert([
            "result_type_name" => "Участие",
            "is_awardee" => "1",
            "is_winner" => "0"
        ]);
        
    }
}
