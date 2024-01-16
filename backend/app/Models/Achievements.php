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
        'is_achieved',
    ];

    public function UsersAchievements(){

        return $this->hasMany(UsersAchievements::class, 'id', 'achievement');
    }

    public function Games(){

        return $this->hasOne(Games::class, 'PLACEHOLDERORIGIN', 'PLACEHOLDERDESTINATION');   
    }
}
