<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SystemRequirementsSeeder extends Seeder
{
    public function run(): void
    {
        $no_characteristics = 6;
        $os = (1 * $no_characteristics) + 1; //7
        $cpu = (2 * $no_characteristics) + 1; //13
        $ram = (3 * $no_characteristics) + 1; //19
        $gpu = (4 * $no_characteristics) + 1; //25
        $directx = (5 * $no_characteristics) + 1; //31
        $network = (6 * $no_characteristics) + 1; //37
        $storage = (7 * $no_characteristics) + 1; //43
        $audio = (8 * $no_characteristics) + 1;
        $notes = (9 * $no_characteristics) + 1;

        for($i=1;$i<=42;$i++)
        {
            for($j=1;$j<=3;$j++)
            {
                $min = rand(0,($no_characteristics/2)-1);
                $max = rand($no_characteristics/2,$no_characteristics-1);
                for($k=1;$k<=2;$k++)
                {
                    DB::table('system_requirements')->insert([
                        'game_id' => $i,
                        'platform_id' => $j,
                        'rank' => $k,
                        'os_id' => $j + $os,
                        'cpu_id' => $k == 1 ? $cpu + $min : $cpu + $max,
                        'ram_id' => $k == 1 ? $ram + $min : $ram + $max,
                        'gpu_id' => $k == 1 ? $gpu + $min : $gpu + $max,
                        'directx_id' => $directx + $max,
                        'network_id' => $k == 1 ? $network + $min : $network + $max,
                        'storage_id' => $k == 1 ? $storage + $min : $storage + $max,
                        'audio_id' => $k == 1 ? $audio + $min : $audio + $max,
                        'notes_id' => $k == 1 ? $notes + $min : $notes + $max,
                    ]);
                }
            }

        }
    }
}
