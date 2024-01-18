<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //AchievementsSeeder::class,
            UsersSeeder::class, 
            DevelopersSeeder::class, 
            //GamesSeeder::class, 
            ImagesSeeder::class, 
            //ReviewsSeeder::class, 
            //TagsSeeder::class, 
            LibrariesSeeder::class, 
            UsersAchievementsSeeder::class, 
            GamesTagsSeeder::class, 
            DevelopersGamesSeeder::class, 
        ]);
    }
}
