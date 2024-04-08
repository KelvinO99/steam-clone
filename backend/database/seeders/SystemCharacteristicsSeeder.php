<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class SystemCharacteristicsSeeder extends Seeder
{
    public function run(): void
    {
        $platform = [ //no ranking
            'Windows', 'MacOS', 'SteamOS + Linux', 'tbd', 'tbd', 'tbd',
        ];
        $os = [
            'Windows 7', 'Windows 10', 'MacOS 10.13 High Sierra', 'Latest OS X version', 'Ubuntu 12.04 or newer', 'Ubuntu 16.04 or newer',
        ];
        $cpu = [
            'Intel i3-2100', 'Intel i5-6600k', 'AMD Ryzen 3 1200', 'Intel i5-8600', 'Intel i7-9700k',  'AMD Ryzen 5 3600',
        ];
        $ram = [
            '4 GB RAM', '8 GB RAM', 'tbd', '12 GB RAM', '16 GB RAM', 'tbd',
        ];
        $gpu = [
            'NVIDIA GeForce GTX 1650 4GB', 'NVIDIA GeForce GTX 1060 6GB', 'AMD Radeon RX 5500XT 4GB', 'NVIDIA GeForce RTX 2060', 'NVIDIA GeForce RTX 3060', 'AMD Radeon RX 5700',
        ];
        $directx = [ //no ranking | old
            '7', '8', '9', '10', '11', '12',
        ];
        $network = [
            'Broadband Internet connection', 'tbd', 'tbd', 'NASA Internet Connection', 'tbd', 'tbd',
        ];
        $storage = [ //no ranking
            '5 GB Available Space', '40 GB Available Space', '50 GB Available Space', '60 GB Available Space', '100 GB Available Space', '120 GB Available Space',
        ];
        $audio = [ //old
            'DirectX® 9 compatible', 'tbd', 'tbd', 'DirectX® 9 compatible', 'tbd', 'tbd',
        ];
        $notes = [
            'Monitor, Mouse and Keyboard', 'SSD Required', 'tbd', 'tbd', 'tbd', 'tbd',
        ];
        for($i=0;$i<6;$i++)
        {
            DB::table('system_characteristics')->insert([
                'type' => 1,
                'name' => $platform[$i]
            ]);
        }
        for($i=0;$i<6;$i++)
        {
            DB::table('system_characteristics')->insert([
                'type' => 2,
                'name' => $os[$i]
            ]);
        }
        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 3,
                'name' => $cpu[$i]
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 4,
                'name' => $ram[$i]
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 5,
                'name' => $gpu[$i]
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 6,
                'name' => $directx[$i]
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 7,
                'name' => $network[$i]
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 8,
                'name' => $storage[$i]
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 9,
                'name' => $audio[$i]
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            DB::table('system_characteristics')->insert([
                'type' => 10,
                'name' => $notes[$i]
            ]);
        }
    }
}
