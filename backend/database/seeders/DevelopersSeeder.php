<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DevelopersSeeder extends Seeder
{
    public function run(): void
    {
        for($i=0;$i<19;$i++)
        {
            DB::table('developers')->insert([
                'user_id' => rand(1,20),//PLACEHOLDER RNG
                //'is_publisher' => $bool = (bool)rand(0,1),
                //'description' => "pakistanilov",
            ]);
        }
    }
}
