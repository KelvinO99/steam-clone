<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Developers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_publisher',
        'description',        
    ];

    public function User(){

        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function DevelopersGames(){

        return $this->hasMany(DevelopersGames::class, 'developer_id', 'id');   
    }
}
