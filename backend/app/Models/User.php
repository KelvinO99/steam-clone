<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable implements JWTSubject, LaratrustUser
{
    use HasFactory, Notifiable, HasRolesAndPermissions; // Aggiunto il trait di Laratrust -Salvo

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name',
        'username',
        'email',
        'password',
        //'role'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() { //tells the JWT package what to use as the unique user ID -kel
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() { //
        return [];
    }
    
    public function UsersAchievements(){
        
        return $this->hasMany(UsersAchievements::class, 'users_achievements', 'user_id');
    }

    public function Libraries(){

        return $this->hasOne(Libraries::class, 'libraries', 'id');
    }

    public function Reviews(){
        return $this->hasOne(Reviews::class, 'reviews', 'id');
    }

    public function Developers(){

        return $this->hasOne(Developers::class, 'developers', 'id');
    }
}