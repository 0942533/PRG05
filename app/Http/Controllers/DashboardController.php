<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cards;
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
            $users['users'] = \App\User::all();
            return view('dashboard', $users);
        }else{
            $cards = Cards::all();
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
}