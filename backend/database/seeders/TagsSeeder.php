<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class TagsSeeder extends Seeder
{
    public function run(): void
    {
        $DIM_A = 30;
        $names = [
            'Action', //1
            'Adventure', //2
            'Indie', //3
            'RPG', //4
            'Simulation', //5
            'Strategy', //6
            'Open World', //7
            'Multiplayer', //8
            'Co-op', //9
            'First-Person', //10
            'Third-Person', //11
            'Horror', //12
            'Sci-fi', //13
            'Fantasy', //14
            'Singleplayer', //15
            'Survival', //16
            'Top Seller', //17
            'Casual', //18
            'Sports', //19
            'Racing', //20
            'Free to Play', //21
            'VR',//22
            'Steam Deck',//23
            'Steam Achievements',//24
            'Full controller support',//25
            'Steam Cloud',//26
            'Mods',//27
            'Steam Workshop',//28
            'In-App Purchases',//29
            'Partial Controller Support',//30
            'Cross-Platform Multiplayer',//31
            'Steam Trading Cards',//32
            'Captions available',//33
            'Steam Leaderboards',//34
            'Remote Play on TV',//35
            'Remote Play Together',//36
            'SteamVR Collectibles',//37
            'Valve Anti-Cheat enabled',//38


        ];

        $isgenre = [
            true,
            true,
            true,
            true,
            true,
            true,
            true,
            false,
            false,
            false,
            false,
            true,
            true,
            true,
            false,
            false,
            false,
            false,
            true,
            true,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,
            false,


        ];
        for($i=0;$i<21;$i++) //19
        {
            DB::table('tags')->insert([
                'name' => $names[$i],//PLACEHOLDER RNGNAME FROM ARRAY
                'is_genre' => $isgenre[$i],
                'image_id' => 1, //DA CAMBIARE AL PIU' PRESTO 
            ]);
        }
    }
}
