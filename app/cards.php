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
        'user'];
    // Hiermee geef je de velden aan die niet aangepast mogen worden
//    protected $quarded = [];
}
