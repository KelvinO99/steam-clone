<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UsersAchievementsSeeder extends Seeder
{
    public function run(): void
    {
        for($i=0;$i<1;$i++)
        {
            DB::table('users_achievements')->insert([
                'user_id' => rand(1,20),//PLACEHOLDER RNG
                'achievement_id' => rand(1,20),//PLACEHOLDER RNG
                'is_achieved' => $bool = (bool)rand(0,1),//PLACEHOLDER BOOL RNG
                'date' => $bool ? $randomDateTime = Carbon::now()->subYears(random_int(1, 10))->subDays(random_int(1, 365))->subMinutes(random_int(1, 1440))->format('Y-m-d H:i:s') : null,
            ]);
        }
    }
}
