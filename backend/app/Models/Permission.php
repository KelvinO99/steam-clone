<?php

namespace App\Models;

use Laratrust\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    public $fillable = [
        "name",             // Nome del permesso (obbligatorio) -Salvo            
        "display_name",     // Nome visualizzato dagli utenti (opzionale) -Salvo
        "description",      // Descrizione del permesso (opzionale) -Salvo
    ];
}
