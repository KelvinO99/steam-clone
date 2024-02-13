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
            'Undertale',
            'Uncharted Lost Legacy',
            'Hitman 3',
            'Tetris',
            'Terraria',
            'Fortnite',
            'Call of Duty',
            "Assassin's Creed 4",
            'Grand Theft Auto V',
            'Halo 4',
            'Final Fantasy 7 Remake Intergrade',
            'World of Warcraft',
            'Overwatch',
            'FIFA 24',
            'PC Building Simulator',
            'Dota 2',
            'Steam Deck',
            'Rocket League',
            'Counter-Strike: Global Offensive',
            'Forza Horizon 5',
            'Left 4 Dead',
            'Hitman 3 World\'s Assassination',
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
        for($i=0;$i<22;$i++) // 0/<19 = fa 20 cicli
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
