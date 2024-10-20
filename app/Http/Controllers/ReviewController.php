<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function review($id){
        $games = Game::find($id);
        return view('review', compact('games'));
    }

    public function store(Request $request, $id){
//        $request->validate();

        $review= new Review();
        $review->user_id = auth()->user()->id;
        $review->game_id = $id;
        $review->review = $request->input('review');
        $review->verified = true;


        $review->save();
        return redirect()->route('games.index');
    }
}
