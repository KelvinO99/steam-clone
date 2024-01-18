<?php
//NON ELIMINARE 
//<PLACEHOLDER> = dati da cambiare -chris

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\PendingSingletonResourceRegistration;

class PLACEHOLDERMODEL extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_publisher',
        'name',
        'description',        
    ];

    public function PLACEHOLDERTABLE1(){

        return $this->hasOne(PLACEHOLDERTABLE1::class, 'PLACEHOLDERORIGIN', 'PLACEHOLDERDESTINATION');
    }

    public function PLACEHOLDERTABLE2(){

        return $this->hasMany(PLACEHOLDERTABLE2::class, 'PLACEHOLDERORIGIN', 'PLACEHOLDERDESTINATION');   
    }
}
