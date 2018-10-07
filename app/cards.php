<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    // Hiermee geef je de velden aan die niet aangepast mogen worden
    protected $quarded = [];
}
