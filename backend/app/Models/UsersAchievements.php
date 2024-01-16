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
    ];

    public function User(){

        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function Achievements(){

        return $this->hasOne(Achievements::class, 'game_id', 'id');   
    }
}
