<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureAdminIsNotUser;
use App\Http\Middleware\EnsureUserCanEdit;


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/games/genre/{genre_id}', [IndexController::class, 'genreFilter'])->name('genrefilter');

Route::get('/dashboard/genre/{genre_id}', [GameController::class, 'genreFilter'])->name('games.genrefilter');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('games', GameController::class)->middleware([EnsureAdminIsNotUser::class])->middleware([EnsureUserCanEdit::class]);

});
Route::get('games/{game}', [GameController::class, 'show'])->name('games.show')->middleware([EnsureAdminIsNotUser::class]);
Route::get('games/create', [GameController::class, 'create'])->name('games.create')->middleware([EnsureAdminIsNotUser::class]);

Route::get('{game}/review', [ReviewController::class, 'review'])->name('review')->middleware('auth');
Route::post('{game}/review', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

Route::middleware([EnsureUserIsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin-reviews', [AdminController::class, 'show'])->name('admin-reviews');
    Route::delete('/admin-reviews/{id}',[AdminController::class, 'destroy'])->name('admin-reviews.destroy');

    Route::get('/postmanager',[AdminController::class, 'gameManager'])->name('admin-toggle');
    Route::post('/postmanager/{id}',[AdminController::class, 'toggleVerified'])->name('admin.post-manager');
    Route::delete('/postmanager/{id}', [AdminController::class, 'deleteGame'])->name('admin-games.destroy');
});

require __DIR__.'/auth.php';
