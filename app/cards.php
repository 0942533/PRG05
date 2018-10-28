<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Likes is plural because one card can have multiple likes
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
