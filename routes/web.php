<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/loggedin', [GameController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('games', GameController::class);

Route::get('{game}/review', [ReviewController::class, 'review'])->name('review');
Route::post('{game}/review', [ReviewController::class, 'store'])->name('reviews.store');


require __DIR__.'/auth.php';
