<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;

Route::get('/', [IndexController::class, 'index']);
Route::get('/dashboard', [GameController::class, 'index'])->name('dashboard');
Route::get('/dashboard/genre/{genre_id}', [GameController::class, 'genreFilter'])->name('games.genrefilter');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('games', GameController::class);

Route::get('{game}/review', [ReviewController::class, 'review'])->name('review')->middleware('auth');
Route::post('{game}/review', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
Route::get('/admin-reviews', [AdminController::class, 'show'])->name('admin-reviews')->middleware([EnsureUserIsAdmin::class]);
Route::delete('/admin-reviews/{id}',[AdminController::class, 'destroy'])->name('admin-reviews.destroy')->middleware([EnsureUserIsAdmin::class]);
Route::get('/postmanager',[AdminController::class, 'gameManager'])->name('admin-toggle')->middleware([EnsureUserIsAdmin::class]);
Route::post('/postmanager/{id}',[AdminController::class, 'toggleVerified'])->name('admin.post-manager')->middleware([EnsureUserIsAdmin::class]);

require __DIR__.'/auth.php';
