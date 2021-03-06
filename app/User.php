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

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    public function favorites() {
        return $this->belongsToMany(
            Card::class,
            'card_user',
            'user_id',
            'card_id'
            )->withTimestamps();
    }

    public function hasFavorited($user_id){

        // Haal alle cards op
        $cards = Card::all();

        foreach ($this->cards()->get() as $card){

        }
    }
}

