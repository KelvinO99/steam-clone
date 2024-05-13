<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class Follows extends Model
{
    use HasFactory;

    protected $fillable = [
        'PLACEHOLDERCOLUMN',
        'PLACEHOLDERCOLUMN',
        'PLACEHOLDERCOLUMN',
    ];

    public function Relationships(){

        return $this->morphTo();
    }
}
