<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'index']);
Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/create', [PostsController::class, 'create']);
Route::get('/blog/{post}', [PostsController::class, 'show']);
Route::get('/blog/{post}/edit', [PostsController::class, 'edit']);
Route::post('/blog', [PostsController::class, 'store']);
Route::put('/blog/{post}', [PostsController::class, 'update']);
Route::delete('/blog/{post}', [PostsController::class, 'destroy']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
