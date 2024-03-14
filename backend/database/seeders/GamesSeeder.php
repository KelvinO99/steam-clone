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
            'Tetris Effect: Connected',                //4
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
//PER IL FRONT-END CHE POTREBBE LEGGE: METTETE "ABOUT THIS GAME"
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
            369,99,
            0.00,
            0.00,
            29.99,
            9,75,
            9.99,
        ];
        for($i=0;$i<22;$i++) // 0 ; <22
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
        }
    }
}
