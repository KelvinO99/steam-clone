<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class GamesSeeder extends Seeder
{
    public function run(): void
    {
        $DIM_A = 20;
        $names = [
            'Undertale',                               //1
            'Uncharted Lost Legacy',                   //2
            'Hitman 3',                                //3
            'Tetris® Effect: Connected',               //4
            'Terraria',                                //5
            'Fortnite',                                //6
            'Call of Duty 2 Black Ops 2',              //7
            "Assassin's Creed 4",                      //8
            'Grand Theft Auto V',                      //9
            'Halo: The Master Chief Collection',       //10
            'Final Fantasy 7 Remake Intergrade',       //11
            'Minecraft',                               //12
            'Overwatch 2',                             //13
            'EA SPORTS FC™ 24',                        //14
            'PC Building Simulator',                   //15
            'Persona 5 Royal',                         //16
            'Steam Deck',                              //17
            'Rocket League',                           //18
            'Counter-Strike 2',                        //19
            'Forza Horizon 5',                         //20
            'Left 4 Dead 2',                           //21
            'Hitman 3 - Seven Deadly Sins Collection', //22
        ];

        $dates = [
            '2015-09-15',
            '2017-08-22',
            '1980-05-22',
            '1984-06-06',
            '2011-05-16',
            '2017-07-25',
            '2003-10-29',
            '2013-10-29',
            '2013-09-17',
            '2012-11-06',
            '2021-06-10',
            '2004-11-23',
            '2016-05-24',
            '2023-12-15',
            '2018-03-27',
            '2013-07-09',
            '2018-11-16',
            '2015-07-07',
            '2012-08-21',
            '2021-11-09',
            '2008-11-17',
            '2021-01-20',
            '2022-01-01',
        ];
        for($i=0;$i<22;$i++)
        {
            $bool = (bool)rand(0,1);
            DB::table('games')->insert([
                'name' => $names[$i],//PLACEHOLDER RNGNAME FROM ARRAY
                'date' => $dates[$i],//PLACEHOLDER RNGBD
                'base_price' => $base_price = mt_rand() / mt_getrandmax() * (69.99 - 1) + 1,//PLACEHOLDER FLOAT RNG
                'is_dlc' => $i === 21 ? true : false,
                'parent_id' => $i === 21 ? 3 : null,
                'is_discounted' => $bool ? true : false,
                'discounted_percentage' => $bool ? $discounted_percentage = rand(5,90) : null,//PLACEHOLDER RNG
                'discounted_price' => $bool ? $base_price-($base_price*($discounted_percentage/100)) : null,
                'short_description' => "pakistanilov",
                'long_description' => "pakistanilov",
                'pegi_id' => rand(0,4),
            ]);
        }
    }
}
