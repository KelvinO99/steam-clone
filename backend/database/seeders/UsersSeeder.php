<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;


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
        ];

        // Assicurati che i ruoli siano già stati creati nel database
        $ruoli = Role::all();

        $DIM_A = count($usernames);
        for($i=0;$i<20;$i++)
        {
            foreach ($emails as $email) {
            // Verifica se l'email è già presente nel database
            if (DB::table('users')->where('email', $email)->exists()) {
                continue; // Salta questa email se già usata
            }
    
            // Seleziona un username casuale
            $randomUsername = $usernames[array_rand($usernames)];
    
            
                DB::table('users')->insert([
                    'username' => $randomUsername,
                    //'name' => $randomUsername,
                    'email' => $email,
                    'password' => "password",
                    'image_path' => "image_path",
                    'wallet' => "0",
                ]);
    
            // Opcional: Puoi anche rimuovere l'email dall'array se vuoi
            }
    }
}
}