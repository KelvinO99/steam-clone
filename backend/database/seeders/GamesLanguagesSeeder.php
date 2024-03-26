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
        for($i=1;$i<=42;$i++)
        {
            DB::table('games_languages')->insert([
                'game_id' => $i,
                'language_id' => 3,
                'interface' => 1,
                'full_audio' => 1,
                'subtitles' => 1,
            ]);
        }
        //dump(sizeof($names));
    }
}
