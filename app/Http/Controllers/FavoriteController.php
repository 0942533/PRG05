<?php

namespace App\Http\Controllers;

Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Favorite;

class FavoriteController extends Controller
{
    public function index() {
        $cards = Auth::user()->favorites();
        return view('cards.favorite', compact('card'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();

        if($user['number_of_logins'] >= 5) {

            $isFavorite = $user->favorites()->where('card_id', $request->id)->count();

            if ($isFavorite == 0)
            {
                $user->favorites()->attach($request->id);
                return 1;

            } else {
                $user->favorites()->detach($request->id);
                return 0;
            }
        }

        else {
            return 2;
        }
    }
}
