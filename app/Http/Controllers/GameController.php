<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\DB;

class GameController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
           new Middleware('auth', except: ['show','index']),
        ];
    }
    public function index(Request $request)
    {

        if (Auth::user()->admin) {
            return view('admin.dashboard');
        }

        $gameQuery = Game::query();
        $gameQuery->where('verified', true);
        if ($request->filled('search')) {
            $search = $request->input('search');
            $gameQuery->whereAny(['name', 'publisher'],'LIKE', "%$search%");
        }


        $games = $gameQuery->get();
        $genres = Genre::all();
        return view('loggedin', compact('games', 'genres'));
    }
    public function show($id){
        $game = Game::find($id);
        $reviews = $game->reviews;

        return view('games.show', compact('game', 'reviews'));
    }

    public function create(){
        $genres = Genre::all();
        return view('games.create', compact('genres'));
    }



    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'cover_image' =>['required', 'string', 'max:1000'],
            'genre'=>['required']
        ]);

        $game= new Game();
        $game->name = $request->input('name');
        $game->publisher = $request->input('publisher');
        $game->user_id = auth()->user()->id;
        $game->total_playtime = 0;
        $game->cover_image = $request->input('cover_image');

        $game->save();

        $genres = $request->input('genre');
        foreach ($genres as $genreId){
            DB::table('games_genre')->insert([
                'games_id'=> $game->id,
                'genre_id'=> $genreId
            ]);
        }
        return redirect()->route('games.index');
    }

    public function genreFilter($genre_id){
        $games= Game::whereHas('genres', function ($query)use ($genre_id) {
            $query->where('genres.id', $genre_id);
        })->get();

        $genres = Genre::all();
        return view('loggedin', compact('games', 'genres'));
    }
}


