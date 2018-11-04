<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $table = 'card_user';

    public function user() {
        $this->belongsTo(User::class);
    }

    public function cards() {
        $this->belongsTo(Card::class);
    }
}
