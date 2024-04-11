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
        $names = [
            'Master Miner - Collect all rare minerals and resources in the game.',
            'Master Explorer - Discover all hidden locations in the game world.',
            'Remake Connoisseur - Unlock all additional content in the Remake edition.',
            'Legendary Spartan - Complete the game on the highest difficulty level.',
            'High Score Champion - Achieve the highest score possible in the game.',
            'Pac-Man Champion - Achieve the highest score in a single Pac-Man game.',
            'Tetris Grandmaster - Complete the game with a perfect score.',
            'Tetris Speedrunner - Complete the game in record time.',
            'Mob Slaughterer - Kill your first boss',
            'Minecraft Sucks - Mock Minecraft',
            'Battle Royale Champion - Win a match in Battle Royale mode.',
            'Victory Royale - Achieve victory in a solo match in Fortnite.',
            'Call of Duty Elite - Reach the highest prestige level in multiplayer.',
            'War Hero - Complete all campaign missions on the highest difficulty in Call of Duty.',
            'World Explorer - Explore every corner of the game\'s vast open world.',
            'Leap of Faith - Successfully perform a Leap of Faith from the highest point in the game.',
            'Heist Kingpin - Successfully complete all major heist missions in the game.',
            'GTA Kingpin - Achieve 100% completion in Grand Theft Auto V.',
            'Completionist - Complete Halo 4 Campaign and all Achievemnts',
            'Warthog Driver - Master the Warthog vehicle and complete all vehicle missions in Halo 4.',
            'Materia Master - Collect and master all Materia in Final Fantasy 7 Remake Intergrade.',
            'Completionist - Unlock all in-game achievements.',
            'Esci di Casa - Sei uscito di casa',
            'Azeroth Explorer - Explore every zone in World of Warcraft.',
            'Overwatch Master - Reach the highest competitive ranking in Overwatch.',
            'Play of the Game - Earn the "Play of the Game" highlight in Overwatch.',
            'Hat-trick Hero - Score three goals in a single FIFA match.',
            'World Cup Winner - Win the FIFA World Cup in career mode.',
            'PC Guru - Build the ultimate gaming PC in the simulator.',
            'Virtual Architect - Design and build a virtual gaming setup in the simulator.',
            'The Real Grim Please Stand Up- Kill the Grim Reaper in Persona 5 Royal.',
            'Dating Sim - Date all the girls in Persona 5 Royal.',
            'Stealthy Infiltrator - Win a game without being voted off in Among Us.',
            'Master Imposter - Win a game as the Imposter without being suspected in Among Us.',
            'Rocket League MVP - Be the MVP of a match in Rocket League.',
            'Goalie Prodigy - Successfully block all shots on goal in a Rocket League match.',
            'Global Elite - Reach the highest rank in Counter-Strike: Global Offensive.',
            'Tactical Mastermind - Win a round without losing a single teammate in CS:GO.',
            'Horizon Explorer - Discover all hidden locations in Forza Horizon 5.',
            'Horizon Photographer - Capture breathtaking photos in Forza Horizon 5.',
            'Zombie Apocalypse Survivor - Survive a Left 4 Dead campaign without taking damage.',
            'Zombie Slayer - Survive all campaigns on the highest difficulty in Left 4 Dead.',
            'Silent Assassin - Complete a mission without being detected in Hitman 3.',
            'Master Assassin-  Successfully complete all assassination missions.',
        ];
        $bool=false;
        $j=0;
        for($i=0;$i<sizeof($names);$i++) //38
        {
            $bool ? $bool=false : $bool=true;
            $bool ? $j++ : null;
            DB::table('achievements')->insert([
                'game_id' => $j,//PLACEHOLDER RNG
                'name' => $names[$i],//PLACEHOLDER RNGNAME FROM ARRAY
                //'is_achieved' => $bool = (bool)rand(0,1), //perché è tolta dalle migrations bo
                //'image_id' => 254/*$j*/,
            ]);
        }
    }
}
