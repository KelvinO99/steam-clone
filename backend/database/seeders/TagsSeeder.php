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
            'VR',//21
            'Steam Deck',//22
            'Steam Achievements',//23
            'Full controller support',//24
            'Steam Cloud',//25
            'Mods',//26
            'Steam Workshop',//27
            'In-App Purchases',//28
            'Partial Controller Support',//29
            'Cross-Platform Multiplayer',//30
            'Steam Trading Cards',//31
            'Captions available',//32
            'Steam Leaderboards',//33
            'Remote Play on TV',//34
            'Remote Play Together',//35
            'SteamVR Collectibles',//36
            'Offerta',//37                  //perché in italiano?? e poi a che serve?????? :o:O
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
            true,


        ];
        for($i=0;$i<sizeof($names);$i++) //19
        {
            DB::table('tags')->insert([
                'name' => $names[$i],//PLACEHOLDER RNGNAME FROM ARRAY
                'is_genre' => $isgenre[$i],
                //'image_id' => 1, //DA CAMBIARE AL PIU' PRESTO
            ]);
        }
    }
}
