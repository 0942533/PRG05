<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // Each individual like or dislike is done by one user and is attached to one card
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function card()
    {
        return $this->belongsTo('App\Cards');
    }
}
