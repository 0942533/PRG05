<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        // Het gaat kijken in de pages folder voor een index.blade.php
        return view('pages.index');
    }
}
