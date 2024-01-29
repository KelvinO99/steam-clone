<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{

    // User, Dveloper/Publisher, SuperAdmin
    public function run()
    {
        // User, Developer/Publisher, SuperAdmin

        $user = Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Un semplice Utente',
        ]);

        $developer = Role::create([
            'name' => 'developer/publisher',
            'display_name' => 'Developer/Publisher',
            'description' => 'Utente con permesso di pubblicare',
        ]);

        $superAdmin = Role::create([
            'name' => 'superadmin',
            'display_name' => 'SuperAdmin',
            'description' => 'Un amministratore',
        ]);
    }
}

