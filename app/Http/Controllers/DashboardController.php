<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin == 0 ){
            $users['users'] = User::all();
            return view('dashboard', $users);
        }else{
            $cards = Card::all();
            return view('admindashboard')->with('cards', $cards);
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $cards=DB::table('cards')
                    ->where('title','LIKE','%'.$search."%")
                    ->orWhere('description','LIKE','%'.$search."%")
                    ->orWhere('price','LIKE','%'.$search."%")
                    ->orWhere('format','LIKE','%'.$search."%")
                    ->orWhere('category','LIKE','%'.$search."%")
                    ->get();

        return view('admindashboard')->with('cards', $cards);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $user_id = auth()->user->id;
//        $user_requested = $id;
//        $users = User::find($id);
//
//        // Als user_id gelijk is aan het id van de user die iets wilt aanpassen
//        if($user_id == $user_requested){
//            return view('dashboard')->with('user', $users);
//        } else {
//            return redirect()->back();
//        }
    }

    public function show($id) {

//        return $id;

        $user = User::find($id);

        $user_id = auth()->user()->id;
        $user_req = $id;

        if($user_id == $user_req) {
            return view('dashboard')->with('user', $user);
        } else {
                return redirect('/')->with('error', 'Unauthorized Page');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return $id;
//        $this->validate($request,[
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users,email'
//        ]);

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');

        $users->save();

        return redirect()->back();
    }
}