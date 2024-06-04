<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{

    // User, Dveloper/Publisher, SuperAdmin
    public function run()
    {
        Role::firstOrCreate(['name' => 'user'], [
            'display_name' => 'User',
            'description' => 'Un semplice Utente'
        ]);

        Role::firstOrCreate(['name' => 'developer/publisher'], [
            'display_name' => 'Developer/Publisher',
            'description' => 'Utente con permesso di pubblicare'
        ]);

        Role::firstOrCreate(['name' => 'superadmin'], [
            'display_name' => 'SuperAdmin',
            'description' => 'Un amministratore'
        ]);

    }
}

