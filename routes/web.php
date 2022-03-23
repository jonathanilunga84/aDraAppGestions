<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProjet\ProjetController;
use App\Http\Controllers\AdminAgent\AgentController;
use App\Http\Controllers\AdminConge\CongeController;
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
})->name('dashboard.admin.home');

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
            Route::get('/listes/projet/ajax', [ProjetController::class, "fectchAllProjetAjax"])->name('listesProjets.fectchAllProjetAjax');
            Route::get('/infos/projet/ajax', [ProjetController::class, "fectchOneProjetAjax"])->name('fectchOneProjetAjax');
            Route::post('/ajout/projet', [ProjetController::class, "store"])->name('projet.store');
            Route::post('/search/projet', [ProjetController::class, "searchProjet"])->name('searchProjet');
            Route::post('/delete/projet', [ProjetController::class, "delete"])->name('projet.delete');
            Route::put('/update/projet', [ProjetController::class, "update"])->name('projet.update');
            Route::get('/post/projet/{id}', [ProjetController::class, "show"])->name('post.show');
            Route::get('/liste/staff/affecter-au-projet/{id}', [ProjetController::class, "listeAgentsAffecteAuProjet"])->name('post.listeAgentsAffecteAuProjet');

            /* cette route permet d'imprimer une liste des Agents lié à un projet' */
            Route::get('/liste/staff/affecter-au-projet/pdf/{id}', [ProjetController::class, "listeAgentsAffecteAuProjetPdf"])->name('post.listeAgentsAffecteAuProjetPdf');
        });

        Route::group([
            "prefix" => "agents",
            "as" => "agents."
        ], function(){
            Route::get('/listes', [AgentController::class, "index"])->name('listesAgents.index');
            //cette Route permet d'afficher les infos d'un seul agent
            Route::get('/post/agent/{id}', [AgentController::class, "show"])->name('AgentPost.show');
            //cette Route permet faire une recherche par nom,postnom,prenom
            Route::post('/search/agent/', [AgentController::class, "searchAgentParIdentite"])->name('searchAgentParIdentite');
            Route::post('/search/agent/date', [AgentController::class, "searchAgentParDate"])->name('searchAgentParDate');

            Route::get('/listes/agent/ajax', [AgentController::class, "getAgentsAjax"])->name('listesAgents.getAgentsAjax');
            Route::get('/infos/agent/ajax', [AgentController::class, "showInfoAgent"])->name('getInfosAgent.showInfoAgent');
            Route::post('/ajout/agent', [AgentController::class, "store"])->name('AjoutAgent.store');
            Route::get('/delete/agent', [AgentController::class, "delete"])->name('agent.delete');
            Route::put('/update/agent', [AgentController::class, "update"])->name('agent.update');

            /* liste des congé d'un Agent  */
            Route::get('/liste/conge/agent/{id}', [AgentController::class, "listeCongeAgent"])->name('post.listeCongeAgent');
            /* cette Route permet d'imprimer une liste de tout le congé pour un Agent */
            Route::get('/liste/conge/un-agent/pdf/{id}', [AgentController::class, "listeCongeOneAgentPdf"])->name('post.listeCongeOneAgentPdf');

        });

        Route::group([
            /*"prefix" => "dashboard/projets",*/
            "prefix" => "conges",
            "as" => "conges."
        ], function(){
            Route::get('/listes', [CongeController::class, "index"])->name('listesConge.index');
            /* Route pour affichér les infos pour une congé*/
            Route::get('/post/conge/{id}', [CongeController::class, "show"])->name('postConge.show');
            Route::post('/ajout/conge/agent', [CongeController::class, "store"])->name('Conge.store');
            //cette Route permet de rechercher le congé
            Route::post('/search/conge', [CongeController::class, "searchConge"])->name('searchConge');
            /* Route pour supprimer un Congé */
            Route::get('/delete/conge', [CongeController::class, "delete"])->name('conge.delete');
            Route::get('/liste/staff/affecter-au-conge/{id}', [CongeController::class, "listeAgentsAffecteAuConge"])->name('post.listeAgentsAffecteAuConge');

            /* cette Route permet d'imprimer les congé en cours */
            Route::get('/liste/conge/staff/en-cours/pdf/', [CongeController::class, "listeStaffCongeEnCoursPdf"])->name('post.listeStaffCongeEnCoursPdf');
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
