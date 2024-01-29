<?php

namespace App\Models;

use app\Models\Permission;
use Laratrust\Models\Role as RoleModel;

// User, Dveloper/Publisher, SuperAdmin

$user = Role::create([
    "name" => "User",
    "display_name" => "User",
    "description"=> "Un semplice Utente",
]);

$developer = Role::create([
    "name"=> "developer/publisher",
    "display_name"=> "developer/publisher",
    "description"=> "Utente con permesso di pubblicare",
]);

$SuperAdmin = Role::create([
    "name"=> "SuperAdmin",
    "display_name" => "SuperAdmin",
    "description"=> "Un amministratore",
]);

class Role extends RoleModel
{
    public $fillable = [
        "name",             // Nome del ruolo (obbligatorio) -Salvo
        "display_name",     // Nome visualizzato dagli utenti (opzionale) -Salvo
        "description",      // Descrizione del ruolo (opzionale) -Salvo
    ];

}
