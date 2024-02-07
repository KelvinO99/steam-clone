<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class UsersAchievements extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'achievements_id',
        'is_achieved',
    ];

    public function User(){

        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Achievements(){

        return $this->hasOne(Achievements::class, 'id', 'game_id');   
    }
}
