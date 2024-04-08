<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            "English",
            "French",
            "Italian",
            "German",
            "Spanish",
            "Bulgarian",
            "Danish",
            "Greek",
            "Indonesian",
            "Japanese",
            "Norwegian",
            "Portuguese - Brazil",
            "Romanian",
            "Simplified Chinese",
            "Thai",
            "Turkish",
            "Vietnamese",
            "Czech",
            "Dutch",
            "Finnish",
            "Hungarian",
            "Korean",
            "Polish",
            "Portuguese - Portugal",
            "Russian",
            "Spanish - Latin America",
            "Swedish",
            "Traditional Chinese",
            "Ukrainian",
        ];
        for($i=0;$i<sizeof($names);$i++)
        {
            DB::table('languages')->insert([
                'name' => $names[$i],
            ]);
        }
        dump(sizeof($names));
    }
}
