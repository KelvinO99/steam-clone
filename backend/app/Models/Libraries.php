<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libraries extends Model
{
    use HasFactory;
}
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
        'PLACEHOLDERCOLUMN',
        'PLACEHOLDERCOLUMN',
        'PLACEHOLDERCOLUMN',
    ];

    public function PLACEHOLDERTABLE1(){

        return $this->PLACEHOLDERRELATIONSHIP(PLACEHOLDERTABLE1::class, 'PLACEHOLDERORIGIN', 'PLACEHOLDERDESTINATION');
    }

    public function PLACEHOLDERTABLE2(){

        return $this->PLACEHOLDERRELATIONSHIP(PLACEHOLDERTABLE2::class, 'PLACEHOLDERORIGIN', 'PLACEHOLDERDESTINATION');   
    }
}
