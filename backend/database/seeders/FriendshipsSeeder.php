<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FriendshipsSeeder extends Seeder
{
   public function run(): void
    {
        for($i = 1; $i <= 32; $i++)
        {
            $rng = rand(1, 8);
            DB::table('friendships')->insert([
                'user_id_1' => mt_rand(1,32),
                'user_id_2' => mt_rand(1,32),
                'is_pending' => $rng == 1 ? 1 : 0,
            ]);
        }
    }
}
