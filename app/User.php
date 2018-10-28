<?php
namespace App;
//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Model implements Authenticatable
{
//    use Notifiable;
     use \Illuminate\Auth\Authenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function card()
    {
        return $this->hasMany('App\Cards');
    }
    // Likes is plural because one user can like multiple cards
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}

