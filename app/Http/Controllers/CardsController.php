<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Cards;


class CardsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Dit zorgt ervoor dat als je niet ben ingelogd, je eruit wordt geschopt
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Cards::all();
        //laden van de view
        return view('cards.index')->with('cards', $cards);
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
            'category' => 'required',
            'cover_image' => 'required|image'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);;
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // This will call the original filename_timestamp which makes the filename completely unique ->
            // so It's not gonna overwrite
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload image. There will be created a folder called: public/cover_images if it doesn't excists
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Create a new card using the request data
        $card = new Cards;
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->price = $request->input('price');
        $card->format = $request->input('format');
        $card->category = $request->input('category');
        $card->cover_image = $fileNameToStore;

        // Save it
        $card ->save();

        // And then redirect to ()
        return redirect('/')->with('info','Bestelling is succesvol geplaats!');
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
        $card = Cards::find($id);
        return view('cards.edit')->with('card',$card);
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
        //Before you request a post, validate the data
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'format' => 'required',
            'category' => 'required'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);;
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // This will call the original filename_timestamp which makes the filename completely unique ->
            // so It's not gonna overwrite
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload image. There will be created a folder called: public/cover_images if it doesn't excists
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Create a new card using the request data
        $card = Cards::find($id);
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->price = $request->input('price');
        $card->format = $request->input('format');
        $card->category = $request->input('category');
        if($request->hasFile('cover_image')){
            $card->cover_image = $fileNameToStore;
        }

        // Save it
        $card ->save();

        // And then redirect to ()
        return redirect('/')->with('info','Bestelling is succesvol aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Cards::find($id);

        Storage::delete('public/cover_images/'.$card->cover_image);

        $card->delete();
        return redirect('/')->with('info','Bestelling is succesvol verwijderd!');
    }
}
