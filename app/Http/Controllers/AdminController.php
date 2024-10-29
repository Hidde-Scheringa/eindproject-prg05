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

    public function gameManager(){
        $games = Game::all();
        return view('admin.toggle', compact('games'));
    }

    public function toggleVerified($id){
        $games = Game::find($id);
        $games->verified = !$games->verified;
        $games->save();
        return redirect()->route('admin-toggle');
    }

    public function destroy($id){
        $review = Review::find($id);
        $review-> delete();
        return redirect()->route('admin-reviews');
    }

    public function deleteGame($id){
        $game = Game::find($id);
        $game-> delete();
        return redirect()->route('admin-toggle');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
