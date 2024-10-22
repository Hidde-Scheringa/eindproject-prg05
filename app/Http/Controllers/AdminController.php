<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        $review = Review::all();
        $users = User::all();
        $games = Game::all();
        return view('admin.review', compact('review', 'users', 'games'));
    }

    public function destroy($id){
        $review = Review::findOrFail($id);
        $review-> delete();
        return redirect()->route('admin-reviews');
    }
}
