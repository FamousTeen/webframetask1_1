<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 5; $i++) {
            $name = fake()->name;
            $temp = str_replace(' ', '', $name);
            $temp2 = str_replace('.', '', $temp);
            $username = strtolower($temp2);
            DB::table('organizers')->insert([
                'name' => $name,
                'description' => fake()->text(50),
                'facebook_link' => "facebook.com/{$username}",
                'x_link' => "x.com/{$username}",
                'website_link' => "{$username}.com",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
