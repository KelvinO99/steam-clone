<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class ImagesSeeder extends Seeder
{
    public function run(): void
    {
        $games_path = [
            'http://localhost:8000/storage/game_images/undertale/undertale',
            'http://localhost:8000/storage/game_images/uncharted_the_legacy_collection/uncharted_the_legacy_collection',
            'http://localhost:8000/storage/game_images/hitman_3/hitman_3',
            'http://localhost:8000/storage/game_images/tetris_effect_connected/tetris_effect_connected',
            'http://localhost:8000/storage/game_images/terraria/terraria',
            'http://localhost:8000/storage/game_images/fortnite/fortnite',
            'http://localhost:8000/storage/game_images/call_of_duty_2_black_ops_2/call_of_duty_2_black_ops_2',
            'http://localhost:8000/storage/game_images/assassins_creed_4/assassins_creed_4',
            'http://localhost:8000/storage/game_images/grand_theft_auto_v/grand_theft_auto_v',
            'http://localhost:8000/storage/game_images/halo_the_master_chief_collection/halo_the_master_chief_collection',
            'http://localhost:8000/storage/game_images/final_fantasy_7_remake_intergrade/final_fantasy_7_remake_intergrade',
            'http://localhost:8000/storage/game_images/minecraft/minecraft',
            'http://localhost:8000/storage/game_images/overwatch_2/overwatch_2',
            'http://localhost:8000/storage/game_images/ea_sports_fc_24/ea_sports_fc_24',
            'http://localhost:8000/storage/game_images/pc_building_simulator/pc_building_simulator',
            'http://localhost:8000/storage/game_images/persona_5_royal/persona_5_royal',
            'http://localhost:8000/storage/game_images/steam_deck/steam_deck',
            'http://localhost:8000/storage/game_images/rocket_league/rocket_league',
            'http://localhost:8000/storage/game_images/counter_strike_2/counter_strike_2',
            'http://localhost:8000/storage/game_images/forza_horizon_5/forza_horizon_5',
            'http://localhost:8000/storage/game_images/left_4_dead_2/left_4_dead_2',
            'http://localhost:8000/storage/game_images/hitman_3_seven_deadly_sins_collection/hitman_3_seven_deadly_sins_collection',
            'http://localhost:8000/storage/game_images/grand_theft_auto_vi/grand_theft_auto_vi',
            'http://localhost:8000/storage/game_images/resident_evil_4/resident_evil_4',
            'http://localhost:8000/storage/game_images/mortal_kombat_1/mortal_kombat_1',
            'http://localhost:8000/storage/game_images/red_dead_redemption_2/red_dead_redemption_2',
            'http://localhost:8000/storage/game_images/god_of_war/god_of_war',
            'http://localhost:8000/storage/game_images/tom_clancys_rainbow_six_siege/tom_clancys_rainbow_six_siege',
            'http://localhost:8000/storage/game_images/dead_space/dead_space',
            'http://localhost:8000/storage/game_images/grounded/grounded',
            'http://localhost:8000/storage/game_images/cyberpunk_2077/cyberpunk_2077',
            'http://localhost:8000/storage/game_images/sea_of_thieves/sea_of_thieves',
            'http://localhost:8000/storage/game_images/sekiro_shadows_die_twice/sekiro_shadows_die_twice',
            'http://localhost:8000/storage/game_images/monster_hunter_rise/monster_hunter_rise',
            'http://localhost:8000/storage/game_images/assassins_creed_valhalla/assassins_creed_valhalla',
            'http://localhost:8000/storage/game_images/persona_3_reload/persona_3_reload',
            'http://localhost:8000/storage/game_images/horizon_forbidden_west/horizon_forbidden_west',
            'http://localhost:8000/storage/game_images/baldurs_gate_3/baldurs_gate_3',
            'http://localhost:8000/storage/game_images/elden_ring/elden_ring',
            'http://localhost:8000/storage/game_images/cyberpunk_2077_phantom_liberty/cyberpunk_2077_phantom_liberty',
            'http://localhost:8000/storage/game_images/valve_index/valve_index',
            'http://localhost:8000/storage/game_images/the_last_of_us_part_i/the_last_of_us_part_i',


            //'http://localhost:8000/storage/game_images/',


        ];

        $users_path = [
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
            'http://localhost:8000/storage/user_images/default',
        ];

        $achievements_path = [
            'http://localhost:8000/storage/achievement_images/default.png',
        ];

        $pegis_path = [
            'http://localhost:8000/storage/pegi_images/pegi_3',
            'http://localhost:8000/storage/pegi_images/pegi_7',
            'http://localhost:8000/storage/pegi_images/pegi_12',
            'http://localhost:8000/storage/pegi_images/pegi_16',
            'http://localhost:8000/storage/pegi_images/pegi_18',
        ];

        $steams_path = [
            'http://localhost:8000/storage/bo/bo.jpg'
        ];


        $const_games = 6;
        $const_users = 1;
        $const_achievements = 1;
        $const_pegis = 1;
        $const_steams = 1;


        for($i=0; $i < sizeof($games_path); $i++){

            for($j=0;$j<$const_games;$j++){
                DB::table('images')->insert([
                    'game_id' => $i+1,
                    'user_id' => null,
                    'achievement_id' => null,
                    'pegi_id' => null,
                    'steam_id' => null,
                    'image_path' => $games_path[$i].'_'.$j.'.jpg',
                        ]);
            }
        }

        for($i=0; $i < sizeof($users_path); $i++){

            for($j=0;$j<$const_users;$j++){
                DB::table('images')->insert([
                    'game_id' => null,
                    'user_id' => $i+1,
                    'achievement_id' => null,
                    'pegi_id' => null,
                    'steam_id' => null,
                    'image_path' => $users_path[$i].'.png',
                        ]);
            }
        }

        for($i=0; $i < sizeof($achievements_path); $i++){

            for($j=0;$j<$const_achievements;$j++){
                DB::table('images')->insert([
                    'game_id' => null,
                    'user_id' => null,
                    'achievement_id' => $i+1,
                    'pegi_id' => null,
                    'steam_id' => null,
                    'image_path' => $achievements_path[$i].'_'.$j.'.jpg',
                        ]);
            }
        }

        for($i=0; $i < sizeof($pegis_path); $i++){

            for($j=0;$j<$const_pegis;$j++){
                DB::table('images')->insert([
                    'game_id' => null,
                    'user_id' => null,
                    'achievement_id' => null,
                    'pegi_id' => $i+1,
                    'steam_id' => null,
                    'image_path' => $pegis_path[$i].'.jpg',
                        ]);
            }
        }

        for($i=0; $i < sizeof($steams_path); $i++){

            for($j=0;$j<$const_steams;$j++){
                DB::table('images')->insert([
                    'game_id' => null,
                    'user_id' => null,
                    'achievement_id' => null,
                    'pegi_id' => null,
                    'steam_id' => $i+1,
                    'image_path' => $steams_path[$i].'_'.$j.'.jpg',
                        ]);
            }
        }
    }
}

