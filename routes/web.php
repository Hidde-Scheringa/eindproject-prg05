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

//     Index routes
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/games/genre/{genre_id}', [IndexController::class, 'genreFilter'])->name('genrefilter');



Route::middleware('auth')->group(function () {
//    Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    De games routes
    Route::resource('games', GameController::class)->middleware([EnsureAdminIsNotUser::class])->middleware([EnsureUserCanEdit::class]);
    Route::get('games/create', [GameController::class, 'create'])->name('games.create')->middleware([EnsureAdminIsNotUser::class]);
    Route::get('/dashboard/genre/{genre_id}', [GameController::class, 'genreFilter'])->name('games.genrefilter')->middleware([EnsureAdminIsNotUser::class]);

//     Review routes
    Route::get('{game}/review', [ReviewController::class, 'review'])->name('review')->middleware([EnsureAdminIsNotUser::class]);
    Route::post('{game}/review', [ReviewController::class, 'store'])->name('reviews.store')->middleware([EnsureAdminIsNotUser::class]);
});

//     Losse games route voor de show die uit de auth middleware is
Route::get('games/{game}', [GameController::class, 'show'])->name('games.show')->middleware([EnsureAdminIsNotUser::class]);


//     Review routes

    Route::get('{game}/review', [ReviewController::class, 'review'])->name('review')->middleware([EnsureAdminIsNotUser::class]);
    Route::post('{game}/review', [ReviewController::class, 'store'])->name('reviews.store')->middleware([EnsureAdminIsNotUser::class]);




//     Admin routes
Route::middleware([EnsureUserIsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin-reviews', [AdminController::class, 'show'])->name('admin-reviews');
    Route::delete('/admin-reviews/{id}',[AdminController::class, 'destroy'])->name('admin-reviews.destroy');

    Route::get('/postmanager',[AdminController::class, 'gameManager'])->name('admin-toggle');
    Route::post('/postmanager/{id}',[AdminController::class, 'toggleVerified'])->name('admin.post-manager');
    Route::delete('/postmanager/{id}', [AdminController::class, 'deleteGame'])->name('admin-games.destroy');
});

require __DIR__.'/auth.php';
