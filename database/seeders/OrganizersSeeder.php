<?php

namespace Database\Seeders;

use carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 5; $i++) {
            DB::table('organizers')->insert(values:[
                'name' => fake()->name(),
                'description' => fake()->sentence(),
                'facebook_link' => fake()->url(),
                'x_link' => fake()->url(),
                'website_link' => fake()->url(),
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now() ->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
