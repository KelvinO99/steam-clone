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
        $image_path = [
            'http://localhost:8000/storage/app/public/game_images/undertale/undertale_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/undertale/undertale_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/undertale/undertale_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/undertale/undertale_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/undertale/undertale_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/uncharted_lost_legacy/uncharted_lost_legacy_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/uncharted_lost_legacy/uncharted_lost_legacy_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/uncharted_lost_legacy/uncharted_lost_legacy_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/uncharted_lost_legacy/uncharted_lost_legacy_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/uncharted_lost_legacy/uncharted_lost_legacy_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3/hitman_3_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3/hitman_3_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3/hitman_3_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3/hitman_3_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3/hitman_3_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/tetris_effect_connected/tetris_effect_connected_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/tetris_effect_connected/tetris_effect_connected_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/tetris_effect_connected/tetris_effect_connected_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/tetris_effect_connected/tetris_effect_connected_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/tetris_effect_connected/tetris_effect_connected_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/terraria/terraria_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/terraria/terraria_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/terraria/terraria_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/terraria/terraria_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/terraria/terraria_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/fortnite/fortnite_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/fortnite/fortnite_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/fortnite/fortnite_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/fortnite/fortnite_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/fortnite/fortnite_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/call_of_duty_black_ops_2/call_of_duty_black_ops_2_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/call_of_duty_black_ops_2/call_of_duty_black_ops_2_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/call_of_duty_black_ops_2/call_of_duty_black_ops_2_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/call_of_duty_black_ops_2/call_of_duty_black_ops_2_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/call_of_duty_black_ops_2/call_of_duty_black_ops_2_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/assassins_creed_4/assassins_creed_4_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/assassins_creed_4/assassins_creed_4_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/assassins_creed_4/assassins_creed_4_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/assassins_creed_4/assassins_creed_4_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/assassins_creed_4/assassins_creed_4_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/grand_theft_auto_v/grand_theft_auto_v_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/grand_theft_auto_v/grand_theft_auto_v_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/grand_theft_auto_v/grand_theft_auto_v_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/grand_theft_auto_v/grand_theft_auto_v_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/grand_theft_auto_v/grand_theft_auto_v_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/halo_master_chief_collection/halo_master_chief_collection_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/halo_master_chief_collection/halo_master_chief_collection_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/halo_master_chief_collection/halo_master_chief_collection_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/halo_master_chief_collection/halo_master_chief_collection_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/halo_master_chief_collection/halo_master_chief_collection_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/final_fantasy_7_remake_intergrade/final_fantasy_7_remake_intergrade_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/final_fantasy_7_remake_intergrade/final_fantasy_7_remake_intergrade_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/final_fantasy_7_remake_intergrade/final_fantasy_7_remake_intergrade_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/final_fantasy_7_remake_intergrade/final_fantasy_7_remake_intergrade_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/final_fantasy_7_remake_intergrade/final_fantasy_7_remake_intergrade_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/minecraft/minecraft_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/minecraft/minecraft_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/minecraft/minecraft_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/minecraft/minecraft_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/minecraft/minecraft_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/overwatch_2/overwatch_2_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/overwatch_2/overwatch_2_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/overwatch_2/overwatch_2_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/overwatch_2/overwatch_2_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/overwatch_2/overwatch_2_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/ea_sports_fc_24/ea_sports_fc_24_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/ea_sports_fc_24/ea_sports_fc_24_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/ea_sports_fc_24/ea_sports_fc_24_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/ea_sports_fc_24/ea_sports_fc_24_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/ea_sports_fc_24/ea_sports_fc_24_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/pc_building_simulator/pc_building_simulator_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/pc_building_simulator/pc_building_simulator_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/pc_building_simulator/pc_building_simulator_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/pc_building_simulator/pc_building_simulator_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/pc_building_simulator/pc_building_simulator_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/persona_5_royal/persona_5_royal_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/persona_5_royal/persona_5_royal_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/persona_5_royal/persona_5_royal_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/persona_5_royal/persona_5_royal_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/persona_5_royal/persona_5_royal_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/steam_deck/steam_deck_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/steam_deck/steam_deck_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/steam_deck/steam_deck_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/steam_deck/steam_deck_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/steam_deck/steam_deck_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/rocket_league/rocket_league_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/rocket_league/rocket_league_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/rocket_league/rocket_league_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/rocket_league/rocket_league_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/rocket_league/rocket_league_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/counter_strike_2/counter_strike_2_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/counter_strike_2/counter_strike_2_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/counter_strike_2/counter_strike_2_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/counter_strike_2/counter_strike_2_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/counter_strike_2/counter_strike_2_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/forza_horizon_5/forza_horizon_5_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/forza_horizon_5/forza_horizon_5_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/forza_horizon_5/forza_horizon_5_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/forza_horizon_5/forza_horizon_5_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/forza_horizon_5/forza_horizon_5_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/left_4_dead_2/left_4_dead_2_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/left_4_dead_2/left_4_dead_2_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/left_4_dead_2/left_4_dead_2_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/left_4_dead_2/left_4_dead_2_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/left_4_dead_2/left_4_dead_2_4.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3_seven_deadly_sins/hitman_3_seven_deadly_sins_collection_0.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3_seven_deadly_sins/hitman_3_seven_deadly_sins_collection_1.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3_seven_deadly_sins/hitman_3_seven_deadly_sins_collection_2.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3_seven_deadly_sins/hitman_3_seven_deadly_sins_collection_3.jpg',
            'http://localhost:8000/storage/app/public/game_images/hitman_3_seven_deadly_sins/hitman_3_seven_deadly_sins_collection_4.jpg',
            //'http://localhost:8000/storage/app/public/game_images/',
            //'http://localhost:8000/storage/app/public/game_images/',
            //'http://localhost:8000/storage/app/public/game_images/',
            //'http://localhost:8000/storage/app/public/game_images/',
            //'http://localhost:8000/storage/app/public/game_images/',

        ];

        for($i=5;$i<111;$i++) //110 cicli games_images + 10 users_images, si inizia da 5 e finisce 125 pk num<5 / 5 fa meno di 1 e gli array su php iniziano da 1 porcacciodio
        {
            if($i >= 110)  DB::table('images')->insert(['image_path' => "images\Users\Default.jpg",]);
            else{
                DB::table("images")->insert([
                    'image_path' => 'PLACEHOLDER',
                ]);
            }





            /*
            else{
                //$j=$i/5;
                $j = floor($i / 5);
                DB::table('images')->insert([
                    //'game_id' => $j,//PLACEHOLDER RNG
                    //'user_id' => rand(1,19),
                    //'achievement_id' => rand(1,19),
                    //'image_path' => $image_path[$i]
                ]);
            }*/
        }
    }
}
