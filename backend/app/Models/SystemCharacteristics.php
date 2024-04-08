<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class SystemCharacteristics extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
    ];

    public function SystemRequirements(){ //in undercase singolare

        return $this->morphTo();
    }
}
