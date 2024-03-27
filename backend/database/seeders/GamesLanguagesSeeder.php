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
        /*$game_id = [
            1,
            1,
            2,
            2,
            2,
            2,
            2,
            3,
            3,
            3,
            3,
            3,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
            num,
        ];

        $language_id = [
            'inglese',
            'giapponese',
            'inglese',
            'francese',
            'italiano',
            'tedesco',
            'spagnolo',
            'inglese',
            'francese',
            'italiano',
            'tedesco',
            'spagnolo',
            'linguaaaa',
            'linguaaaa',
            'linguaaaa',

        ];

        $interface = [
            1,//1
            1,//1
            1,//2
            1,//2
            1,//2
            1,//2
            1,//2
            1,//3
            1,//3
            1,//3
            1,//3
            1,//3
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
        ];

        $full_audio = [
            0,
            0,
            1,
            1,
            1,
            1,
            1,
            1,
            0,
            0,
            0,
            0,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
        ];

        $subtitles = [
            0,
            0,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
            bool,
        ];*/




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
                $rng = rand(0,1);
                DB::table('games_languages')->insert([
                    'game_id' => $i,
                    'language_id' => $j,
                    'interface' => $rng,
                    'subtitles' => $rng == 1 ? rand(0,1) : 0,
                    'full_audio' => $rng == 1 ? rand(0,1) : 0,
                ]);
            }
        }
        //dump(sizeof($names));
    }
}
