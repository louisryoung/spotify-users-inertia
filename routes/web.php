<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ArtistsController;

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
    return redirect(route('dashboard'));
});

Route::group(['middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]], function() {
    Route::get('/dashboard', [ArtistsController::class, 'get'])->name('dashboard');

    Route::get("/dashboard/add", function() {
        return Inertia::render('AddArtist');
    })->name('artists.add');

    Route::get("/view/{artist}", [ArtistsController::class, 'show'])->name('view');

    Route::post('/artists/create', [ArtistsController::class, 'create'])
        ->name('artists.create');
});
