<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class GamesTagsSeeder extends Seeder
{
    public function run(): void
    {
        for($i=0;$i<8;$i++)
        {
            DB::table('games_tags')->insert([
                'game_id' => rand(0,99),//PLACEHOLDER RNG
                'tag_id' => rand(0,99),//PLACEHOLDER RNG
            ]);
        }
    }
}
