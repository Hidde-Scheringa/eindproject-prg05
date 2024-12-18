<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->isAdmin()) {
            return redirect('/admin/dashboard')->with('error', 'Je hebt niet de rechten voor deze pagina');
        }

        $gameQuery = Game::query();
        $gameQuery->where('verified', true);
        if ($request->filled('search')) {
            $search = $request->input('search');
            $gameQuery->whereAny(['name', 'publisher'],'LIKE', "%$search%");
        }


        $games = $gameQuery->get();
        $genres = Genre::all();

        $postCount = Game::where('user_id', Auth::id())->where('verified', true)->count();
        $userCanEdit = $postCount >= 5;

        return view('loggedin', compact('games', 'genres', 'userCanEdit'));
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

    public function edit(Game $game){

        if ($game->user_id !== auth()->id()) {
            return redirect()->route('games.index')->with('error', 'Je hebt geen toestemming om deze game te bewerken.');
        }

        $activeGenre = $game->genres->pluck('id')->toArray();
        return view('games.edit', compact('game','activeGenre'));
    }

    public function update(Request $request, Game $game){

        if ($game->user_id !== auth()->id()) {
            return redirect()->route('games.index')->with('error', 'Je hebt geen toestemming om deze game te bewerken.');
        }

        $postCount = Game::where('user_id', auth()->id())->where('verified', true)->count();
        if ($postCount < 5) {
            return redirect()->route('games.index')->with('error', 'Je moet minstens 5 games hebben aangemaakt om deze te mogen bewerken.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'cover_image' =>['required', 'string', 'max:1000'],
            'genre'=>['required'],
        ]);

        $game->name = $request->input('name');
        $game->publisher = $request->input('publisher');
        $game->cover_image = $request->input('cover_image');
        $game->genres()->sync($request->input('genre'));
        $game->save();

        return redirect()->route('games.index');
    }

    public function genreFilter($genre_id){
        $games= Game::whereHas('genres', function ($query)use ($genre_id) {
            $query->where('genres.id', $genre_id);
        })->get();

        $genres = Genre::all();

        $postCount = Game::where('user_id', Auth::id())->where('verified', true)->count();
        $userCanEdit = $postCount >= 5;

        return view('loggedin', compact('games', 'genres', 'userCanEdit'));
    }
}


