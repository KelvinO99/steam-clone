<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;


class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // 32
        $usernames = [
            'Chris',
            'Kelvin',
            'Salvo',
            'Mike',
            'Giulio',
            'Federico',
            'Dio',
            'Andrea Di Pre',
            'Ace Gamer',
            'Yotobi',
            'Raiden',
            'Midna',
            'YutuboAncheIo',
            'Me lo Scordo Domenico',
            'Francesco Di Natale',
            'Marilisa',
            'Nelluccio',
            'Maradona',
            'Treviso Scotto',
            'Il Fine Settimana',
            'Filippo',
            'Enrico',
            'Fabiano',
            '_/XXgamerXX\_',
            'EternaLoveFan69',
            'Alcoria',
            'Gricone',
            'Vitale',
            'Booleano',
            'SixNove',
            'Nicolò',
            'Ultimo',
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
        ];

        // Assicurati che i ruoli siano già stati creati nel database -Salvo
        $ruoli = Role::all();

        // Password utilizzata dal SuperAdmin -Salvo
        $password = "Password1!";

        $j=0;
        for($i=0;$i<sizeof($usernames);$i++)
        {
            foreach ($emails as $email) {
            // Verifica se l'email è già presente nel database
            if (DB::table('users')->where('email', $email)->exists()) {
                continue; // Salta questa email se già usata
            }

            $ruoliRandom = rand(1,2);

            // Seleziona un username casuale
            $randomUsername = $usernames[array_rand($usernames)];

            // Il primo utente avrà il super admin -Salvo
            if($j == 0){

                $user = User::create([
                    'username' => $usernames[$j],
                    'email' => $email,
                    'password' => Hash::make($password),
                    'country_id' => rand(1,251),
                    'language_id' => rand(1,29),
                    'description' => 'no information given',
                    'wallet' => 0,
                ]);

                // Simula il processo di autenticazione per ottenere un token JWT -Salvo
                $token = auth()->attempt(['email' => $email, 'password' => $password]);

                $user->addRole((3));
            }
            else{

                $user = User::create([
                    'username' => $usernames[$j],
                    'email' => $email,
                    'password' => 'password',
                    'country_id' => rand(1,250),
                    'language_id' => rand(1,29),
                    'description' => 'no information given',
                    'wallet' => 0,
                ]);

                // Assegna un ruolo casuale all'utente
                $user->addRole(($ruoliRandom));
            }

            $j++;

            // Opcional: Puoi anche rimuovere l'email dall'array se vuoi
            }
    }
}
}
