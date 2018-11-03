<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'format',
        'category',
        'image',
        'user'
    ];

    public function favorites()
    {
        return $this->belongsToMany(
            User::class,
            'card_user',
            'card_id',
            'user_id'
        )->withTimestamps();
    }

    //Cards have many comments
    public function comments() {
        return $this->hasMany('App\Comment');
    }

}
