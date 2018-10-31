<?php

namespace App\Http\Controllers;

Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index() {
        $cards = Auth::user()->favorite_cards;
        return view('cards.favorite', compact('cards'));
    }

    public function add($card)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_cards()->where('card_id','$card')->count();

        if ($isFavorite == 0)
        {
            $user->favorite_cards()->attach($card);
            return redirect()->back()->with('message', 'post successfully added to your favorite list');
        } else {
            $user->favorite_cards()->detach($card);
            return redirect()->back()->with ('message', 'post succesfully removed from you favorite list');
        }
    }
}
