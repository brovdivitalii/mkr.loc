<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\Student::factory(5)->create()->each(function ($student) {
            $student->grades()->saveMany(\App\Models\Grade::factory(3)->make());
        });
    }

}
