<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProjet\ProjetController;
use App\Http\Controllers\AdminAgent\AgentController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/dashboard/admin', function () {
    return view('Pages/Dashboard');
});

/* Le groupe des Routes relatives aux administrateurs (Admin) uniquement */
Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => "admin."
    ], function(){

        Route::group([
            /*"prefix" => "dashboard/projets",*/
            "prefix" => "projets",
            "as" => "projets."
        ], function(){
            Route::get('/listes', [ProjetController::class, "index"])->name('listes.index');
            Route::post('/ajout/projet', [ProjetController::class, "store"])->name('projet.store');
        });

        Route::group([
            "prefix" => "agents",
            "as" => "agents."
        ], function(){
                Route::get('/listes', [AgentController::class, "index"])->name('listesAgents.index');
                Route::post('/ajout/agent', [AgentController::class, "store"])->name('AjoutAgent.store');
        });
    }
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::fallback(function(){
    return view('auth/login'); //'view 404';
});
