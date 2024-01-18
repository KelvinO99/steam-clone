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
                'game' => rand(0,20),//PLACEHOLDER RNG
                'image_path' => "immagine qui",
            ]);
        }
    }
}
