<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class ReviewsSeeder extends Seeder
{
    public function run(): void
    {
        $positive = [
            'Fantastic gameplay and graphics! A must-play for any gaming enthusiast.',
            'Engaging storyline that keeps you hooked from start to finish.',
            'Smooth controls make the gaming experience incredibly enjoyable.',
            'Immersive world with stunning environments and attention to detail.',
            'Innovative mechanics that bring a refreshing twist to the genre.',
            'A true masterpiece – the level design is exceptional.',
            'The soundtrack enhances the overall atmosphere, creating a memorable experience.',
            'Multiplayer functionality adds an extra layer of fun and excitement.',
            'Well-balanced difficulty curve, providing a satisfying challenge.',
            'Character development is top-notch, making you truly care about the protagonists.',
            'Impressive array of weapons and abilities for endless strategic possibilities.',
            'Seamless online integration for a dynamic and social gaming experience.',
            'This game sets a new standard for excellence in the gaming industry.',
            'Attention to detail in every aspect makes it a joy to explore the game world.',
            'The community around this game is passionate and supportive.',
            'Regular updates and DLCs keep the content fresh and exciting.',
            'Stunning visual effects that contribute to the overall cinematic experience.',
            'The voice acting is exceptional, bringing characters to life.',
            'Thought-provoking themes explored throughout the game.',
            'Outstanding replay value – you\'ll want to experience it again and again.',
            'Filippo.',
        ];
        $negative = [
            'This game is a complete disaster, couldn\'t even get past the first level.',
            'The graphics are horrendous, looks like something from the 90s.',
            'I wasted my money on this game, it\'s not worth a penny.',
            'Gameplay is clunky and unresponsive, feels like a chore to play.',
            'The story is nonsensical, I have no idea what is going on.',
            'Buggy mess! Constant crashes and glitches ruin the experience.',
            'Controls are so confusing, took me hours to figure them out.',
            'I regret buying this game, it\'s a total letdown.',
            'The sound effects are annoying and repetitive.',
            'I would give this game zero stars if I could, absolutely terrible.',
            'No replay value whatsoever, once is more than enough.',
            'The developers clearly didn\'t playtest this game, it\'s full of issues.',
            'I expected so much more from this game, but it\'s a huge disappointment.',
            'Save your money, this game is not worth the frustration.',
            'The AI in this game is laughably bad, enemies act like they have no brains.',
            'The in-game economy is broken, making progression a pain.',
            'The game lacks innovation, feels like a copy-paste of other titles.',
            'Uninspired and generic, there\'s nothing memorable about this game.',
            'The dialogue is cringe-worthy, characters are poorly written.',
            'This game is a prime example of rushed development, unfinished and sloppy.',
            'Filippo.'
        ];
        for($i=0;$i<sizeof($positive)*15;$i++)
        {
            DB::table('reviews')->insert([
                'user_id' => rand(1,19),//PLACEHOLDER RNG
                'game_id' => rand(1,19),//PLACEHOLDER RNG
                'date' => Carbon::now()->subYears(random_int(1, 10))->subDays(random_int(1, 365))->format('Y-m-d'),//PLACEHOLDER RNGBD
                'is_recommended' => $bool = (bool)rand(0,1),//PLACEHOLDER BOOL RNG
                'description' => $bool ? $positive[random_int( 0, sizeof($positive)-1 )] : $negative[random_int( 0, sizeof($negative)-1 )],
                'hours_played' => mt_rand() / mt_getrandmax() * (999 - 1) + 1,//PLACEHOLDER FLOAT RNG
            ]);
        }
    }
}
