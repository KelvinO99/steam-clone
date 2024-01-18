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
        for($i=0;$i<8;$i++)
        {
            DB::table('Images')->insert([
                'game_id' => rand(0,99),//PLACEHOLDER RNG
                'image' => "immagine qui",
            ]);
        }
    }
}
