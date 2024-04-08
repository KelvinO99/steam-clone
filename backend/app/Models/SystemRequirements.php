<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class SystemRequirements extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function SystemCharacteristics(){

        return $this->morphMany(SystemCharacteristics::class, 'SystemRequirements');
    }

    public function Games(){

        return $this->hasOne(Games::class, 'game_id', 'id');
    }
}
