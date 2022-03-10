<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::factory(1)->create([
            "username" => "Admin",
            "email" => "haniemcs@gmail.com",
            "password" => bcrypt("12345")
        ]);
    }
}
