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

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
