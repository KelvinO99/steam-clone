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
            GamesSeeder::class, 
            ImagesSeeder::class, 
            RolesTableSeeder::class,
            UsersSeeder::class, 
            DevelopersSeeder::class, 
            TagsSeeder::class, 
            LibrariesSeeder::class, 
            GamesTagsSeeder::class, 
            ReviewsSeeder::class, 
            AchievementsSeeder::class,
            UsersAchievementsSeeder::class, 
            DevelopersGamesSeeder::class, 
        ]);
    }
}
