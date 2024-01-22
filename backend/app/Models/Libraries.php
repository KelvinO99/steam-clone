<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Libraries extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'is_wishlisted',
    ];

    public function User(){

        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Games(){

        return $this->hasOne(Games::class, 'id', 'game_id');   
    }
}
