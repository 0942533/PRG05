<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cards = Card::all();
        return view('editProfile');
    }

    public function edit($id) {
        $user_id = auth()->user->id;
        $user_req = $id;
        $user = User::find($id);

        if($user_id == $user_req) {
            return view('editProfile')->with('user', $user);
        } else {
            return redirect('/');
        }
    }

    public function show($id) {

        $user = User::find($id);

        $user_id = auth()->user()->id;
        $user_req = $id;

        if($user_id == $user_req) {
            return view('editProfile')->with('user', $user);
        } else {
                return redirect('/')->with('error', 'Unauthorized Page');
            }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->back();
    }
}
