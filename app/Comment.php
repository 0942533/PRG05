<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    //Comments belong to one card
    public function card() {
        return $this->belongsTo('App\Card');
    }
}
