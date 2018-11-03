<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Card;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $card_id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'comment' => 'required|min:5|max:2000'
        ]);

        $card = Card::find($card_id);

        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->user_id = Auth()->user()->id;
        $comment->email = $request->input('email');
        $comment->comment = $request->input('comment');
        $comment->approved = true;
        $comment->card()->associate($card);

        $comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $comment_id = Comment::find($id);

//        $comment_id = Comment::where('id', $id)->get();

        if(auth()->user()->id !== $comment_id->user_id && auth()->user()->admin !== 1) {
            return redirect()->route('cards.index', [$comment_id->post_id])->with('error', 'unauthorized!');
        }

        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
