<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class GamesTagsSeeder extends Seeder
{
    /*public function run(): void
    {
        for($i=0;$i<19;$i++)
        {
            DB::table('games_tags')->insert([
                'game_id' => rand(1,19),//PLACEHOLDER RNG
                'tag_id' => rand(1,19),//PLACEHOLDER RNG
            ]);
        }
    }*/
    public function run(): void
    {
        DB::table('games_tags')->insert([
            'game_id' => '1',
            'tag_id' => '1',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '1',
            'tag_id' => '3',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '1',
            'tag_id' => '6',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '1',
            'tag_id' => '14',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '2',
            'tag_id' => '1',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '2',
            'tag_id' => '2',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '2',
            'tag_id' => '11',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '3',
            'tag_id' => '6',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '4',
            'tag_id' => '6',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '5',
            'tag_id' => '18',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '5',
            'tag_id' => '7',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '6',
            'tag_id' => '1',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '7',
            'tag_id' => '1',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '8',
            'tag_id' => '1',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '8',
            'tag_id' => '2',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '8',
            'tag_id' => '3',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '9',
            'tag_id' => '1',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '9',
            'tag_id' => '11',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '9',
            'tag_id' => '15',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '10',
            'tag_id' => '15',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '11',
            'tag_id' => '6',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '11',
            'tag_id' => '14',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '12',
            'tag_id' => '4',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '12',
            'tag_id' => '14',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '13',
            'tag_id' => '10',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '13',
            'tag_id' => '14',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '14',
            'tag_id' => '5',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '14',
            'tag_id' => '6',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '15',
            'tag_id' => '5',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '15',
            'tag_id' => '17',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '16',
            'tag_id' => '6',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '16',
            'tag_id' => '21',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '17',
            'tag_id' => '8',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '17',
            'tag_id' => '21',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '18',
            'tag_id' => '8',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '18',
            'tag_id' => '21',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '19',
            'tag_id' => '8',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '19',
            'tag_id' => '21',
        ]);
        /*DB::table('games_tags')->insert([
            'game_id' => '20',
            'tag_id' => '7',
        ]);
        DB::table('games_tags')->insert([
            'game_id' => '20',
            'tag_id' => '20',
        ]);*/
        
        
    }
}
