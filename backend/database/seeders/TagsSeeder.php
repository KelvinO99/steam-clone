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
            'Action',
            'Adventure',
            'Indie',
            'RPG',
            'Simulation',
            'Strategy',
            'Open World',
            'Multiplayer',
            'Co-op',
            'First-Person',
            'Third-Person',
            'Horror',
            'Sci-fi',
            'Fantasy',
            'Singleplayer',
            'Survival',
            'Puzzle',
            'Casual',
            'Sports',
            'Racing',
            'Free to Play',
        ];
        for($i=0;$i<8;$i++)
        {
            DB::table('tags')->insert([
                'name' => $names[random_int(0,$DIM_A-1)],//PLACEHOLDER RNGNAME FROM ARRAY
                'is_genre' => $bool = (bool)rand(0,1),
            ]);
        }
    }
}
