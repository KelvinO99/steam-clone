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
            RolesTableSeeder::class,
            UsersSeeder::class, 
            DevelopersSeeder::class, 
            TagsSeeder::class, 
            GamesSeeder::class, 
            ImagesSeeder::class, 
            LibrariesSeeder::class, 
            GamesTagsSeeder::class, 
            DevelopersGamesSeeder::class, 
            ReviewsSeeder::class, 
            AchievementsSeeder::class,
            UsersAchievementsSeeder::class, 
        ]);
    }
}
