<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class DevelopersGames extends Model
{
    use HasFactory;

    protected $fillable = [
        'PLACEHOLDERCOLUMN',
        'PLACEHOLDERCOLUMN',
        'PLACEHOLDERCOLUMN',
    ];

    public function Developers(){

        return $this->belongsTo(Developers::class, 'developer_id', 'id');
    }

    public function Games(){

        return $this->belongsTo(Games::class, 'game_id', 'id');   
    }
}
