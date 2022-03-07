<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ComissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comissions')->insert([
            'comission_name' => "ИЯ",
        ]);

        DB::table('comissions')->insert([
            'comission_name' => "МГОиА",
        ]);

        DB::table('comissions')->insert([
            'comission_name' => "МиЕНД",
        ]);

        DB::table('comissions')->insert([
            'comission_name' => "ОГСЭД",
        ]);

        DB::table('comissions')->insert([
            'comission_name' => "СиТМ",
        ]);

        DB::table('comissions')->insert([
            'comission_name' => "СиЭЗиС",
        ]);

        DB::table('comissions')->insert([
            'comission_name' => "ФКиБЖ",
        ]);
    }
}
