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
        $const_library = 1200;

        for ($i = 0; $i < $const_library; $i++) {
            $userId = rand(1, 32);
            $gameId = rand(1, 42);

            $existingRecord = DB::table('libraries')
                ->where('user_id', $userId)
                ->where('game_id', $gameId)
                ->first();

            if ($existingRecord) {
                $bool = rand(0, 1);
                DB::table('libraries')
                    ->where('id', $existingRecord->id)
                    ->update([
                        'is_wishlisted' => $bool,
                        'is_owned' => !$bool
                    ]);
            } else {
                $bool = rand(0, 1);
                DB::table('libraries')->insert([
                    'user_id' => $userId,
                    'game_id' => $gameId,
                    'is_wishlisted' => $bool,
                    'is_owned' => !$bool
                ]);
            }
        }
    }
}
