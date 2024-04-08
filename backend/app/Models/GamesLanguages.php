<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class GamesLanguages extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'language_id',
        'interface',
        'full_audio',
        'subtitles',
    ];

    public function language(){         //gpt ha sempre ragione

        return $this->belongsTo(Languages::class, 'language_id', 'id');
    }

    public function Games(){

        return $this->hasOne(Games::class, 'game_id', 'id');
    }
}
