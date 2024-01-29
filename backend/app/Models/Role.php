<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{
    public $fillable = [
        "name",             // Nome del ruolo (obbligatorio) -Salvo
        "display_name",     // Nome visualizzato dagli utenti (opzionale) -Salvo
        "description",      // Descrizione del ruolo (opzionale) -Salvo
    ];

}
