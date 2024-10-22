<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ReviewController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('auth', except: ['show','index']),
        ];
    }


    public function review($id){
        $games = Game::find($id);
        return view('review', compact('games'));
    }

    public function store(Request $request, $id){
//        $request->validate();
        $request->validate([
            'review' => ['required', 'string', 'max:1000'],
        ]);

        $review= new Review();
        $review->user_id = auth()->user()->id;
        $review->game_id = $id;
        $review->review = $request->input('review');
        $review->verified = true;


        $review->save();
        return redirect()->route('games.index');
    }
}
