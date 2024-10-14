<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(OrganizersSeeder::class);
        $this->call(EventCategoriesSeeder::class);
        $this->call(EventsSeeder::class);
    }
}
