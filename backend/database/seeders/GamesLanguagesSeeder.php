<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class GamesLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //implementa catanese/siciliano

        for($i=1;$i<=42;$i++)
        {
            DB::table('games_languages')->insert([
                'game_id' => $i,
                'language_id' => 1,
                'interface' => 1,
                'full_audio' => 1,
                'subtitles' => 1,
            ]);

            for($j=2;$j<=5;$j++)
            {
                $rng = rand(1, 10) <= 8 ? 1 : 0; //80% chance of outputting 1
                $nested_rng = $rng == 1 ? (rand(1, 10) <= 8 ? 1 : 0) : 0;
                DB::table('games_languages')->insert([
                    'game_id' => $i,
                    'language_id' => $j,
                    'interface' => $rng,
                    'subtitles' => $nested_rng,
                    'full_audio' => $nested_rng == 1 ? rand(0,1) : 0,
                ]);
            }
        }
        //dump(sizeof($names));
    }
}
