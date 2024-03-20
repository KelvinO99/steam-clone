<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder\GamesTagsSeeder;
use Carbon\Carbon;


class GamesSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Undertale',                               //1
            'Uncharted: The Legacy Collection',        //2
            'Hitman 3',                                //3
            'Tetris Effect: Connected',                //4
            'Terraria',                                //5
            'Fortnite',                                //6
            'Call of Duty Black Ops 2',                //7
            'Assassin\'s Creed 4',                      //8
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
            'Grand Theft Auto VI',                     //23
            'Resident Evil 4',                         //24
            'Mortal Kombat 1',                         //25
            'Red Dead Redemption 2',                   //26
            'God Of War',                              //27
            'Tom Clancy\'s Rainbow Six Siege',         //28
            'Dead Space',                              //29
            'Grounded',                                //30
            'Cyberpunk 2077',                          //31
            'Sea Of Thieves',                          //32
            'Sekiro Shadows Die Twice',                //33
            'Monster Hunter Rise',                     //34
            'Assassin\'s Creed Valhalla',              //35
            'Persona 3 Reload',                        //36
            'Horizon Forbidden West',                  //37
            'Baldur\'s Gate 3',                        //38
            'Elden Ring',                              //39
            'PLACEHOLDER DLC CB2077',                        //40
        ];

        $dates = [
            '2015-09-15',
            '2022-01-28',
            '2021-01-20',
            '2018-11-09',
            '2011-05-16',
            '2017-07-21',
            '2012-11-12',
            '2013-10-29',
            '2015-09-17',
            '2014-11-11',
            '2020-04-10',
            '2011-11-18',
            '2022-10-04',
            '2023-07-29',
            '2018-03-27',
            '2019-10-31',
            '2022-02-25',
            '2015-07-07',
            '2012-08-21',
            '2021-11-05',
            '2009-11-17',
            '2021-03-30',
            '2025-09-16',
            '2021-05-20',  // Resident Evil 4
            '2023-09-19',  // Mortal Kombat (2023)
            '2023-10-24',  // Dead Space (Remake) !!!
            '2018-04-20',  // God Of War
            '2015-12-01',  // Tom Clancy's Rainbow Six Siege
            '2008-10-14',  // Dead Space !!!
            '2020-07-28',  // Grounded
            '2020-12-10',  // Cyberpunk 2077
            '2018-06-03',  // Sea Of Thieves
            '2019-03-22',  // Sekiro Shadows Die Twice
            '2021-03-26',  // Monster Hunter Rise
            '2022-12-06',  // Assassin's Creed Valhalla !!!
            '2022-06-14',  // Persona 3 Remake !!!
            '2023-04-18',  // Horizon Forbidden West !!!
            '2022-08-30',  // Baldur's Gate 3 !!!
            '2022-02-25',  // Elden Ring
            '2016-06-14',  // Dead By Daylight !!!

        ];
        $carbonDates = [];
        foreach ($dates as $dateString) {
            $carbonDates[] = Carbon::parse($dateString);
        }
        //$carbonDates[sizeof($carbonDates)] = Carbon::parse($dates[sizeof($dates) -1]);

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
            'GTA VI',
            "Survive a terrifying rural village filled with unimaginable horrors as Leon S. Kennedy. Experience the groundbreaking third-person shooter that redefined the survival horror genre.", // Resident Evil 4
            "Relive the origins of the legendary fighting franchise in this groundbreaking reboot. Experience bone-crushing battles, iconic characters, and visceral fatalities reimagined with cutting-edge graphics and gameplay.", // Mortal Kombat 1
            "Immerse yourself in the epic tale of outlaw Arthur Morgan and the Van der Linde gang as they rob, steal, and fight their way across America's heartland in the dying days of the Wild West.", // Red Dead Redemption 2
            "Embark on a breathtaking journey with Kratos and his son Atreus as they venture into the Norse realms, battling gods and monsters in a deeply emotional and visually stunning action-adventure.", // God Of War
            "Lead an elite team of counter-terrorist operators in intense, strategic multiplayer battles. With destructible environments and a thriving community, every match is a new challenge.", // Tom Clancy's Rainbow Six Siege
            "Unearth the horrifying truth behind the mysterious Necromorph outbreak aboard the USG Ishimura. In this sci-fi survival horror, strategic dismemberment is your only hope for survival.", // Dead Space
            "Shrink down to the size of an ant and explore a backyard teeming with danger and discovery. Build shelters, craft tools, and battle giant insects in this whimsical survival adventure.", // Grounded
            "Enter the neon-lit streets of Night City in this sprawling open-world RPG. Customize your cybernetic mercenary and carve your own path through a world filled with intrigue and danger.", // Cyberpunk 2077
            "Set sail on the high seas in this swashbuckling multiplayer adventure. Crew up with friends, plunder treasure, and engage in epic naval battles in a vast and unpredictable world.", // Sea Of Thieves
            "Become the 'One-Armed Wolf' and embark on a relentless journey of revenge in feudal Japan. Master the 'way of the shinobi' and confront powerful foes in this punishing action RPG.", // Sekiro Shadows Die Twice
            "Hunt ferocious monsters and forge your legend in the breathtaking landscapes of Kamura Village. With new gameplay mechanics and seamless online multiplayer, the hunt has never been more thrilling.", // Monster Hunter Rise
            "Step into the shoes of a master assassin in this captivating action-adventure set in exotic lands. Unravel ancient mysteries, forge alliances, and become a legend in the world of espionage.", // Assassin's Creed Valhalla
            "Experience the acclaimed JRPG with enhanced visuals and new features. Balance school life with battling malevolent entities in a captivating tale of friendship, loss, and self-discovery.", // Persona 3 Reload
            "Embark on an epic quest across the vibrant and dangerous landscapes of post-apocalyptic America. Uncover the mysteries of the Old Ones and confront towering machines in this breathtaking sequel.", // Horizon Forbidden West
            "Journey into the iconic Dungeons & Dragons universe in this ambitious RPG adventure. Forge alliances, explore vast dungeons, and face off against unimaginable evil in a world of magic and mystery.", // Baldur's Gate 3
            "Discover a vast, seamless world filled with dark fantasy and rich lore. From the minds of Hidetaka Miyazaki and George R.R. Martin comes an epic action RPG where your choices shape the fate of the realm.", // Elden Ring
            "Enter the realm of the Entity and experience asymmetrical multiplayer horror at its finest. Play as either a ruthless killer or a survivor, each with their own unique abilities and objectives.", // Dead By Daylight
        ];

        $long_description = [
//"ABOUT THIS GAME"
//1
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

//2
            'Are You Ready To Seek Your Fortune?

            Seek your fortune and leave your mark on the map in the UNCHARTED: Legacy of Thieves Collection. Uncover the thrilling cinematic storytelling and the largest blockbuster action set pieces in the UNCHARTED franchise, packed with all the wit, cunning, and over the top moments of the beloved thieves – Nathan Drake and Chloe Frazer.

            In an experience delivered by award winning developer Naughty Dog, the UNCHARTED: Legacy of Thieves Collection includes the two critically-acclaimed, globe-trotting single player adventures from UNCHARTED™ 4: A Thief’s End and UNCHARTED™: The Lost Legacy. Each story is filled with laughs, drama, high octane combat, and a sense of wonder – remastered to be even more immersive.

            Discover the breath-taking sights


            From thick jungles to snow-capped mountains, exotic islands to rain-soaked streets, explore every inch of stunningly beautiful environments in spectacular detail. Immerse yourself in the cinematic storytelling with super-sharp 4K resolution*, and Ultra-Wide Monitor support**. Enjoy a host of enhanced graphical adjustment features such as adjustable Texture and Model Quality, Anisotropic Filtering, Shadows, Reflections and Ambient Occlusion.

            Feel the thrilling gameplay in your hands

            Experience haptic feedback and dynamic trigger effects designed for UNCHARTED: Legacy of Thieves Collection by playing with the DualSense™ controller through a wired connection to your PC. With full control remapping and support for the DualShock®4 controller ***, XInput Game Controllers, and a wide range of other gamepads and keyboard and mouse, you can leave your mark on the map any way you like. For those that want to brighten things up even more, try out RGB support for Razer Chroma peripherals and Chroma Link compatible devices, as well as for Logitech models.

            Optimize the adventure


            Unearth a wide variety of modes and PC-centric enhancements such as improved UI for game options, reimagined user interfaces, the addition of scale sliders for some menus, GPU and VRAM detection and management options, as well as adding Auto Pause, Minimize in Background and Variable Load Speed support along with a host of other additions.

            AMD Fidelity FX Super Resolution 2

            Supercharge your framerates as you seek your fortune as Nathan and Chloe with next-level temporal upscaling technology from AMD. FSR 2 uses cutting-edge algorithms to boost your framerates and deliver high-quality, high-resolution game experiences in UNCHARTED across a wide range of compatible graphics cards.

            UNCHARTED 4: A Thief’s End

            Winner of over 150 Game of the Year awards.

            Several years after his last adventure, retired fortune hunter Nathan Drake, is forced back into the world of thieves. Fate comes calling when Sam, Drake’s presumed dead brother, resurfaces seeking his help to save his own life and offering an adventure Drake can’t resist. Drake’s greatest adventure will test his physical limits, his resolve, and ultimately what he’s willing to sacrifice to save the ones he loves.

            On the hunt for Captain Henry Avery’s long-lost treasure, Sam and Drake set off to find Libertalia, the pirate utopia deep in the forests of Madagascar – leading to a journey around the globe through jungle isles, far-flung cities, and snow capped peaks on the search for Avery’s fortune.

            ● A globe-trotting adventure with the largest and most detailed environments in the UNCHARTED franchise

            ● A more personal story for Nathan Drake, raising the stakes for the award-winning storytelling of Naughty Dog.

            ● Fluid combat and traversal with the use of the grapple hook creates even more dynamic and thrilling action set pieces.


            UNCHARTED: The Lost Legacy

            In order to recover an ancient artifact and keep it out of the hands of a ruthless warmonger, Chloe Frazer must enlist the aid of renowned mercenary Nadine Ross and venture to India’s Western Ghats to locate the Golden Tusk of Ganesh. In Chloe’s greatest journey yet, she must confront her past and decide what she’s willing to sacrifice to forge her own legacy.

            ● An all-new setting for adventure in the south western coast of the Indian peninsula, featuring an exotic mix of urban, jungle, and ancient ruins environments.

            ● The action-packed set pieces and captivating narrative that fans have come to expect from Naughty Dog and the UNCHARTED series.

            ● Builds on the acclaimed UNCHARTED franchise gameplay with updated systems and refinements, including cinematic combat, exploration, and traversal of jaw-dropping environments, complex puzzles and more.



            * Compatible PC and 4K display device required.
            ** Compatible PC and display device required.
            *** Use DUALSHOCK 4 USB wireless adaptor or a compatible micro-USB cable to connect to PC.


            ©2022 Sony Interactive Entertainment LLC. Created and developed by Naughty Dog LLC. UNCHARTED is a registered trademark of Sony Interactive Entertainment LLC and related companies in the U.S. and other countries. ',
//3
            'WORLD OF ASSASSINATION

            Enter the world of the ultimate assassin. HITMAN World of Assassination brings together the best of HITMAN, HITMAN 2 and HITMAN 3 including the main campaign, contracts mode, escalations, elusive target arcades and featured live content.

            BECOME AGENT 47



            Suit up for a spy-thriller adventure where all your deadly abilities are put to the test across more than 20 locations.

            FREEDOM OF APPROACH



            Your deadliest weapon is creativity. Unlock new gear and up your game on highly replayable missions.

            WORLD OF ASSASSINATION



            Travel a living, breathing world, filled with intriguing characters and lethal opportunities.

            HITMAN FREELANCER



            A new way to play on your own terms, that combines rogue-like elements and deep strategic planning with a persistent and infinitely replayable gameplay experience. ',
//4
            'Tetris® Effect: Connected is Tetris like you\'ve never seen it, or heard it, or felt it before—an incredibly addictive, unique, and breathtakingly gorgeous reinvention of one of the most popular puzzle games of all time, from the people who brought you the award-winning Rez Infinite and legendary puzzle game Lumines.

            Music, backgrounds, sounds, special effects—everything, down to the Tetriminos themselves—pulse, dance, shimmer, and explode in perfect sync with how you\'re playing, making any of the game\'s 30+ stages and 10+ modes something you\'ll want to experience over and over again.

            Plus cross-platform multiplayer modes for competitive and cooperative play!





            An exhilarating single-player experience full of surprises.
            Over 30 different stages, each with its own music, sound effects, graphical style and background that all evolve and change as you play through them.

            The Zone is an all-new mechanic designed just for Tetris Effect: Connected!
            Includes the all-new “Zone” mechanic, where players can stop time (and Tetriminos falling) by entering “the Zone” and either get out of a sticky situation that could otherwise lead to “Game Over,” or rack up extra Line Clears for bonus rewards.

            Cross-platform multiplayer lets you play with players from all over the world!
            Players on different platforms can easily join Friend Match rooms with the new Room ID feature.



            A wide variety of competitive and co-op modes!
            Among the new modes is "CONNECTED," where three players can team up and literally connect their Tetris Matrices to fight against A.I.-controlled Bosses; "Zone Battle," a one-on-one match of standard competitive Tetris, but with a twist: the time-stopping Zone mechanic; and "Score Attack" and "Classic Score Attack,” two single-player versus modes where two players compete separately to see who can get the best score.

            Join in on the fun in Spectator mode!
            Spectator mode is available in Friend Matches. A room can contain up to 8 total people. Spectators can use emotes during the match to liven up the competition.

            Tailored for Steam, capable of running at resolutions of 4K or more with an uncapped framerate (with Vsync disabled) and includes ultra-wide monitor support as well as other expanded game and graphical options not found in the console release for both 2D and VR play (including adjustable particle volume and size, texture filtering, and more). ',
//5
            'Dig, Fight, Explore, Build: The very world is at your fingertips as you fight for survival, fortune, and glory. Will you delve deep into cavernous expanses in search of treasure and raw materials with which to craft ever-evolving gear, machinery, and aesthetics? Perhaps you will choose instead to seek out ever-greater foes to test your mettle in combat? Maybe you will decide to construct your own city to house the host of mysterious allies you may encounter along your travels?

            In the World of Terraria, the choice is yours!

            Blending elements of classic action games with the freedom of sandbox-style creativity, Terraria is a unique gaming experience where both the journey and the destination are completely in the player’s control. The Terraria adventure is truly as unique as the players themselves!

            Are you up for the monumental task of exploring, creating, and defending a world of your own?

            Key features:

                Sandbox Play
                Randomly generated worlds
                Free Content Updates',
//6
            'Explore large, destructible environments where no two games are ever the same. Team up with friends by sprinting, climbing and smashing your way to earn your Victory Royale, whether you choose to build up in Fortnite Battle Royale or go no-builds in Fortnite Zero Build.
            Discover even more ways to play across thousands of creator-made game genres: adventure, roleplay, survival and more. Or, band together with up to three friends to fend off hordes of monsters in Save the World.
            Chapter 5 Season 1: Underground!
            Chapter 5 of Fortnite Battle Royale brings a beautiful new Island, but not all is what it seems. “The Society” is pulling the strings in secret, and they’ve taken Peely in their spite. Join “The Underground” and take down The Society’s bosses — including its most notorious boss Valeria. To help you out, take the Island’s train, modify your weapons, and use a “Ballistic Shield” while shooting a pistol. Join the fight in Chapter 5 Season 1: Underground!
            Fortnite Chapter 5 Season 1: Big Bang Battle Pass!
            The Outfits are Underground underdogs and The Society’s crème de la crooked. With the Big Bang Battle Pass purchase, you’ll auto-unlock troublemaker Hope, the hope of The Underground. Progress in the Battle Pass to unlock more Outfits. Those aren’t all the Outfits in the Battle Pass. Later on, unlock Solid Snake of the Gaming Legends Series!
            You can earn XP towards your Big Bang Battle Pass in Battle Royale and Zero Build. But did you know you can also earn XP in certain creator-made games? Creator-made games that reward XP have an XP badge in their Discover screen description. Play the way you want to complete this Season\'s Big Bang Battle Pass!
            Play Your Way!
            Sprint, climb, and smash your way to a Victory Royale whether you choose to build up in Fortnite Battle Royale or go no-builds in Fortnite Zero Build.
            Take the offensive in Fortnite Zero Build No Build Battle Royale
            Introducing a new, tactical take on Fortnite Battle Royale with the launch of Fortnite Zero Build. Show off your sharp shooting, sharp thinking, and sharp sense of space as you take on the Battle full-tilt in Fortnite Zero Build.
            Without building, all players have the recharging Overshield as their first line of defense in Zero Build. Slide downhill to avoid enemy fire or use mantling to get the high ground on opponents. Don’t forget to sprint between cover on your way to a Victory Royale!
            Zero Build is a pure test of weapon, item, and traversal skill - no building required.
            Zero Build is a pure test of weapon, item, and traversal ability. Zero Build can be found in the Discover page as Solo, Duos, Trios, and Squads playlists. (Access the Discover page by clicking on the “CHANGE” button above “PLAY!” in the Lobby.)
            Fortnite Zero Build shares XP progression and Quests with Fortnite Battle Royale, meaning you can earn XP towards your Battle Pass in either Fortnite Zero Build or Fortnite Battle Royale. Take on a new challenge and level up along the way!
            Battle. Build. Create.
            Create, play, and battle with friends for free in Fortnite. Be the last player standing in Battle Royale and Zero Build, experience a concert or live event, or discover over a million creator made games, including racing, parkour, zombie survival, and more. Find it all in Fortnite!
            Fortnite Crew
            Fortnite Crew is the ultimate subscription offer for getting can’t-miss Fortnite content! Join for only $11.99 each month to get everything below:
            • Battle Pass Included for the full Season - As a member of the Fortnite Crew, you’ll always have access to the current season’s Battle Pass!
            • 1,000 V-Bucks Each Month - Fortnite Crew members will receive 1,000 V-Bucks every month. Spend it on your favorite Item Shop content!
            • Get A Monthly Crew Pack! - Get an exclusive Fortnite Crew Pack, an always-new Outfit Bundle that only Fortnite Crew members can get.
            Recurring fee charged monthly until cancelled. Cancel anytime.
            If you’d like to learn more about Fortnite Crew, you can find all details and FAQs at https://www.epicgames.com/fortnite/fortnite-crew-subscription',
//7
            'Pushing the boundaries of what fans have come to expect from the record-setting entertainment franchise, Call of Duty®: Black Ops II propels players into a near future, 21st Century Cold War, where technology and weapons have converged to create a new generation of warfare.',
//8
            'The year is 1715. Pirates rule the Caribbean and have established their own lawless Republic where corruption, greediness and cruelty are commonplace.

            Among these outlaws is a brash young captain named Edward Kenway. His fight for glory has earned him the respect of legends like Blackbeard, but also drawn him into the ancient war between Assassins and Templars, a war that may destroy everything the pirates have built.

            Welcome to the Golden Age of Piracy.
            Key Features


                A BRASH REBEL ASSASSIN Become Edward Kenway, a charismatic yet brutal pirate captain, trained by Assassins. Edward can effortlessly switch between the Hidden Blade of the Assassin’s Order and all new weaponry including four flintlock pistols and dual cutlass swords.


                EXPLORE AN OPEN WORLD FILLED WITH OPPORTUNITIES Discover the largest and most diverse Assassin’s Creed world ever created. From Kingston to Nassau, explore over 75 unique locations where you can live the life of a pirate including:

                    Loot underwater shipwrecks
                    Assassinate Templars in blossoming cities
                    Hunt for rare animals in untamed jungles
                    Search for treasure in lost ruins
                    Escape to hidden coves


                BECOME THE MOST FEARED PIRATE IN THE CARIBBEAN Command your ship, the Jackdaw, and strike fear in all who see her. Plunder and pillage to upgrade the Jackdaw with ammunition and equipment needed to fight off enemy ships. The ship’s improvements are critical to Edward’s progression through the game. Attack and seamlessly board massive galleons, recruit sailors to join your crew and embark on an epic and infamous adventure.


                EXPERIENCE THE GRITTY REALITY BEHIND THE PIRATE FANTASY Stand amongst legendary names such as Blackbeard, Calico Jack and Benjamin Hornigold, as you establish a lawless Republic in the Bahamas and relive the truly explosive events that defined the Golden Age of Piracy.


                THE BEST ASSASSIN’S CREED MULTIPLAYER EXPERIENCE TO DATE Put your assassination skills to test and embark on an online journey throughout the Caribbean. Discover a brand new set of pirate characters, and explore exotic and colourful locations. Additionally, create your own game experience with the new Game Lab feature – craft your own multiplayer mode by choosing abilities, rules and bonuses. Play and share your newly created mode with your friends.',
//9
            'When a young street hustler, a retired bank robber and a terrifying psychopath find themselves entangled with some of the most frightening and deranged elements of the criminal underworld, the U.S. government and the entertainment industry, they must pull off a series of dangerous heists to survive in a ruthless city in which they can trust nobody, least of all each other.

            Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.

            The game offers players a huge range of PC-specific customization options, including over 25 separate configurable settings for texture quality, shaders, tessellation, anti-aliasing and more, as well as support and extensive customization for mouse and keyboard controls. Additional options include a population density slider to control car and pedestrian traffic, as well as dual and triple monitor support, 3D compatibility, and plug-and-play controller support.

            Grand Theft Auto V for PC also includes Grand Theft Auto Online, with support for 30 players and two spectators. Grand Theft Auto Online for PC will include all existing gameplay upgrades and Rockstar-created content released since the launch of Grand Theft Auto Online, including Heists and Adversary modes.

            The PC version of Grand Theft Auto V and Grand Theft Auto Online features First Person Mode, giving players the chance to explore the incredibly detailed world of Los Santos and Blaine County in an entirely new way.

            Grand Theft Auto V for PC also brings the debut of the Rockstar Editor, a powerful suite of creative tools to quickly and easily capture, edit and share game footage from within Grand Theft Auto V and Grand Theft Auto Online. The Rockstar Editor’s Director Mode allows players the ability to stage their own scenes using prominent story characters, pedestrians, and even animals to bring their vision to life. Along with advanced camera manipulation and editing effects including fast and slow motion, and an array of camera filters, players can add their own music using songs from GTAV radio stations, or dynamically control the intensity of the game’s score. Completed videos can be uploaded directly from the Rockstar Editor to YouTube and the Rockstar Games Social Club for easy sharing.

            Soundtrack artists The Alchemist and Oh No return as hosts of the new radio station, The Lab FM. The station features new and exclusive music from the production duo based on and inspired by the game’s original soundtrack. Collaborating guest artists include Earl Sweatshirt, Freddie Gibbs, Little Dragon, Killer Mike, Sam Herring from Future Islands, and more. Players can also discover Los Santos and Blaine County while enjoying their own music through Self Radio, a new radio station that will host player-created custom soundtracks.

            Special access content requires Rockstar Games Social Club account. Visit http://rockstargames.com/v/bonuscontent for details. ',
//10
            'The series that changed console gaming forever is on PC with six blockbuster games in one epic experience.

            PC Settings/Optimizations
            Halo: The Master Chief Collection is now optimized for PC and looking better than ever at up to 4k UHD and at 60+ FPS.* Other setting options include customizable mouse and keyboard support, ultrawide support, FOV customization, and more.


            Campaign
            Featuring Halo: Reach, Halo: Combat Evolved Anniversary, Halo 2: Anniversary, Halo 3, Halo 3: ODST Campaign, and Halo 4, The Master Chief Collection offers players their own exciting journey through the epic saga. Starting with the incredible bravery of Noble Six in Halo: Reach and ending with the rise of a new enemy in Halo 4, the Master Chief’s saga totals 67 campaign missions over six critically-acclaimed titles.


            Multiplayer
            Each of the six games in The Master Chief Collection brings its own multiplayer maps, modes and game types. With more than 120 multiplayer maps and countless ways to play with community-created Forge content the Collection has the most diverse and expansive Halo multiplayer experience to date.


            Forge
            Halo’s iconic map editor is improved, refreshed and better than ever. Build new maps with expanded functionality, increased budget, new objects and create new ways to play with custom game modes.**


            *Look to system requirements for guidance on hardware minimum specs to achieve performance metrics.

            **Forge mode not available in Halo: Combat Evolved Anniversary or Halo 3: ODST. ',
//11
            'FINAL FANTASY VII REMAKE is a bold reimagining of the original FINAL FANTASY VII, originally released in 1997, developed under the guidance of the original key developers.
            This critically-acclaimed game, which mixes traditional command-based combat and real-time action, makes its Steam debut along with FF7R EPISODE INTERmission─a new story arc featuring Yuffie Kisaragi.



            ■STORY

            By exploiting mako, the life-blood of the planet, through their mako reactors, the Shinra Electric Power Company has all but seized control of the entire world. A ragtag group of idealists, known as Avalanche, are one of the last bastions of resistance.

            Cloud, an elite SOLDIER operative-turned-mercenary takes part in an Avalanche operation to destroy Mako Reactor 1 in the city of Midgar.
            The bombing plunges the city into fiery chaos, and Cloud is tormented by visions of a bitter enemy long thought dead.

            Once more begins a story that will shape the destiny of an entire world.

            * This game is a remake of FINAL FANTASY VII, first released in 1997.
            The first title in a multi-part series, it is based on the story from the original game, up to the escape from Midgar, adding in new elements.



            ■FF7R EPISODE INTERmission (New episode featuring Yuffie Kisaragi)

            FF7R EPISODE INTERmission is a brand-new adventure in the world of FINAL FANTASY VII REMAKE INTERGRADE. Play as Wutaian ninja Yuffie Kisaragi as she infiltrates Midgar and conspires with Avalanche HQ to steal the ultimate materia from the Shinra Electric Power Company.



            ■Content included in this product

            FINAL FANTASY VII REMAKE INTERGRADE contains the following content:
            - FINAL FANTASY VII REMAKE full game
            - DLC "FF7R EPISODE INTERmission" (New episode featuring Yuffie Kisaragi)
            - Weapon: Cacstar
            - Armor: Midgar Bangle
            - Armor: Shinra Bangle
            - Armor: Corneo Armlet
            - Accessory: Superstar Belt
            - Accessory: Mako Crystal
            - Accessory: Seraphic Earrings
            - Summon materia: Carbuncle
            - Summon materia: Chocobo Chick
            - Summon materia: Cactuar

            *The additional weapons, armor, accessories and summon materia can be obtained from the Gift Box on the main menu.
            *The weapon "Cacstar" can only be used in FF7R EPISODE INTERmission (Yuffie episode) ',
//12
            'Minecraft is a game made up of blocks, creatures, and community. You can survive the night or build a work of art – the choice is all yours. But if the thought of exploring a vast new world all on your own feels overwhelming, then fear not! Let’s explore what Minecraft is all about!
            What is the goal of Minecraft?

            Minecraft has no set goal and can be played however you’d like! This is why it’s sometimes called a “sandbox game” – there are lots of things for you to do, and lots of ways that you can play. If you like being creative, then you can use the blocks to build things from your imagination. If you’re feeling brave, you can explore the world and face daring challenges. Blocks can be broken, crafted, placed to reshape the landscape, or used to build fantastical creations.

            Creatures can be battled or befriended, depending on how you play. The world of Minecraft allows for epic adventures, quiet meditations, and everything in between. You can even share your creations with other players, or play in community worlds!',
//13
            '"Overwatch 2, Blizzard Entertainment\'s vibrant sequel to the original team-based shooter, steps onto the battlefield with a fresh coat of paint and a truckload of upgrades. This iteration isn\'t just a simple facelift; it\'s a full-on evolution, pushing the boundaries of team play and hero dynamics. At its core, Overwatch 2 maintains the beloved fast-paced, character-driven action, but with significant enhancements that redefine the experience.

            The game introduces new maps, heroes, and a revamped PvP experience, focusing heavily on cooperative PvE story missions – a first for the series. These missions dive deeper into the rich lore of the Overwatch universe, giving players a chance to explore the backstories and motivations of their favorite heroes. It\'s not just about the shooting (though, let\'s be real, that\'s a big part); it\'s about immersing yourself in a world where every character has a story worth telling.

            Graphically, Overwatch 2 is a feast for the eyes. The updated engine showcases more detailed environments, dynamic weather effects, and enhanced character models, all while maintaining that signature Overwatch style – colorful, lively, and just a touch whimsical. The visual improvements are not just for show; they also impact gameplay, with environmental effects influencing strategy and tactics.

            On the competitive front, Overwatch 2 overhauls the PvP experience. The game shifts to a 5v5 format, intensifying the action and requiring more strategic thinking. This change, controversial as it may be, encourages players to adapt and rethink their approach to team composition and map control. New modes and maps are introduced, each designed to test players\' abilities and teamwork.

            Overwatch 2 is not just a sequel; it\'s a statement. It\'s Blizzard\'s commitment to evolving the series while staying true to what fans loved about the original. Whether you\'re here for the lore, the competitive scene, or just the sheer joy of pulling off the perfect combo with your friends, Overwatch 2 promises an experience that\'s both familiar and fresh, challenging and rewarding.

            As developers, we must appreciate the technical prowess behind Overwatch 2. The seamless integration of new gameplay mechanics with the existing framework demonstrates Blizzard\'s dedication to innovation without alienating the core player base. It\'s a delicate balance, but one that Overwatch 2 seems to navigate with grace and confidence.",',
//14
            'FIFA 24 emerges as the latest installment in EA Sports\' long-standing football simulation series, bringing with it a wave of improvements, innovations, and the ever-present promise of the most authentic football experience you can get without actually lacing up your boots. This year\'s edition focuses on deepening the immersion, refining gameplay mechanics, and expanding the wealth of content that fans have come to expect.

            The game boasts enhanced graphics that bring players and stadiums to life like never before. Advanced motion capture techniques and an improved physics engine create a level of realism that blurs the line between the virtual pitch and the real thing. Player movements, ball dynamics, and crowd animations are more lifelike, contributing to an unparalleled soccer simulation.

            FIFA 24 introduces \'HyperMotion2 Technology,\' an evolution of the revolutionary gameplay technology that utilizes real-world match data to dynamically influence animations and gameplay. This means players move and react more authentically to situations on the pitch, whether it\'s a desperate slide tackle or a cheeky flick to beat an opponent.

            Career mode receives a substantial overhaul, offering deeper management options, more dynamic player progression, and enhanced story elements that make your journey from rookie manager or young talent to football legend more engaging. The introduction of new, more complex negotiation mechanics and youth development systems adds layers of strategy to managing your club or player career.

            Ultimate Team, the cornerstone of FIFA\'s replayability, returns with new features, challenges, and rewards. The mode continues to evolve, offering more customization options for your team and more ways to play and compete against the global community. FIFA 24 also promises to address community feedback, focusing on balance, fairness, and reducing the emphasis on microtransactions.

            On the technical side, FIFA 24 showcases EA Sports\' commitment to delivering a top-tier gaming experience. The attention to detail in gameplay mechanics, the AI\'s adaptability, and the seamless online play are testaments to the developers\' skills and dedication. The game\'s engine ensures smooth performance across a variety of platforms, maintaining high fidelity in visuals and gameplay.

            FIFA 24 is more than just a game; it\'s a celebration of football culture. It captures the passion, the intensity, and the beauty of the sport in a way that few other experiences can. Whether you\'re playing a quick match with friends, leading your team to glory in career mode, or building your dream squad in Ultimate Team, FIFA 24 offers something for every football fan.

            As developers, we can admire the complexity and precision required to bring FIFA 24 to life. The integration of cutting-edge technology with detailed game design creates a rich, immersive experience that pushes the boundaries of sports simulation. It\'s a testament to the power of innovation and the endless pursuit of perfection in game development.',
//15
            'Build your very own PC empire, from simple diagnosis and repairs to bespoke, boutique creations that would be the envy of any enthusiast. With an ever-expanding marketplace full of real-world components you can finally stop dreaming of that ultimate PC and get out there, build it and see how it benchmarks in 3DMark!

            PC Building Simulator has already enjoyed viral success with over 650,000+ downloads of its pre-alpha demo and has now been lovingly developed into a fully-fledged simulation to allow you to build the PC of your dreams.



            Take charge of IT support for Irratech Corp in the IT Expansion which features over 20 hours of additional story content, included in PC Building Simulator completely for free.





            The career mode in PC Building Simulator puts you in charge of your very own PC building and repair business. From your own cozy workshop, you must use all your technical skills to complete the various jobs that come your way.
            Customers will provide you with a range of jobs from simple upgrades and repairs to full system builds which you must complete while balancing your books to ensure you are still making a profit!





            PC Building Simulator will allow you to experiment with a large selection of accurately modelled, fully licensed parts from your favourite real-world manufacturers.
            If money was no object, what would you build?

            Build your PC from the case up with your favourite parts and express your building flair by choosing your favourite LED and cabling colors to really make it stand out. Choose from a range of air and water cooling solutions to keep it cool or even go all out with fully customizable water cooling loops! Once your rig is ready to go, turn it on and see how it benchmarks. Not happy with the results? Jump into the bios and try your hand at overclocking to see if you can get better results without breaking anything!





            Does building your own PC seem like an impossible task?
            PC Building Simulator aims to teach even the most novice PC user how their machine is put together with step-by-step instructions explaining the order parts should be assembled and providing useful information on what each part is and its function.',
//16
            'Prepare for the award-winning RPG experience in this definitive edition of Persona 5 Royal, featuring a treasure trove of downloadable content included!



            Forced to transfer to a high school in Tokyo, the protagonist has a strange dream. “You truly are a prisoner of fate. In the near future, ruin awaits you.” With the goal of “rehabilitation” looming overhead, he must save others from distorted desires by donning the mask of a Phantom Thief.



            Key Features:

                Explore Tokyo, unlock Personas, customize your own personal Thieves Den, experience alternate endings, and more
                Become the ultimate Phantom Thief and defy conventions, discover the power within, and fight for justice in the definitive version of Persona 5 Royal
                Includes over 40 items of previously released downloadable content
                Choose between Japanese and English VO',
//17
            'fa tutto il front-end',
//18
            'PLAY ROCKET LEAGUE FOR FREE!
            Download and compete in the high-octane hybrid of arcade-style soccer and vehicular mayhem! customize your car, hit the field, and compete in one of the most critically acclaimed sports games of all time! Download and take your shot!
            Hit the field by yourself or with friends in 1v1, 2v2, and 3v3 Online Modes, or enjoy Extra Modes like Rumble, Snow Day, or Hoops. Unlock items in Rocket Pass, climb the Competitive Ranks, compete in Competitive Tournaments, complete Challenges, enjoy cross-platform progression and more! The field is waiting. Take your shot!
            New Challenges
            Complete Weekly and season-long Challenges to unlock customization items for free!
            Tournaments
            Feel the competitive energy! Join free Tournaments and compete all season against teams at your Rank! Win and earn new rewards!
            In-Game Events and Limited Time Modes
            From Haunted Hallows to Frosty Fest, enjoy limited time events that feature festive in-game items that can be unlocked by playing online! Keep on the lookout for Limited Time Modes and arenas.
            Cross-Platform Progression
            Share your Rocket League Inventory, Competitive Rank, and Rocket Pass Tier on any connected platform!
            Item Shop & Blueprints
            Make your car your own with nearly endless customization possibilities! Get in-game items for completing challenges, browse the Item Shop, or build Blueprints for premium content for your car.',
//19
            'For over two decades, Counter-Strike has offered an elite competitive experience, one shaped by millions of players from across the globe. And now the next chapter in the CS story is about to begin. This is Counter-Strike 2.

            A free upgrade to CS:GO, Counter-Strike 2 marks the largest technical leap in Counter-Strike’s history. Built on the Source 2 engine, Counter-Strike 2 is modernized with realistic physically-based rendering, state of the art networking, and upgraded Community Workshop tools.

            In addition to the classic objective-focused gameplay that Counter-Strike pioneered in 1999, Counter-Strike 2 features:

                All-new CS Ratings with the updated Premier mode
                Global and Regional leaderboards
                Upgraded and overhauled maps
                Game-changing dynamic smoke grenades
                Tick-rate-independent gameplay
                Redesigned visual effects and audio
                All items from CS:GO moving forward to CS2',
//20
            'Your Ultimate Horizon Adventure awaits! Explore the vibrant and ever-evolving open world landscapes of Mexico with limitless, fun driving action in hundreds of the world’s greatest cars.

            This is Your Horizon Adventure
            Lead breathtaking expeditions across the vibrant and ever-evolving open world landscapes of Mexico with limitless, fun driving action in hundreds of the world’s greatest cars.

            This is a Diverse Open World
            Explore a world of striking contrast and beauty. Discover living deserts, lush jungles, historic cities, hidden ruins, pristine beaches, vast canyons and a towering snow-capped volcano.

            This is an Adventurous Open World
            Immerse yourself in a deep campaign with hundreds of challenges that reward you for engaging in the activities you love. Meet new characters and choose the outcomes of their Horizon Story missions.

            This is an Evolving Open World
            Take on awe-inspiring weather events such as towering dust storms and intense tropical storms as Mexico’s unique, dynamic seasons change the world every week. Keep coming back for new events, challenges, collectibles, and rewards, and new areas to explore. No two seasons will ever be the same.

            This is a Social Open World
            Team up with other players and enter the Horizon Arcade for a continuing series of fun, over-the-top challenges that keep you and your friends in the action and having fun with no menus, loading screens or lobbies. Meet new friends in Horizon Open and Tours and share your creations with new community gift sharing.

            This is Your Open World
            Create your own expressions of fun with the powerful new EventLab gameplay toolset including custom races, challenges, stunts, and entirely new game modes. Customize your cars in more ways than ever before with new options such as the ability open and close convertible tops, paint brake calipers, and more. Use the new Gift Drops feature to share your custom creations with the community.

            Begin Your Horizon Adventure today! ',
//21
            'Set in the zombie apocalypse, Left 4 Dead 2 (L4D2) is the highly anticipated sequel to the award-winning Left 4 Dead, the #1 co-op game of 2008.
            This co-operative action horror FPS takes you and your friends through the cities, swamps and cemeteries of the Deep South, from Savannah to New Orleans across five expansive campaigns.
            You\'ll play as one of four new survivors armed with a wide and devastating array of classic and upgraded weapons. In addition to firearms, you\'ll also get a chance to take out some aggression on infected with a variety of carnage-creating melee weapons, from chainsaws to axes and even the deadly frying pan.
            You\'ll be putting these weapons to the test against (or playing as in Versus) three horrific and formidable new Special Infected. You\'ll also encounter five new uncommon common infected, including the terrifying Mudmen.
            Helping to take L4D\'s frantic, action-packed gameplay to the next level is AI Director 2.0. This improved Director has the ability to procedurally change the weather you\'ll fight through and the pathways you\'ll take, in addition to tailoring the enemy population, effects, and sounds to match your performance. L4D2 promises a satisfying and uniquely challenging experience every time the game is played, custom-fitted to your style of play.

                Next generation co-op action gaming from the makers of Half-Life, Portal, Team Fortress and Counter-Strike.
                Over 20 new weapons & items headlined by over 10 melee weapons – axe, chainsaw, frying pan, baseball bat – allow you to get up close with the zombies
                New survivors. New Story. New dialogue.
                Five expansive campaigns for co-operative, Versus and Survival game modes.
                An all new multiplayer mode.
                Uncommon common infected. Each of the five new campaigns contains at least one new uncommon common zombies which are exclusive to that campaign.
                AI Director 2.0: Advanced technology dubbed The AI Director drove L4D\'s unique gameplay – customizing enemy population, effects, and music, based upon the players’ performance. L4D 2 features The AI Director 2.0 which expands the Director’s ability to customize level layout, world objects, weather, and lighting to reflect different times of day.
                Stats, rankings, and awards system drives collaborative play',
//22
            'HITMAN 3: Seven Deadly Sins takes you deep into the mind of Agent 47. Get exclusive sin-themed suits and take on brand new challenges to unlock unique rewards. Can you resist all seven sins?

            Seven Deadly Sins is a 7-part expansion for HITMAN 3 that will be released over time. Each of the seven content packs introduces a new contract, unique suit and sin-themed item that can be used across the World of Assassination.

            This pack includes access to all seven content packs, as they become available. ',
//23
            'GTA VI',
//24
            'Notes:

            Items contained in this set can be purchased individually. Please take care to avoid duplicate purchases.
            Please update Resident Evil 4 to the latest patch before playing Separate Ways or using the Extra DLC Pack.

            Resident Evil 4 Gold Edition includes Resident Evil 4 and two additional items of content: Separate Ways, where you experience the story through Ada Wong\'s perspective, and the Extra DLC Pack, which contains additional character outfits as well as useful weapons and items.

            Resident Evil 4:
            6 years have passed since the biological disaster in Raccoon City. Leon S. Kennedy tracks the president\'s missing daughter to a secluded European village, where there is something terribly wrong with the villagers.

            Featuring modernized gameplay, a reimagined storyline, and vividly detailed graphics, Resident Evil 4 marks the rebirth of an industry juggernaut. Relive the nightmare that revolutionized survival horror.

            Separate Ways:
            Play as Ada Wong in this additional scenario, filling in unanswered questions posed in the main story. With her mission to retrieve the Amber looming over her, which path will she choose?

            Extra DLC Pack:

            Leon & Ashley Costumes: \'Casual\'
            Leon & Ashley Costumes: \'Romantic\'
            Leon Costume & Filter: \'Hero\'
            Leon Costume & Filter: \'Villain\'
            Leon Accessory: \'Sunglasses (Sporty)\'
            Deluxe Weapon: \'Sentinel Nine\'
            Deluxe Weapon: \'Skull Shaker\'
            \'Original Ver.\' Soundtrack Swap
            Treasure Map: Expansion
            About This Game
            Survival is just the beginning.

            Six years have passed since the biological disaster in Raccoon City.
            Agent Leon S. Kennedy, one of the survivors of the incident, has been sent to rescue the president\'s kidnapped daughter.
            He tracks her to a secluded European village, where there is something terribly wrong with the locals.
            And the curtain rises on this story of daring rescue and grueling horror where life and death, terror and catharsis intersect.

            Featuring modernized gameplay, a reimagined storyline, and vividly detailed graphics,
            Resident Evil 4 marks the rebirth of an industry juggernaut.

            Relive the nightmare that revolutionized survival horror.',
//25
            'It\’s In Our Blood!
            Discover a reborn Mortal Kombat™ Universe created by the Fire God Liu Kang.
            New Origins
            Reflecting Fire God Liu Kang\’s vision of perfection, Mortal Kombat 1\’s brand new universe is familiar, yet radically altered.
            Invasions
            Invasions is a dynamic single player campaign with a variety of distinct challenges. With built in progression and RPG mechanics, mixed with MK1\’s incredible fighting action, Invasions provides deep, and engaging challenges, and a ton of rewards along the way.
            Kameos
            Kameos dramatically enhance every fight, assisting teammates with their own Special Moves, Throws and defensive Breakers.',
//26
            'America, 1899.

            Arthur Morgan and the Van der Linde gang are outlaws on the run. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty to the gang who raised him.

            Now featuring additional Story Mode content and a fully-featured Photo Mode, Red Dead Redemption 2 also includes free access to the shared living world of Red Dead Online, where players take on an array of roles to carve their own unique path on the frontier as they track wanted criminals as a Bounty Hunter, create a business as a Trader, unearth exotic treasures as a Collector or run an underground distillery as a Moonshiner and much more.

            With all new graphical and technical enhancements for deeper immersion, Red Dead Redemption 2 for PC takes full advantage of the power of the PC to bring every corner of this massive, rich and detailed world to life including increased draw distances; higher quality global illumination and ambient occlusion for improved day and night lighting; improved reflections and deeper, higher resolution shadows at all distances; tessellated tree textures and improved grass and fur textures for added realism in every plant and animal.

            Red Dead Redemption 2 for PC also offers HDR support, the ability to run high-end display setups with 4K resolution and beyond, multi-monitor configurations, widescreen configurations, faster frame rates and more.',
            //27
            'Enter the Norse realm
            His vengeance against the Gods of Olympus years behind him, Kratos now lives as a man in the realm of Norse Gods and monsters. It is in this harsh, unforgiving world that he must fight to survive… and teach his son to do the same.

            Grasp a second chance
            Kratos is a father again. As mentor and protector to Atreus, a son determined to earn his respect, he is forced to deal with and control the rage that has long defined him while out in a very dangerous world with his son.

            Journey to a dark, elemental world of fearsome creatures
            From the marble and columns of ornate Olympus to the gritty forests, mountains and caves of pre-Viking Norse lore, this is a distinctly new realm with its own pantheon of creatures, monsters and gods.

            Engage in visceral, physical combat
            With an over the shoulder camera that brings the player closer to the action than ever before, fights in God of War™ mirror the pantheon of Norse creatures Kratos will face: grand, gritty and grueling. A new main weapon and new abilities retain the defining spirit of the God of War series while presenting a vision of conflict that forges new ground in the genre.
            PC FEATURES

            High Fidelity Graphics
            Striking visuals enhanced on PC. Enjoy true 4K resolution, on supported devices, [MU1] with unlocked framerates for peak performance. Dial in your settings via a wide range of graphical presets and options including higher resolution shadows, improved screen space reflections, the addition of GTAO and SSDO, and much more.

            NVIDIA® DLSS and Reflex Support
            Quality meets performance. Harness the AI power of NVIDIA Deep Learning Super Sampling (DLSS) to boost frame rates and generate beautiful, sharp images on select Nvidia GPUs. Utilize NVIDIA Reflex low latency technology allowing you to react quicker and hit harder combos with the responsive gameplay you crave on GeForce GPUs.

            Controls Customization
            Play your way. With support for the DUALSHOCK®4 and DUALSENSE® wireless controllers, a wide range of other gamepads, and fully customizable bindings for mouse and keyboard, you have the power to fine-tune every action to match your playstyle.

            Ultra-wide Support
            Immerse yourself like never before. Journey through the Norse realms taking in breathtaking vistas in panoramic widescreen. With 21:9 ultra-widescreen support, God of War™ presents a cinema quality experience that further expands the original seamless theatrical vision.
            Mature Content Description

            The developers describe the content like this:

            Gameplay consists of frequent combat scenarios with characters punching and kicking or using their axe to slash/stab/impale enemies. Some larger enemies are opened up to intense finishing moves showing enemies being ripped apart, dismembered, or decapitated.

            Strong Language is used in the dialogue.',
//28
            'Technical Test Server



            This is the Technical Test Server client for Tom Clancy\'s Rainbow Six Siege. This platform will be used to test new features in a controlled environment that allows the development team to iterate without impacting the live game.

            Please note :
            - The T.T.S. client is built off of several different builds at various stages of development, and may not represent the overall quality of the game.
            - Features seen on the T.T.S. might never make it in the final game: various components are still in conceptual stages and might be discarded throughout the development process. Certain ideas that were postponed or cancelled might also be found in the T.T.S. as a result.
            - You need to own a version of the game (Standard, Gold, Complete or Starter Edition) to unlock this product
            - The TTS will only function during specific timeframes.
            About This Game
            “One of the best first-person shooters ever made. 10/10” – GameSpot

            Tom Clancy\'s Rainbow Six® Siege is an elite, realistic, tactical team-based shooter where superior planning and execution triumph. It features 5v5 attack vs. defense gameplay and intense close-quarters combat in destructible environments.


            Engage in a brand-new style of assault using an unrivaled level of destruction and gadgetry.
            On defense, coordinate with your team to transform your environments into strongholds. Trap, fortify and create defensive systems to prevent being breached by the enemy.
            On attack, lead your team through narrow corridors, barricaded doorways and reinforced walls. Combine tactical maps, observation drones, rappelling and more to plan, attack and defuse every situation.


            Choose from dozens of highly trained, Special Forces operators from around the world. Deploy the latest technology to track enemy movement. Shatter walls to open new lines of fire. Breach ceilings and floors to create new access points. Employ every weapon and gadget from your deadly arsenal to locate, manipulate and destroy your enemies and the environment around them.


            Experience new strategies and tactics as Rainbow Six Siege evolves over time. Change the rules of Siege with every update that includes new operators, weapons, gadgets and maps. Evolve alongside the ever-changing landscape with your friends and become the most experienced and dangerous operators out there.


            Compete against others from around the world in ranked match play. Grab your best squad and join the competitive community in weekly tournaments or watch the best professional teams battle it out in the Rainbow Six Siege Pro League.',
//29
            'Dead Space Digital Deluxe Edition

            The Dead Space Digital Deluxe Edition includes the base game and 5 exclusive cosmetics (3 Unique Suits and 2 Suit Textures). It’s everything you need to look your best while surviving the horrors aboard the USG Ishimura.

            READ MORE
            About This Game
            The sci-fi survival-horror classic Dead Space™ returns, completely rebuilt from the ground up to offer a deeper, more immersive experience. This remake brings jaw-dropping visual fidelity, suspenseful atmospheric audio, and improvements to gameplay while staying faithful to the original game’s thrilling vision.

            Isaac Clarke is an everyman engineer on a mission to repair a vast mining ship, the USG Ishimura, only to discover something has gone horribly wrong. The ship\'s crew has been slaughtered and Isaac’s beloved partner, Nicole, is lost somewhere on board.

            Now alone and armed with only his engineering tools and skills, Isaac races to find Nicole as the nightmarish mystery of what happened aboard the Ishimura unravels around him. Trapped with hostile creatures called Necromorphs, Isaac faces a battle for survival, not only against the escalating terrors of the ship but against his own crumbling sanity.

            IMMERSE YOURSELF IN NEXT-GEN SCI-FI HORROR



            A sci-fi horror classic returns fully rebuilt from the ground up with elevated visual fidelity and 3D atmospheric audio. From the frighteningly detailed rooms and workspaces of a slaughtered crew to the eerie atmospheric sounds of a desolate spaceship, you’ll explore a stunning sci-fi setting full of unpredictable and tense moments without interruption.

            UNRAVEL THE MYSTERY ABOARD THE USG ISHIMURA



            What starts as a routine repair mission for engineer Isaac Clarke and the crew of the USG Kellion quickly turns into a battle for survival as the truth behind the horrors onboard begins to unravel. Following an expanded narrative experience, uncover the dark secrets behind the events aboard the USG Ishimura through the final logs of the ill-fated crew and your encounters with the few survivors that remain.

            IMPROVISE TO SURVIVE



            Confront the nightmare aboard the USG Ishimura with genre-defining strategic gameplay. Repurpose and upgrade Isaac’s engineering tools to creatively defeat enemies with precision.',
//30
            'The world is a vast, beautiful, and dangerous place – especially when you have been shrunk to the size of an ant. Explore, build and survive together in this first-person, multiplayer, survival adventure. Can you thrive alongside the hordes of giant insects, fighting to survive the perils of the backyard?


            Uncover the mysteries while playing through the story!

            How did you wind up so small? Who did this to you? How do you go home? These are all answers you will uncover as you play through the story.


            Solo or with friends – anytime!

            You can face the backyard alone or together, online, with up to three friends. Not only that, but with the Shared Worlds feature, you can continue to play in your shared world even if the original host is not on, with all your progression saving!


            Nowhere is safe – not even your base!

            Creatures can be found roaming the yard in a multitude of environments, such as the depths of the pond, the caverns of the termite den, and even the sweltering heat found in the sandbox. You can even attract them to different places in the yard by activating the MIX.R devices. However, the more you interfere with the creatures in the yard, the higher the chance that they come knocking at your own door, so you better prepare.


            Play true to your playstyle!

            Use the in-game customization systems such as Mutations and Milk Molars to activate the bonuses and perks you want for your character. Not only that, but craft and upgrade your armor and weapons to give your character the stats and advantages you need in order to take on the perils of the backyard.


            It’s time to go big, or never go home!',
//31
            'Cyberpunk 2077 is an open-world, action-adventure RPG set in the megalopolis of Night City, where you play as a cyberpunk mercenary wrapped up in a do-or-die fight for survival. Improved and featuring all-new free additional content, customize your character and playstyle as you take on jobs, build a reputation, and unlock upgrades. The relationships you forge and the choices you make will shape the story and the world around you. Legends are made here. What will yours be?



            IMMERSE YOURSELF WITH UPDATE 2.1
            Night City feels more alive than ever with the free Update 2.1! Take a ride on the fully functional NCART metro system, listen to music as you explore the city with the Radioport, hang out with your partner in V’s apartment, compete in replayable races, ride new vehicles, enjoy improved bike combat and handling, discover hiddens secrets and much, much more!



            CREATE YOUR OWN CYBERPUNK
            Become an urban outlaw equipped with cybernetic enhancements and build your legend on the streets of Night City.



            EXPLORE THE CITY OF THE FUTURE
            Night City is packed to the brim with things to do, places to see, and people to meet. And it’s up to you where to go, when to go, and how to get there.



            BUILD YOUR LEGEND
            Go on daring adventures and build relationships with unforgettable characters whose fates are shaped by the choices you make.




            EQUIPPED WITH IMPROVEMENTS
            Experience Cyberpunk 2077 with a host of changes and improvements to gameplay and economy, the city, map usage, and more.



            CLAIM EXCLUSIVE ITEMS
            Claim in-game swag & digital goodies inspired by CD PROJEKT RED games as part of the My Rewards program.',
//32
            'The Sea of Thieves: 2024 Premium Edition contains the full game, the Dark Warsmith Ship Set (with Collector\'s Figurehead and Sails), Dark Warsmith Costume, Diabolical Dog, Ocean Crawler cosmetics, Collector\'s Thunderous Fury Figurehead and Sails, the Shrouded Ghost Hunter Blunderbuss, 10,000 Gold and access to digital bonus content.



            The Sea of Thieves: 2024 Deluxe Edition contains the full game, Ocean Crawler cosmetics, Collector\'s Thunderous Fury Figurehead and Sails, the Shrouded Ghost Hunter Blunderbuss, 10,000 Gold and access to digital bonus content.

            About This Game
            Sea of Thieves is a smash-hit pirate adventure game, offering the quintessential pirate experience of plundering lost treasures, intense battles, vanquishing sea monsters and more.

            Additional digital bonuses* include access to the Sea of Thieves Original Soundtrack – 2024 Edition, the Sea of Thieves: Athena\'s Fortune audiobook and The Rough Guide to Sea of Thieves eBook.

            * Available to download from www.seaofthieves.com/bonuses (website login required) or via Steam.',
//33
            'This Game of the Year Edition now includes bonus content*:

            - Reflection and Gauntlet of Strength - new boss challenge modes
            - Remnants - leave messages and recordings of your actions that other players can view and rate
            - 3 unlockable cosmetic skins

            Game of the Year - The Game Awards 2019
            Best Action Game of 2019 - IGN
            Over 50 awards and nominations

            Carve your own clever path to vengeance in the critically acclaimed adventure from developer FromSoftware, creators of the Dark Souls series.

            In Sekiro™: Shadows Die Twice you are the \'one-armed wolf\', a disgraced and disfigured warrior rescued from the brink of death. Bound to protect a young lord who is the descendant of an ancient bloodline, you become the target of many vicious enemies, including the dangerous Ashina clan. When the young lord is captured, nothing will stop you on a perilous quest to regain your honor, not even death itself.

            Explore late 1500s Sengoku Japan, a brutal period of constant life and death conflict, as you come face to face with larger than life foes in a dark and twisted world. Unleash an arsenal of deadly prosthetic tools and powerful ninja abilities while you blend stealth, vertical traversal, and visceral head to head combat in a bloody confrontation.

            Take Revenge. Restore Your Honor. Kill Ingeniously.

            *Download required.

            Internet connection required for asynchronous Multiplayer.',
//34
            'Rise to the challenge and join the hunt! In Monster Hunter Rise, the latest installment in the award-winning and top-selling Monster Hunter series, you’ll become a hunter, explore brand new maps and use a variety of weapons to take down fearsome monsters as part of an all-new storyline. The PC release also comes packed with a number of additional visual and performance enhancing optimizations.


            Ferocious monsters with unique ecologies
            Hunt down a plethora of monsters with distinct behaviors and deadly ferocity. From classic returning monsters to all-new creatures inspired by Japanese folklore, including the flagship wyvern Magnamalo, you’ll need to think on your feet and master their unique tendencies if you hope to reap any of the rewards!


            Choose your weapon and show your skills
            Wield 14 different weapon types that offer unique gameplay styles, both up-close and from long range. Charge up and hit hard with the devastating Great Sword; dispatch monsters in style using the elegant Long Sword; become a deadly maelstrom of blades with the speedy Dual Blades; charge forth with the punishing Lance; or take aim from a distance with the Bow and Bowguns. These are just a few of the weapon types available in the game, meaning you’re sure to find the play style that suits you best.


            Hunt, gather and craft your way to the top of the food chain
            Each monster you hunt will provide materials that allow you to craft new weapons and armor and upgrade your existing gear. Go back out on the field and hunt even fiercer monsters and earn even better rewards! You can change your weapon at any of the Equipment Boxes any time, so the possibilities are limitless!


            Hunt solo or team up to take monsters down
            The Hunter Hub offers multiplayer quests where up to four players can team up to take on targets together. Difficulty scaling ensures that whether you go solo or hit the hunt as a full four-person squad, it’s always a fair fight.


            Stunning visuals, unlocked framerate and other PC optimizations
            Enjoy beautiful graphics at up 4K resolution, HDR with support for features including ultrawide monitors and an unlocked frame rate make to make this a truly immersive monster-hunting experience. Hunters will also get immediate access to a number of free title updates that include new monsters, quests, gear and more.


            Enjoy an exciting new storyline set in Kamura Village
            This serene locale is inhabited by a colorful cast of villagers who have long lived in fear of the Rampage - a catastrophic event where countless monsters attack the village all at once. 50 years after the last Rampage, you must work together with the villagers to face this trial.


            Experience new hunting actions with the Wirebug
            Wirebugs are an integral part of your hunter’s toolkit. The special silk they shoot out can be used to zip up walls and across maps, and can even be used to pull off special attacks unique to each of the 14 weapon types in the game.


            Buddies are here to help
            The Palico Felyne friends you already know and love from previous Monster Hunter adventures are joined by the brand new Palamute Canyne companions!


            Wreak havoc by controlling monsters
            Control raging monsters using Wyvern Riding and dish out massive damage to your targets!


            Fend off hordes of monsters in The Rampage
            Protect Kamura Village from hordes of monsters in an all-new quest type! Prepare for monster hunting on a scale like never before!',
//35
            'Become Eivor, a legendary Viking raider on a quest for glory.

            - Lead epic Viking raids against Saxon troops and fortresses.
            - Relive the visceral fighting style of the Vikings as you dual-wield powerful weapons.
            - Challenge yourself with the most varied collection of enemies ever in Assassin\'s Creed.
            - Shape the growth of your character and your clan\'s settlement with every choice you make.
            - Explore a Dark Age open world, from the harsh shores of Norway to the beautiful kingdoms of England.

            Includes the Forgotten Saga, a FREE new rogue-lite game mode for all Assassin\'s Creed® Valhalla players.',
//36
            'Digital Deluxe Edition

            Digital Premium Edition

            About This Game
            Step into the shoes of a transfer student thrust into an unexpected fate when entering the hour "hidden" between one day and the next. Awaken an incredible power and chase the mysteries of the Dark Hour, fight for your friends, and leave a mark on their memories forever.

            Persona 3 Reload is a captivating reimagining of the genre-defining RPG, reborn for the modern era.

            Key Features:
            - Experience the pivotal game of the Persona series faithfully remade with cutting-edge graphics, modernized quality-of-life features, and signature stylish UI.

            -Fully immerse yourself in an emotional, gripping journey with new scenes, character interactions, and additional voiceover.

            - Choose how to meaningfully spend each day through various activities, from exploring the Port Island to forging genuine bonds with beloved characters.

            - Build and command your optimal team to take down otherworldly Shadows and climb closer to the truth.

            ---
            Persona 3 Reload Digital Deluxe Edition includes:

                Base Game
                Digital Artbook: Filled with 64 pages of character art, concept art, backgrounds and other illustrations from the game!
                Digital Soundtrack: Listen to newly arranged tracks from the original Persona 3 plus all-new tracks from Persona 3 Reload, presented by the Atlus sound team for a total of 60 new songs.


            ---
            Persona 3 Reload Digital Premium Edition includes:

                Base Game
                Digital Artbook
                Digital Soundtrack
                Persona 3 Reload DLC Pack: P5R Phantom Thieves Costume Set, P5R Shujin Academy Costume Set, P5R Persona Set 1, P5R Persona Set 2 , P5R BGM Set, P4G Yasogami High Costume Set, P4G Persona Set',
//37
            'About This Game


            Join Aloy as she braves a majestic but dangerous new frontier that holds mysterious new threats. This Complete Edition allows you to enjoy the critically acclaimed Horizon Forbidden West on PC in its entirety with bonus content, including the Burning Shores story expansion that picks up after the main game.

            Explore distant lands, fight bigger and more awe-inspiring machines, and encounter astonishing new tribes as you return to the far-future, post-apocalyptic world of Horizon.

            The land is dying. Vicious storms and an unstoppable blight ravage the scattered remnants of humanity while fearsome new machines prowl their borders, and life on Earth is hurtling toward another extinction.

            It\'s up to Aloy to uncover the secrets behind these threats and restore order and balance to the world. Along the way, she must reunite with old friends, forge alliances with warring new factions and unravel the legacy of the ancient past.

                See every gameplay detail with Ultrawide 21:9 and Super Ultrawide 32:9 resolutions, as well as 48:9 triple monitor support.*
                Witness the Forbidden West coming to life, with NVIDIA DLSS 3 upscaling and frame generation, image enhancing NVIDIA DLAA and latency reducing NVIDIA Reflex. AMD FSR and Intel XeSS are also supported.**
                Customize graphic settings to your preference, with the potential for unlocked frame rates.**
                Take control with full support for the DualSense™ controller, including haptic feedback and adaptive trigger functionality.***


            * Compatible PC and 4K display device required.
            ** Compatible PC required.
            *** Wired connection required to experience the full range of in-game controller features.',
//38
            'Gather your party and return to the Forgotten Realms in a tale of fellowship and betrayal, sacrifice and survival, and the lure of absolute power.

            Mysterious abilities are awakening inside you, drawn from a mind flayer parasite planted in your brain. Resist, and turn darkness against itself. Or embrace corruption, and become ultimate evil.

            From the creators of Divinity: Original Sin 2 comes a next-generation RPG, set in the world of Dungeons & Dragons.





            Choose from 12 classes and 11 races from the D&D Player\'s Handbook and create your own identity, or play as an Origin hero with a hand-crafted background. Or tangle with your inner corruption as the Dark Urge, a fully customisable Origin hero with its own unique mechanics and story. Whoever you choose to be, adventure, loot, battle and romance your way across the Forgotten Realms and beyond. Gather your party. Take the adventure online as a party of up to four.



            Abducted, infected, lost. You are turning into a monster, but as the corruption inside you grows, so does your power. That power may help you to survive, but there will be a price to pay, and more than any ability, the bonds of trust that you build within your party could be your greatest strength. Caught in a conflict between devils, deities, and sinister otherworldly forces, you will determine the fate of the Forgotten Realms together.




            Forged with the new Divinity 4.0 engine, Baldur’s Gate 3 gives you unprecedented freedom to explore, experiment, and interact with a thriving world filled with characters, dangers, and deceit. A grand, cinematic narrative brings you closer to your characters than ever before. From shadow-cursed forests, to the magical caverns of the Underdark, to the sprawling city of Baldur’s Gate itself, your actions define the adventure, but your choices define your legacy. You will be remembered.



            The Forgotten Realms are a vast, detailed, and diverse world, and there are secrets to be discovered all around you – verticality is a vital part of exploration. Sneak, dip, shove, climb, and jump as you journey from the depths of the Underdark to the glittering rooftops of Baldur’s Gate. Every choice you make drives your story forward, each decision leaving your mark on the world. Define your legacy, nurture relationships and create enemies, and solve problems your way. No two playthroughs will ever be the same.


                allows you to combine your forces in combat and simultaneously attack enemies, or split your party to each follow your own quests and agendas. Concoct the perfect plan together… or introduce an element of chaos when your friends least expect it. Relationships are complicated. Especially when you’ve got a parasite in your brain.



                7 unique Origin heroes offer a hand-crafted experience, each with their own unique traits, agenda, and outlook on the world. Their stories intersect with the overarching narrative, and your choices will determine whether those stories end in redemption, salvation, domination, or one of many other outcomes. Play as an Origin and enjoy their stories, or recruit them to fight alongside you.



                based on the D&D 5e ruleset. Team-based initiative, advantage and disadvantage, and roll modifiers join an advanced AI, expanded environmental interactions, and a new fluidity in combat that rewards strategy and foresight. Three difficulty settings allow you to customise the challenge of combat. Enable weighted dice to help sway the battle, or play on Tactician mode for a hardcore experience.



                featuring 31 subraces on top of the 11 races (Human, Githyanki, Half-Orc, Dwarf, Elf, Drow, Tiefling, Halfling, Half Elf, Gnome, Dragonborn), with 46 subclasses branching out of the 12 classes. Over 600 spells and actions offer near-limitless freedom of interactivity in a hand-crafted world where exploration is rewarded, and player agency defines the journey. Our unique Character Creator features unprecedented depth of character, with reactivity that ensures whomever you are, you will leave a unique legacy behind you, all the way up to Level 12. Over 174 hours of cinematics ensure that no matter the choices you make, the cinematic experience follows your journey – every playthrough, a new cinematic journey.



                With the looming threat of war heading to Baldur’s Gate, and a mind flayer invasion on the horizon, friendships – though not necessary – are bound to be forged on your journey. What becomes of them is up to you, as you enter real, vibrant relationships with those you meet along the way. Each companion has their own moral compass and will react to the choices you make throughout your journey. At what cost will you stick to your ideals? Will you allow love to shape your actions? The relationships made on the road to Baldur’s Gate act as moments of respite at camp as much as they add weight to the many decisions you make on your adventure.



                so that when you hit ‘go live’, your stream isn’t interrupted by a bear, swear, or lack of underwear. Baldur’s Gate 3 has 3 different levels of streamer-friendly customisation. You can disable nudity and explicit content separately (or together), and you can enable Twitch integration to interact directly with your audience, just as we do at our Panel From Hell showcases! You’ll be able to stream Baldur’s Gate 3 without any problems, regardless of how you play, thanks to these options.',
//39
            'Purchase now and get the following bonus content for the expansion:

                ELDEN RING Shadow of the Erdtree Bonus Gesture

            This is a Gesture that can be used in-game for Shadow of the Erdtree content.

            *Bonus content will be available in-game when the expansion releases.
            *The player can also unlock this later in the expansion.

            ELDEN RING Shadow of the Erdtree Edition



            ELDEN RING Shadow of the Erdtree Edition includes:

                ELDEN RING
                ELDEN RING Shadow of the Erdtree expansion


            *Shadow of the Erdtree content will be available when the expansion releases.

            ELDEN RING Shadow of the Erdtree Deluxe Edition



            ELDEN RING Shadow of the Erdtree Deluxe Edition includes:

                ELDEN RING
                ELDEN RING Shadow of the Erdtree expansion
                ELDEN RING Digital Artbook & Original Soundtrack
                ELDEN RING Shadow of the Erdtree Artbook & Soundtrack


            *Shadow of the Erdtree content will be available when the expansion releases.

            About This Game


            THE NEW FANTASY ACTION RPG.
            Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.
            • A Vast World Full of Excitement
            A vast world where open fields with a variety of situations and huge dungeons with complex and three-dimensional designs are seamlessly connected. As you explore, the joy of discovering unknown and overwhelming threats await you, leading to a high sense of accomplishment.
            • Create your Own Character
            In addition to customizing the appearance of your character, you can freely combine the weapons, armor, and magic that you equip. You can develop your character according to your play style, such as increasing your muscle strength to become a strong warrior, or mastering magic.
            • An Epic Drama Born from a Myth
            A multilayered story told in fragments. An epic drama in which the various thoughts of the characters intersect in the Lands Between.
            • Unique Online Play that Loosely Connects You to Others
            In addition to multiplayer, where you can directly connect with other players and travel together, the game supports a unique asynchronous online element that allows you to feel the presence of others.',

//40

            'PLACEHOLDER'

        ];
        $base_price = [
            9.99,
            49.99,
            29.99,
            33.99,
            9.75,
            0.00,
            59.99,
            39.99,
            29.98,
            39.99,
            79.99,
            69.420,
            0.00,
            69.99,
            19.99,
            59.99,
            369.99,
            0.00,
            0.00,
            29.99,
            9.75,
            9.99,
            89.00,
            29.99,                         // Resident Evil 4
            29.99,                         // Mortal Kombat 1
            49.99,                         // Red Dead Redemption 2
            39.99,                         // God Of War
            19.99,                         // Tom Clancy's Rainbow Six Siege
            29.99,                         // Dead Space
            29.99,                         // Grounded
            59.99,                         // Cyberpunk 2077
            39.99,                         // Sea Of Thieves
            49.99,                         // Sekiro Shadows Die Twice
            59.99,                         // Monster Hunter Rise
            49.99,                         // Assassin's Creed Valhalla
            39.99,                         // Persona 3 Reload
            69.99,                         // Horizon Forbidden West
            59.99,                         // Baldur's Gate 3
            69.99,                         // Elden Ring
            9.99,                          // PLACEHOLDER DLC CB2077
        ];

        DB::table('tags')->insert([
            'id' => 104,
            'name' => 'Free To Play',
            'is_genre' => false,
            'image_id' => 1,
        ]);
        DB::table('tags')->insert([
            'id' => 105,
            'name' => 'Upcoming',
            'is_genre' => false,
            'image_id' => 1,
        ]);

        $currentDate = Carbon::now();
        for($i=0;$i<sizeof($names);$i++) // 0 ; <22
        {
            $bool = (bool)rand(0,1);
            if($base_price[$i]==0)
            {
                $bool=0;
            }

            DB::table('games')->insert([
                'name' => $names[$i],//PLACEHOLDER RNGNAME FROM ARRAY
                'date' => $dates[$i],//PLACEHOLDER RNGBD
                'base_price' => $base_price[$i], /*= mt_rand() / mt_getrandmax() * (69.99 - 1) + 1,*/
                'is_dlc' => $i === 21 ? true : false,
                'parent_id' => $i === 21 ? 3 : null,
                'is_discounted' => $bool ? true : false,
                'discounted_percentage' => $bool ? $discounted_percentage = rand(5,90) : null,//PLACEHOLDER RNG
                'discounted_price' => $bool ? number_format($base_price[$i]-($base_price[$i]*($discounted_percentage/100)), 2, '.', ''): null,
                'short_description' => $short_description[$i],
                'long_description' => $long_description[$i],
                'pegi_id' => rand(0,4),
            ]);


            if($base_price[$i]==0)
            {
                DB::table('games_tags')->insert([
                    'game_id' => $i+1,
                    'tag_id' => '104',
                ]);
            }

            if($carbonDates[$i]->isFuture())
            {
                DB::table('games_tags')->insert([
                    'game_id' => $i+1,
                    'tag_id' => '105',
                ]);
            }
        }
    }
}
