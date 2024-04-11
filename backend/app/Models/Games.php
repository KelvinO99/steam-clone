<?php
//NON ELIMINARE
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'is_dlc',
        'parent_id',
        'name',
        'date',
        'base_price',
        'is_discounted',
        'discounted_price',
        'discounted_percentage',
        'short_description',
        'long_description',
        'pegi_id',
    ];

    public function Libraries(){

        return $this->hasMany(Libraries::class, 'game_id', 'id');
    }

    public function Achievements(){

        return $this->hasMany(Achievements::class, 'game_id', 'id');
    }
    public function GamesTags(){

        return $this->hasMany(GamesTags::class, 'game_id', 'id');
    }

    public function Reviews(){

        return $this->hasMany(Reviews::class, 'game_id', 'id');
    }
    public function DevelopersGames(){

        return $this->hasMany(DevelopersGames::class, 'game_id', 'id');
    }

    public function Games(){

        return $this->hasMany(Games::class, 'id', 'parent_id');
    }
    public function Images(){

    return $this->hasMany(Images::class, 'game_id', 'id');
    }
    public function Pegis(){

        return $this->hasMany(Games::class, 'pegi_id', 'pegi_id');
    }
    public function GamesLanguages(){

        return $this->hasMany(GamesLanguages::class, 'game_id', 'id');
    }
    public function SystemRequirements(){

        return $this->hasMany(SystemRequirements::class, 'game_id', 'id');
    }
}
