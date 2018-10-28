<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function dropdownfilter(Request $request) {
        $search= $request->get('dropdownfilter');
        $category = DB::table('cards')
                    ->where('category','LIKE','%'.$search."%")
                    ->get();

        return view('cards/index')->with('cards', $category);
    }
}
