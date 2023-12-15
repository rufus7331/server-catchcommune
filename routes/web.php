<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatchEntryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FishingSpotController;
use App\Http\Controllers\ProfileController;
use App\Models\CatchEntry;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $recentEntries = CatchEntry::with('user', 'fish', 'fishingSpot')->orderBy('created_at', 'desc')->take(5)->get();
    return Inertia::render('Dashboard', ['recentEntries' => $recentEntries]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/fishing-spots', [FishingSpotController::class, 'index'])->name('fishing-spots');
    Route::get('/fishing-spots/{id}', [FishingSpotController::class, 'show'])->name('fishing-spots.show');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('/articles/{id}/comments', [CommentController::class, 'store'])->name('articles.comments.store');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/catch-entries', [CatchEntryController::class, 'index'])->name('catch-entries');
    Route::post('/catch-entries', [CatchEntryController::class, 'store'])->name('catch-entries.store');
    Route::get('/fishing-spots/{fishingSpot}/catch-entries/create', [CatchEntryController::class, 'create'])->name('catch-entries.create');
});

require __DIR__ . '/auth.php';
