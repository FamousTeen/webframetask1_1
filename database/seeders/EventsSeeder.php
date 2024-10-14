<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use function Laravel\Prompts\text;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'title' => "Indonesia Innovation Challenge 2024 Powered by Launch Pad",
            'organizer_id' => 1,
            'event_category_id' => 1,
            'venue' => "Jatim Expo",
            'date' => Carbon::parse('2024-10-23'),
            'start_time' => Carbon::createFromTime(9, 0, 0)->toTimeString(),
            'description' => fake()->text(50),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('events')->insert([
            'title' => "Kids Education Expo 2024",
            'organizer_id' => 2,
            'event_category_id' => 1,
            'venue' => "The Westin",
            'date' => Carbon::parse('2024-10-21'),
            'start_time' => Carbon::createFromTime(9, 0, 0)->toTimeString(),
            'description' => fake()->text(50),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('events')->insert([
            'title' => "Surabaya Great Expo 2024",
            'organizer_id' => 3,
            'event_category_id' => 1,
            'venue' => "Grand City Surabaya",
            'date' => Carbon::parse('2024-10-16'),
            'start_time' => Carbon::createFromTime(8, 0, 0)->toTimeString(),
            'description' => fake()->text(50),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('events')->insert([
            'title' => "SMEX (Surabaya Music, Multimedia, and Lighting Expo 2024)",
            'organizer_id' => 4,
            'event_category_id' => 1,
            'venue' => "Grand City Surabaya",
            'date' => Carbon::parse('2024-09-29'),
            'start_time' => Carbon::createFromTime(8, 0, 0)->toTimeString(),
            'description' => fake()->text(50),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('events')->insert([
            'title' => "Japan Edu Expo 2024",
            'organizer_id' => 5,
            'event_category_id' => 1,
            'venue' => "Hotel Said",
            'date' => Carbon::parse('2024-09-22'),
            'start_time' => Carbon::createFromTime(8, 0, 0)->toTimeString(),
            'description' => fake()->text(50),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('events')->insert([
            'title' => "Surabaya Hospital Expo 2024",
            'organizer_id' => 2,
            'event_category_id' => 1,
            'venue' => "Grand City Surabaya",
            'date' => Carbon::parse('2024-10-11'),
            'start_time' => Carbon::createFromTime(8, 0, 0)->toTimeString(),
            'description' => fake()->text(50),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
