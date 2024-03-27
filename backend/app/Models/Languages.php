<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Languages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function GamesLanguages(){

        return $this->hasMany(GamesLanguages::class, 'language_id', 'id');
    }

    public function Reviews(){

        return $this->hasOne(Reviews::class, 'language_id', 'id');
    }
}
