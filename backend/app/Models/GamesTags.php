<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class GamesTags extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'tag_id',
    ];

    public function Games(){

        return $this->hasOne(Games::class, 'id', 'game_id');
    }

    public function Tags(){

        return $this->hasOne(Tags::class, 'id', 'tag_id');   
    }
}
