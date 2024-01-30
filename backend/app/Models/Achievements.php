<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;


class Achievements extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
    ];

    public function UsersAchievements(){

        return $this->hasMany(UsersAchievements::class, 'achievement_id', 'id');
    }

    public function Games(){

        return $this->hasOne(Games::class, 'game_id', 'id');   
    }
}
