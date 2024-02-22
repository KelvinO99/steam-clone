<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class GamesSeeder extends Seeder
{
    public function run(): void
    {
        $DIM_A = 20;
        $names = [
            'Undertale',                               //1
            'Uncharted: The Legacy Collection',        //2
            'Hitman 3',                                //3
            'Tetris® Effect: Connected',               //4
            'Terraria',                                //5
            'Fortnite',                                //6
            'Call of Duty 2 Black Ops 2',              //7
            "Assassin's Creed 4",                      //8
            'Grand Theft Auto V',                      //9
            'Halo: The Master Chief Collection',       //10
            'Final Fantasy 7 Remake Intergrade',       //11
            'Minecraft',                               //12
            'Overwatch 2',                             //13
            'EA SPORTS FC™ 24',                        //14
            'PC Building Simulator',                   //15
            'Persona 5 Royal',                         //16
            'Steam Deck',                              //17
            'Rocket League',                           //18
            'Counter-Strike 2',                        //19
            'Forza Horizon 5',                         //20
            'Left 4 Dead 2',                           //21
            'Hitman 3 - Seven Deadly Sins Collection', //22
        ];

        $dates = [
            '2015-09-15',
            '2017-08-22',
            '1980-05-22',
            '1984-06-06',
            '2011-05-16',
            '2017-07-25',
            '2003-10-29',
            '2013-10-29',
            '2013-09-17',
            '2012-11-06',
            '2021-06-10',
            '2004-11-23',
            '2016-05-24',
            '2023-12-15',
            '2018-03-27',
            '2013-07-09',
            '2021-11-16',
            '2015-07-07',
            '2012-08-21',
            '2021-11-09',
            '2008-11-17',
            '2021-01-20',
            '2022-01-01',
        ];

        $short_description = [
            'Experience unique RPG elements where your choices matter, in a world where you can spare your foes.',
            'Join Chloe and Nadine in a thrilling hunt for an ancient Indian artifact across mountains and ruins.',
            'Embark on a globetrotting adventure in the ultimate spy thriller story, completing assassinations with creativity and stealth.',
            'Reimagine the classic puzzle game with stunning visuals, music, and innovative multiplayer modes.',
            'Craft, battle, explore, and build in a sandbox world brimming with action and adventure.',
            'Compete in a mix of high-energy, last-one-standing battles and creative expression in a constantly evolving universe.',
            'Dive into futuristic warfare with advanced technology and weaponry in gripping single and multiplayer modes.',
            'Set sail in the Golden Age of Piracy as Captain Edward Kenway, navigating open-world naval adventures and stealth missions.',
            'Explore the lives of three vastly different criminals in Los Santos as they pull off high-stakes heists.',
            'Relive the epic saga of Master Chief across remastered Halo campaigns and multiplayer experiences.',
            'Rediscover the epic of Cloud Strife with improved graphics, gameplay, and an expanded story in Midgar.',
            'Unleash your creativity in a blocky, procedurally generated world with endless possibilities for adventure and creation.',
            'Engage in fast-paced, team-oriented multiplayer battles with a diverse cast of heroes in a vibrant, changing world.',
            'Experience the authenticity and emotion of football with advanced gameplay mechanics and immersive modes.',
            'Learn how to build and grow your very own computer repair enterprise, diagnosing, fixing, and building PCs.',
            'Immerse yourself in the captivating story of a group of troubled high school students with hidden powers.',
            'Experience your entire Steam library on the go with this powerful, portable PC gaming device.',
            'Experience the thrilling combination of arcade-style soccer and vehicular mayhem, with easy-to-understand controls.',
            'Dive back into the fast-paced world of counter-terrorism operations in this iconic first-person shooter.',
            'Race through the vibrant and ever-evolving landscapes of Mexico in this open-world driving adventure.',
            'Survive the zombie apocalypse as you and your friends face off against hordes of zombies in this co-op horror FPS.',
            'Explore the dark mind of Agent 47 with themed expansion packs that explore the seven deadly sins.',
        ];

        $long_description = [
            'Welcome to UNDERTALE. In this RPG, you control a human who falls underground into the world of monsters. Now you must find your way out... or stay trapped forever.

            ((Healthy Dog\'s Warning: Game contains imagery that may be harmful to players with photosensitive epilepsy or similar condition.))
            features:

                Killing is unnecessary: negotiate out of danger using the unique battle system.
                Time your attacks for extra damage, then dodge enemy attacks in a style reminiscent of top-down shooters.
                Original art and soundtrack brimming with personality.
                Soulful, character-rich story with an emphasis on humor.
                Created mostly by one person.
                Become friends with all of the bosses!
                At least 5 dogs.
                You can date a skeleton.
                Hmmm... now there are 6 dogs...?
                Maybe you won\'t want to date the skeleton.
                I thought I found a 7th dog, but it was actually just the 3rd dog.
                If you play this game, can you count the dogs for me...? I\'m not good at it.',

            '"Uncharted: The Lost Legacy" follows Chloe Frazer and Nadine Ross as they explore India\'s Western Ghats to uncover the ancient Tusk of Ganesh. This standalone adventure combines breathtaking settings, intricate puzzles, and dynamic combat.',

            '"Hitman 3" caps the World of Assassination trilogy, offering players expansive sandbox locations to execute perfect assassinations. With creativity and stealth, uncover the dark secrets of Agent 47\'s world in a narrative that ties deep into his past.',

            '"Counter-Strike 2" revitalizes the classic FPS gameplay with modern graphics, enhanced mechanics, and new maps while retaining its core tactical shooting experience. Engage in intense multiplayer matches focusing on teamwork and strategy.',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',

            'AAAAAAA',
        ];
        for($i=0;$i<22;$i++) // 0 ; <22
        {
            $bool = (bool)rand(0,1);
            DB::table('games')->insert([
                'name' => $names[$i],//PLACEHOLDER RNGNAME FROM ARRAY
                'date' => $dates[$i],//PLACEHOLDER RNGBD
                'base_price' => $base_price = mt_rand() / mt_getrandmax() * (69.99 - 1) + 1,//PLACEHOLDER FLOAT RNG
                'is_dlc' => $i === 21 ? true : false,
                'parent_id' => $i === 21 ? 3 : null,
                'is_discounted' => $bool ? true : false,
                'discounted_percentage' => $bool ? $discounted_percentage = rand(5,90) : null,//PLACEHOLDER RNG
                'discounted_price' => $bool ? $base_price-($base_price*($discounted_percentage/100)) : null,
                'short_description' => $short_description[$i],
                //'long_description' => $long_description[$i],
                'pegi_id' => rand(0,4),
            ]);
        }
    }
}
