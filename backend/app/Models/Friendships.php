<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Friendships extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_1',
        'user_id_2',
        'is_pending',
    ];

    public function Users_1(){

        return $this->belongsTo(User::class, 'user_id_1', 'id');
    }
    public function Users_2(){

        return $this->belongsTo(User::class, 'user_id_2', 'id');
    }

}
