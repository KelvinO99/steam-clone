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
        'time_played',
    ];
    // public function User(){

    //     return $this->hasOne(User::class, 'id', 'user_id');
    // }

    public function Games(){

        return $this->hasOne(Games::class, 'id', 'game_id');
    }
    public function Libraries(){

        return $this->hasOne(Games::class, 'id', 'time_played');
    }
    public function User()
    {
        // Define the belongsTo relationship to the User model
        return $this->belongsTo(User::class);
    }
}

