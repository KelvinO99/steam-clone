<?php
//NON ELIMINARE
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'image_path',
    ];

    public function Games(){

        return $this->hasOne(Games::class, 'game_id', 'id');
    }

    public function Users(){

        return $this->BelongsTo(User::class, 'image_id', 'id');
    }

    public function Achievements(){

        return $this->belongsTo(Achievements::class, 'image_id', 'id');
    }
    public function Tags(){
        return $this->hasOne(Images::class,'image_id','id');
    }
}
