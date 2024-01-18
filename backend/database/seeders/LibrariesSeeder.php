<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class LibrariesSeeder extends Seeder
{
    public function run(): void
    {
        for($i=0;$i<8;$i++)
        {
            DB::table('libraries')->insert([
                'user_id' => rand(0,99),//PLACEHOLDER RNG
                'game_id' => rand(0,99),//PLACEHOLDER RNG
                'is_wishlisted' => $bool = (bool)rand(0,1),

            ]);
        }
    }
}
