<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function cards()
    {
        // Any card may have many tags
        // Any tag may be applied to many cards
        return $this->belongsToMany(Cards::class);
    }
}
