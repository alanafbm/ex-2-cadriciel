<?php

use App\Models\Auteur;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\AuteursEditeursController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Cookie;

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

// Exercice 2
Route::get('/auteur/edit/{id}/editeur', [AuteursEditeursController::class, 'editeur'])
    ->name('auteur.editeur');
Route::post('/auteur/edit/{id}/editeur', [AuteursEditeursController::class, 'createEditeur'])
    ->name('auteur.createEditeur');
// Fin de l'excercice 2

// https://stackoverflow.com/questions/23505875/laravel-routeresource-vs-routecontroller

Route::get('/', [AuteurController::class, 'index'])
    ->name('auteur.index');
Route::get('/auteur/create', [AuteurController::class, 'create'])
    ->name('auteur.create');
Route::post('/auteur/new', [AuteurController::class, 'createNew'])
    ->name('auteur.new');
Route::get('/auteur/edit/{id}', [AuteurController::class, 'edit'])
    ->name('auteur.edit');
Route::post('/auteur/update/{id}', [AuteurController::class, 'update'])
    ->name('auteur.update');
Route::post('/auteur/destroy/{id}', [AuteurController::class, 'destroy'])
    ->name('auteur.destroy');
Route::get('/auteur/{id}', [AuteurController::class, 'show'])
    ->name('auteur.show');

Route::get('/publications', [PublicationController::class, 'index']);
Route::get('/publications/create', [PublicationController::class, 'create'])
    ->name('publications.create');
Route::post('/publications/new', [PublicationController::class, 'createNew'])
    ->name('publications.new');
Route::get('/publications/{id}', [PublicationController::class, 'show']);


// Excercice sur les cookies

Route::get('/cookie', function (Request $request) {
    $cookieValue = $request->cookie('le-cookie');
    return view('cookie.index', [
        'leCookie' => $cookieValue
    ]);
});

Route::post('/cookie', function (Request $request) {
    $cookieValue = $request->cookie('le-cookie');
    if ($cookieValue) {
        $cookieValue += 1;
    } else {
        $cookieValue = 1;
    }
    // Crée l'object cookie
    $cookie = cookie('le-cookie', $cookieValue, 60);
    // Notifie laravel d'envoyer le cookie au bon moment
    Cookie::queue($cookie);

    return redirect(url()->current());
});

// Excercice sur les sessions

Route::get('/session', function (Request $request) {
    $sessionValue = $request->session()->get('la-session');
    return view('sessions.index', [
        'laSession' => $sessionValue
    ]);
});

Route::post('/session', function (Request $request) {
    /*$sessionValue = $request->session()->get('la-session');
    if ($sessionValue) {
        $sessionValue += 1;
    } else {
        $sessionValue = 1;
    }
    $request->session()->put('la-session', $sessionValue);
    */
    $request->session()->increment('la-session');

    return redirect(url()->current());
});

Route::get('/flash', function (Request $request) {
    $sessionValue = $request->session()->get('le-flash');
    return view('sessions.index', [
        'laSession' => $sessionValue
    ]);
});

Route::post('/flash', function (Request $request) {
    $sessionValue = $request->session()->flash('le-flash');
    if ($sessionValue) {
        $sessionValue += 1;
    } else {
        $sessionValue = 1;
    }
    //$request->session()->flash('le-flash', $sessionValue);
    return redirect(url()->current())->with('success', $sessionValue);
});

/*
Route::get('/', function () {
    // Auteur::where('active', 1)->where('ddn', '<', now()->subYears(18))->get();
    return Auteur::active()->majeur()->get();
});


// Auteur::find(42)->publications;

Route::get('/publications/{id}', function (Request $request, $id) {
    return Auteur::find($id)->publications;
});
*/

/*
Route::get('/publications/{id}', function (Request $request, Auteur $auteur) {
    return $auteur;
});
*/
