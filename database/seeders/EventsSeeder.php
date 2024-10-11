<?php

namespace Database\Seeders;

use Carbon\Carbon; // Make sure to use the correct case
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get existing organizer_ids and category_ids
        $organizerIds = DB::table('organizers')->pluck('id')->toArray();
        $categoryIds = DB::table('event_categories')->pluck('id')->toArray();

        for ($i = 0; $i < 6; $i++) {
            DB::table('events')->insert([
                'title' => $faker->sentence(6, true),
                'venue' => $faker->address(),
                'date' => $faker->date('Y-m-d', '+1 year'),
                'start_time' => $faker->time('H:i:s'),
                'description' => $faker->paragraph(3, true),
                'booking_url' => $faker->url(),
                'tags' => implode(',', $faker->words(3)),
                'organizer_id' => $faker->randomElement($organizerIds), // Use the correct foreign key name
                'category_id' => $faker->randomElement($categoryIds), // Use the correct foreign key name
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
