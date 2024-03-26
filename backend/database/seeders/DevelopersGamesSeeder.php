<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use Illuminate\Database\Seeder\developer_id;


class DevelopersGamesSeeder extends Seeder
{
    public function run(): void
    {
        for($i=0;$i<40;$i++)
        {
            DB::table('developers_games')->insert([
                'developer_id' => rand(1,40),//PLACEHOLDER RNG
                'game_id' => $i,//PLACEHOLDER RNG
            ]);
        }
    }
}
