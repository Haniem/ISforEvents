<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Departments;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ComissionsSeeder::class,
            DepartmentsSeeder::class,
            EventLevelsSeeder::class,
            EventStatusesSeeder::class,
            EventTypesSeeder::class,
            RequestStatusesSeeder::class,
            ResultTypesSeeder::class,
            StageFormatSeeder::class,
            StageTypeSeeder::class,
            StageStatusSeeder::class,
            UserSeeder::class,
            AdminUserSeeder::class
        ]);
    }
}
