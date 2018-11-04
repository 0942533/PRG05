<?php

namespace App\Http\Controllers;

Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Favorite;

class ShowFavoriteController extends Controller
{
    public function index() {
        $myFavorites = Auth::user()->favorites;
        return view('users.my_favorites', compact('myFavorites'));
    }
}
