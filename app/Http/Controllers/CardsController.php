<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cards;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Cards::all();
        //laden van de view
        return view('cards.index')->with('cards',$cards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Load the create.blade.php view file
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Before you request a post, validate the data
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'format' => 'required',
            'category' => 'required'
        ]);

        // Create a new card using the request data
        $card = new Cards([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'format' => $request->get('format'),
            'category' => $request->get('category')
        ]);

        // Save it
        $card ->save();

        // And then redirect to ()
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Cards::find($id);
        return view('cards.show')->with('card',$card);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
