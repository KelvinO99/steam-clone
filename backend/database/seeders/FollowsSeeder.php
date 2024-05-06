<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

        //
        // condizione: un utente non può followare se stesso
        //
class FollowsSeeder extends Seeder
{
    public function run(): void
    {
        $const_users = 32;
        $const_games = 42;
        for($i=1;$i<=600;$i++)
        {

            DB::table('follows')->insert([
                'user_id' => mt_rand(1,$const_users),
                'relationships_type' => $bool = mt_rand(0,1),
                'relationships_id' => $bool == 0 ? mt_rand(1,$const_users) : mt_rand(1,$const_games),
            ]);
        }
    }
}
