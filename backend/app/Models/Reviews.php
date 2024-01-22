<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'date',
        'is_recommended',
        'description',
        'hours_played',
    ];
    public function User(){

        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function Games(){

        return $this->hasOne(Games::class, 'game_id', 'id');   
    }
}

