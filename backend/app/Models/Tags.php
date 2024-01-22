<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_genre',
    ];

    public function GamesTags(){

        return $this->hasMany(GamesTags::class, 'tag_id', 'id');
    }
}
