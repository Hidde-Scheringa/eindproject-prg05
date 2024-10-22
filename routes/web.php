<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/loggedin', [GameController::class, 'index']);

Route::get('/dashboard', function () {
    $games = Game::all();
    if (Auth::user()->admin){
//    dd(Auth::user());
        return view('admin.dashboard');
    } else{
        return view('loggedin',['games' => $games]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('games', GameController::class);

Route::get('{game}/review', [ReviewController::class, 'review'])->name('review');
Route::post('{game}/review', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/admin-reviews', [AdminController::class, 'show'])->name('admin-reviews');
Route::delete('/admin-reviews/{id}',[AdminController::class, 'destroy'])->name('admin-reviews.destroy');

require __DIR__.'/auth.php';
