<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ActionController;

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
    // return view('clubs.index');
    return view('welcome');
    die;
});

// show store create index edit update destroy

// CLUBS
Route::resource('clubs','App\Http\Controllers\ClubController'); 
// Route::get('clubs', [ClubController::class, 'index'])->name('club.list');
Route::put('clubs/{club}/edit', [ClubController::class, 'edit'])->name('club.details');
Route::put('clubs/{club}/update', [ClubController::class, 'update'])->name('club.update');
Route::delete('clubs/{club}/destroy', [TeamController::class, 'destroy'])->name('club.destroy');

// TEAMS
Route::resource('clubs/{club}/teams','App\Http\Controllers\TeamController'); 
Route::get('clubs/{club}/teams', [TeamController::class, 'index'])->name('teams.list');
Route::put('clubs/{club}/teams/{team}/edit', [TeamController::class, 'edit'])->name('team.details');
Route::put('clubs/{club}/teams/{team}/update', [ClubController::class, 'update'])->name('team.update');
Route::delete('clubs/{club}/teams/{team}/destroy', [TeamController::class, 'destroy'])->name('teams.destroy');

// PLAYERS (aprenem a treballar amb GRUPOS de Rutas)
Route::controller(PlayerController::class)->group(function(){
    Route::get( 'clubs/{club}/teams/{team}/players',  'index');
    Route::get( 'clubs/{club}/teams/{team}/players/create',  'create');
    Route::post('clubs/{club}/teams/{team}/players',  'store');
    Route::get( 'clubs/{club}/teams/{team}/players/{player}/edit',  'edit');
    Route::put( 'players/{player}/edit',  'edit');
    Route::put( 'clubs/{club}/teams/{team}/players/{player}',  'update');
    Route::delete( 'clubs/{club}/teams/{team}/players/{player}/destroy',  'destroy');
});

// MATCHES
// Route::controller(MatchhController::class)->group(function(){
//     Route::get( 'matches',  'index');
//     Route::get( 'matches/create',  'create');
//     Route::post('matches/',  'store');
//     Route::get( 'matches/{match}/edit', 'edit');
//     Route::put( 'matches/{match}', 'update');
//     Route::delete('matches/{match}/destroy',  'destroy');
// });

Route::controller(GameController::class)->group(function(){
    Route::get( 'games',  'index');
    Route::get( 'games/create',  'create');
    Route::post('games/',  'store');
    Route::get( 'games/{game}/edit', 'edit');
    Route::put( 'games/{game}', 'update');
    Route::delete('games/{game}/destroy',  'destroy');
});

// ACTIONS (minut a minut)
Route::controller(ActionController::class)->group(function(){
    Route::get( 'games/{game}/actions',  'index');
    Route::get( 'games/{game}/actions/create',  'create');
});

// GESTIO USUARIS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
