<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Friendships extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_sender',
        'user_receiver',
        'is_pending',
        'is_blocked',
    ];

    public function Users_1(){

        return $this->belongsTo(User::class, 'user_sender', 'id');
    }
    public function Users_2(){

        return $this->belongsTo(User::class, 'user_receiver', 'id');
    }

}
