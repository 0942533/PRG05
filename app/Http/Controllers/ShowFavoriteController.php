<?php

namespace App\Http\Controllers;

Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Favorite;

class ShowFavoriteController extends Controller
{
    public function index() {
        // Get all favorites waar user id gelijk is aan de id van de auth
        $favorites = Favorite::whereUserId(Auth::id())->get();
        return view('favorites', compact('favorites'));
    }
}
