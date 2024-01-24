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
        for($i=0;$i<19;$i++)
        {
            DB::table('games_tags')->insert([
                'game_id' => rand(1,19),//PLACEHOLDER RNG
                'tag_id' => rand(1,19),//PLACEHOLDER RNG
            ]);
        }
    }
}
