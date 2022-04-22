<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        DB::table('departments')->insert([
            'department_name' => "№1 «Общеобразовательная подготовка»",
        ]);

        DB::table('departments')->insert([
            'department_name' => "№2 «Информационные технологии и транспорт»",
        ]);

        DB::table('departments')->insert([
            'department_name' => "№3 «Механическое, гидравлическое оборудование и металлургия»",
        ]);

        DB::table('departments')->insert([
            'department_name' => "№4 «Строительство, экономика и сфера обслуживания»",
        ]);

        DB::table('departments')->insert([
            'department_name' => "Отделение практической подготовки",
        ]);
    }
}
