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
            'Super Mario Bros.',
            'The Legend of Zelda',
            'Pac-Man',
            'Tetris',
            'Minecraft',
            'Fortnite',
            'Call of Duty',
            'Assassin\'s Creed',
            'Grand Theft Auto',
            'Halo',
            'Final Fantasy 7 Remake Intergrade',
            'World of Warcraft',
            'Overwatch',
            'FIFA',
            'League of Legends',
            'Dota 2',
            'Among Us',
            'Rocket League',
            'Counter-Strike: Global Offensive',
            'Animal Crossing',
            'Mario Kart',
        ];
        for($i=0;$i<19;$i++)
        {
            DB::table('games')->insert([
                'name' => $names[random_int(0,$DIM_A-1)],//PLACEHOLDER RNGNAME FROM ARRAY
                'date' => Carbon::now()->subYears(random_int(1, 10))->subDays(random_int(1, 365))->format('Y-m-d'),//PLACEHOLDER RNGBD
                'base_price' => $base_price = mt_rand() / mt_getrandmax() * (69.99 - 1) + 1,//PLACEHOLDER FLOAT RNG
                //'parent_id' => rand(1,20),
                'discounted_percentage' => $discounted_percentage = rand(5,90),//PLACEHOLDER RNG
                'discounted_price' => $base_price-($base_price/$discounted_percentage),
                'short_description' => "pakistanilov",
                'long_description' => "pakistanilov",
                'is_dlc' => $bool = (bool)rand(0,1),
                'pegi_id' => rand(0,4),
            ]);
        }
    }
}
