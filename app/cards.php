<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    // Table Name
    protected $table = 'cards';
    // Primary key
    public $primaryKey = 'id';
}
