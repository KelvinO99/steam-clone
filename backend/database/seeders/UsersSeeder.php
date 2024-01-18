<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $usernames = [
            'SteamGamer123',
            'TechNinja87',
            'QuantumExplorer',
            'CyberPioneer',
            'CodeMaverick',
            'PixelWarriorX',
            'GalacticGamer',
            'SteamEngineer42',
            'VirtualVoyager',
            'DigitalMaestro',
            'NeonNomad',
            'ByteBard',
            'CosmicCrafter',
            'EpicPilot99',
            'FuturePhoenix',
            'QuantumQuasar',
            'BinaryBuccaneer',
            'TechnoTrailblazer',
            'SyntheticSniper',
            'RocketRiderX',
            'CyberneticSpectre',
        ];
        $emails = [
            'user1@domain.com',
            'user2@domain.com',
            'user3@domain.com',
            'user4@domain.com',
            'user5@domain.com',
            'user6@domain.com',
            'user7@domain.com',
            'user8@domain.com',
            'user9@domain.com',
            'user10@domain.com',
            'user11@domain.com',
            'user12@domain.com',
            'user13@domain.com',
            'user14@domain.com',
            'user15@domain.com',
            'user16@domain.com',
            'user17@domain.com',
            'user18@domain.com',
            'user19@domain.com',
            'user20@domain.com',
            'user21@domain.com',
            'user22@domain.com',
            'user23@domain.com',
            'user24@domain.com',
            'user25@domain.com',
            'user26@domain.com',
            'user27@domain.com',
            'user28@domain.com',
            'user29@domain.com',
            'user30@domain.com',
            'user31@domain.com',
            'user32@domain.com',
            'user33@domain.com',
            'user34@domain.com',
            'user35@domain.com',
            'user36@domain.com',
            'user37@domain.com',
            'user38@domain.com',
            'user39@domain.com',
            'user40@domain.com',
            'user41@domain.com',
            'user42@domain.com',
            'user43@domain.com',
            'user44@domain.com',
            'user45@domain.com',
            'user46@domain.com',
            'user47@domain.com',
            'user48@domain.com',
            'user49@domain.com',
            'user50@domain.com',
            'user51@domain.com',
            'user52@domain.com',
            'user53@domain.com',
            'user54@domain.com',
            'user55@domain.com',
            'user56@domain.com',
            'user57@domain.com',
            'user58@domain.com',
            'user59@domain.com',
            'user60@domain.com',
            'user61@domain.com',
            'user62@domain.com',
            'user63@domain.com',
            'user64@domain.com',
            'user65@domain.com',
            'user66@domain.com',
            'user67@domain.com',
            'user68@domain.com',
            'user69@domain.com',
            'user70@domain.com',
            'user71@domain.com',
            'user72@domain.com',
            'user73@domain.com',
            'user74@domain.com',
            'user75@domain.com',
            'user76@domain.com',
            'user77@domain.com',
            'user78@domain.com',
            'user79@domain.com',
            'user80@domain.com',
            'user81@domain.com',
            'user82@domain.com',
            'user83@domain.com',
            'user84@domain.com',
            'user85@domain.com',
            'user86@domain.com',
            'user87@domain.com',
            'user88@domain.com',
            'user89@domain.com',
            'user90@domain.com',
            'user91@domain.com',
            'user92@domain.com',
            'user93@domain.com',
            'user94@domain.com',
            'user95@domain.com',
            'user96@domain.com',
            'user97@domain.com',
            'user98@domain.com',
            'user99@domain.com',
            'user100@domain.com',
        ];
        $DIM_A = count($usernames);
        $shuffledEmails = $emails;

        for ($i = 0; $i < 2; $i++) {
            $random = random_int(0, $DIM_A - 1);
            $shuffledEmails = array_values($shuffledEmails); // Reset array pointer after shuffle
            $randomEmail = $shuffledEmails[0];

            DB::table('users')->insert([
                'username' => $usernames[$random],
                'name' => "nome",
                'email' => $randomEmail,
                'password' => "password",
                'image_path' => null,
                'wallet' => "0",
            ]);
        }
    }
}
