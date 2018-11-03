<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Auth;
use App\Card;

class SearchController extends Controller
{
    public function dropdownfilter(Request $request) {
        $search= $request->get('dropdownfilter');
        $category = DB::table('cards')
                    ->where('category','LIKE','%'.$search."%")
                    ->get();

        if($search == "alles") {
            return redirect('dashboard');
        }

        return view('admindashboard')->with('cards', $category);
    }
}
