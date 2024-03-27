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
            TagsSeeder::class,
            GamesSeeder::class,
            ImagesSeeder::class,
            RolesTableSeeder::class,
            UsersSeeder::class,
            DevelopersSeeder::class,
            LibrariesSeeder::class,
            GamesTagsSeeder::class,
            LanguagesSeeder::class,
            ReviewsSeeder::class,
            AchievementsSeeder::class,
            UsersAchievementsSeeder::class,
            DevelopersGamesSeeder::class,
            GamesLanguagesSeeder::class,
        ]);
    }
}
