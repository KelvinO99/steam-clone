<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class AchievementsSeeder extends Seeder
{
    public function run(): void
    {
        $DIM_A = 20;
        $names = [
            'Novice Explorer' => 'Uncover your first hidden location',
            'Master Collector' => 'Collect 100 items in-game',
            'Speed Demon' => 'Complete a level within a specified time limit',
            'Fearless Warrior' => 'Defeat the final boss without taking damage',
            'Sharpshooter' => 'Achieve a 100% accuracy rate in a shooting level',
            'Quest Conqueror' => 'Complete 50 side quests',
            'Epic Adventurer' => 'Finish the main storyline',
            'Treasure Hunter' => 'Discover a secret treasure chest',
            'Master Craftsman' => 'Craft the ultimate weapon',
            'Survivalist' => 'Survive for 30 minutes in a survival mode',
            'Legendary Explorer' => 'Visit every location on the map',
            'Puzzle Solver' => 'Complete 50 challenging puzzles',
            'Team Player' => 'Complete a co-op mission with a friend',
            'Aerial Ace' => 'Achieve a perfect score in an aerial combat mission',
            'Dungeon Delver' => 'Clear 10 dungeons',
            'Champion of the Arena' => 'Win 10 consecutive arena battles',
            'Stealth Master' => 'Complete a level without being detected',
            'Master of Elements' => 'Defeat an enemy using each elemental type',
            'Flawless Victory' => 'Win a match without losing any health',
            'Time Traveler' => 'Explore a time-traveling storyline',
        ];
        for($i=0;$i<8;$i++)
        {
            DB::table('achievements')->insert([
                'game_id' => rand(0,99),//PLACEHOLDER RNG
                'name' => $names[random_int(0,$DIM_A-19)],//PLACEHOLDER RNGNAME FROM ARRAY
                //'is_achieved' => $bool = (bool)rand(0,1),
            ]);
        }
    }
}
