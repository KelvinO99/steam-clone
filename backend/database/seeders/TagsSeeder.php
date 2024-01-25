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
        $DIM_A = 20;
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
        ];
        for($i=0;$i<21;$i++) //19
        {
            DB::table('tags')->insert([
                'name' => $names[$i],//PLACEHOLDER RNGNAME FROM ARRAY
                'is_genre' => $bool = (bool)rand(0,1),
            ]);
        }
    }
}
