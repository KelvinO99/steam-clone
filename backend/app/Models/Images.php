<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'user_id',
        'achievement_id',
        'image_path',
    ];

    public function Games(){

        return $this->hasOne(Games::class, 'game_id', 'id');
    }

    public function Users(){

        return $this->hasOne(User::class, 'image_id', 'id');
    }

    public function Achievements(){

        return $this->hasOne(Achievements::class, 'image_id', 'id');
    }
}
