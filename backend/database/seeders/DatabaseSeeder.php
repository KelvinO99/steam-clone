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
            RolesTableSeeder::class,
            CountriesSeeder::class,
            LanguagesSeeder::class,
            UsersSeeder::class,
            FriendshipsSeeder::class,
            DevelopersSeeder::class,
            LibrariesSeeder::class,
            GamesTagsSeeder::class,
            ReviewsSeeder::class,
            AchievementsSeeder::class,
            ImagesSeeder::class,
            UsersAchievementsSeeder::class,
            DevelopersGamesSeeder::class,
            GamesLanguagesSeeder::class,
            SystemCharacteristicsSeeder::class,
            SystemRequirementsSeeder::class,
            FollowsSeeder::class,
        ]);
    }
}
