<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DevelopersGamesSeeder extends Seeder
{
    public function run(): void
    {
        for($i=0;$i<8;$i++)
        {
            DB::table('developers_games')->insert([
                'developer_id' => rand(0,20),//PLACEHOLDER RNG
                'game_id' => rand(0,20),//PLACEHOLDER RNG
            ]);
        }
    }
}
