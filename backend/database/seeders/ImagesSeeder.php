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
        for($i=0;$i<19;$i++)
        {
            DB::table('images')->insert([
                'game_id' => rand(1,19),//PLACEHOLDER RNG
                'user_id' => rand(1,19),
                'achievement_id' => rand(1,19),
                'image_path' => "immagine qui",
            ]);
        }
    }
}
