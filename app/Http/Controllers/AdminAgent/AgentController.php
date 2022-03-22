<?php

namespace App\Http\Controllers\AdminAgent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projet;
use App\Models\Agent;
use App\Models\User;
use Carbon\Carbon;
use PDF;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listesAgents = Agent::all();
        $listesProjets = Projet::all();
        //$alea = rand();
        //$datas = date('dy');
        //$mail = $alea.''.$datas.'@gmail.com';
        /*$temp = time() + (7 * 24 * 60 * 60);
        $datep = date('Y-m-d', $temp);*/ //pour trouver la semaine prochaine
        //$temp = Now('date');
        //$datep = Carbon::now(); //$datep->toTimeString()
        //$dt = "N".rand(0,100); //$datep->toArray(['day'=>$datep->day]);
        //dd($dt);
        return view('Pages.Agents.listesAgents', compact('listesAgents','listesProjets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            "nom"=>"required|string|min:2|max:100",  
            'postnom'=>'required|min:2|max:100',
            'prenom'=>"required|string|min:2|max:15",
            'sexe'=>'required|string|min:2|max:15',
            'etatCivil'=>'required|min:2|max:100',
            'telephone'=>'max:15', 
            'lieuNaissance'=>'max:200',
            'email'=>'max:100',
            'NumCarteIdentite'=>'max:100',
            'nationalite'=>'max:100',
            'adresseResidence'=>'max:200',
            'NumCompteBancaire'=>'max:200',
            'projet_id'=>'required|string|max:200',
            'fonction'=>'max:200',
            'lieuAffectation'=>'max:200',
            'dateNaissance'=>'max:15',
            'dateDebut'=>'max:15',
            'dateFinPrevue'=>'max:15',
            'DateFinEffective'=>'max:15',
            'DureeContratMois'=>'max:15',
            'DureeContratJour'=>'max:15',
            'status'=>'max:100',
            'salaires' =>'max:200'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            //print_r("validator ok"); $UserNamePseudo.''."@gmail.com",
            $UserNamePseudo = $request->nom.''.rand(0,100); //.$datas = date('dy');
            $alea = rand();
            $datas = date('dy');
            $user = User::create([
                'nom' => $request->nom,
                'postnom' => $request->postnom,
                'email' => $mail = $alea.''.$datas.'@gmail.com',
                'pseudo' => $UserNamePseudo,
                'role' => 'agent',
                'status' => 'active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
            ]);// password
            $data = [
                'numProjet' => rand(),
                'nom' => $request->nom,
                'postnom' => $request->postnom,
                'prenom'=>$request->prenom,
                'sexe' => $request->sexe,
                'telephone' => $request->telephone,
                'lieuNaissance' => $request->lieuNaissance,
                'dateNaissance' => $request->dateNaissance,
                'etatCivil' => $request->etatCivil,
                'email' => $request->email,
                'NumCarteIdentite' => $request->NumCarteIdentite,
                'nationalite' => $request->nationalite,
                'adresseResidence' => $request->adresseResidence,
                'NumCompteBancaire' => $request->NumCompteBancaire,
                'projet_id' => $request->projet_id,
                'fonction' => $request->fonction,
                'lieuAffectation' => $request->lieuAffectation,
                'dateDebut' => $request->dateDebut,
                'dateFinPrevue' => $request->dateFinPrevue,
                'DateFinEffective' => $request->DateFinEffective,
                'DureeContratMois' => $request->DureeContratMois,
                'DureeContratJour' => $request->DureeContratJour,
                'status' => $request->status,
                'salaires' => $request->salaires,
                'user_id'=> $user->id
            ];
            //'user_id'=> Auth()->user()->id
            Agent::create($data);
            return response()->json(['status'=>1, 'messageSucces'=>'Agent enregistrer avec success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $postInfosAgent = Agent::findOrfail($id);
       return view('Pages/Agents/postOneAgent', compact('postInfosAgent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = validator::make($request->all(),[
            "IdAgentModif"=>"required",
            "nom"=>"required|string|min:2|max:100",  
            'postnom'=>'max:100',
            'prenom'=>"max:15",
            'sexe'=>'required|string|min:2|max:15',
            'etatCivil'=>'required|min:2|max:100',
            'telephone'=>'max:15', 
            'lieuNaissance'=>'max:200',
            'email'=>'max:100',
            'NumCarteIdentite'=>'max:100',
            'nationalite'=>'max:100',
            'adresseResidence'=>'max:200',
            'NumCompteBancaire'=>'max:200',
            //'projet_id'=>'required|string|max:200',
            'fonction'=>'max:200',
            'lieuAffectation'=>'max:200',
            'dateNaissance'=>'max:15',
            'dateDebut'=>'max:15',
            'dateFinPrevue'=>'max:15',
            'DateFinEffective'=>'max:15',
            'DureeContratMois'=>'max:15',
            'DureeContratJour'=>'max:15',
            'status'=>'max:100',
            'salaires' =>'max:200'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            $infosAgent = Agent::findOrfail($request->IdAgentModif);
            $infosUser = $infosAgent->user;//->id;
            //print_r("validator ok"); $UserNamePseudo.''."@gmail.com",
            $UserNamePseudo = $request->nom.''.rand(0,100); //.$datas = date('dy');
            $alea = rand();
            $datas = date('dy');
            $user = $infosUser->update([
                'nom' => $request->nom,
                'postnom' => $request->postnom,
                'email' => $mail = $alea.''.$datas.'@gmail.com',
                'pseudo' => $UserNamePseudo,
                'role' => 'agent',
                'status' => 'active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
            ]);//password
            $data = [
                'numProjet' => rand(),
                'nom' => $request->nom,
                'postnom' => $request->postnom,
                'prenom'=>$request->prenom,
                'sexe' => $request->sexe,
                'telephone' => $request->telephone,
                'lieuNaissance' => $request->lieuNaissance,
                'dateNaissance' => $request->dateNaissance,
                'etatCivil' => $request->etatCivil,
                'email' => $request->email,
                'NumCarteIdentite' => $request->NumCarteIdentite,
                'nationalite' => $request->nationalite,
                'adresseResidence' => $request->adresseResidence,
                'NumCompteBancaire' => $request->NumCompteBancaire,
                //'projet_id' => $request->projet_id,
                'fonction' => $request->fonction,
                'lieuAffectation' => $request->lieuAffectation,
                'dateDebut' => $request->dateDebut,
                'dateFinPrevue' => $request->dateFinPrevue,
                'DateFinEffective' => $request->DateFinEffective,
                'DureeContratMois' => $request->DureeContratMois,
                'DureeContratJour' => $request->DureeContratJour,
                'status' => $request->status,
                'salaires' => $request->salaires,
                'user_id'=> $infosAgent->user->id
            ];
            //'user_id'=> Auth()->user()->id
            //Agent::create($data);
            $infosAgent->update($data);
            return response()->json(['status'=>1, 'messageSucces'=>'Agent enregistrer avec success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request){
        $Id = $request->Id;
        $infos = Agent::find($Id);
        $infos->delete();
    }

    public function searchAgentParIdentite(Request $request){
        $req = $request->AgentSearch;
        //dd($req);
        $listesProjets = Projet::all();
        //$listesAgents = Agent::where("nom", 'like', '%'.$req.'%' or "postnom", 'like', '%'.$req.'%')->get();
        $listesAgents = Agent::where("nom", 'like', '%'.$req.'%')
                                ->orWhere("postnom", 'like', '%'.$req.'%')
                                ->orWhere("prenom", 'like', '%'.$req.'%')
                                ->get();
        //dd($listesProjets);
        return view('Pages.Agents.listesAgents', compact('listesAgents','listesProjets'));
    }

    public function getAgentsAjax()
    {
        $listesAgentsAjax = Agent::all();
        //dd($listesAgentsAjax);
        return response()->json([
            'ListesAgents'=>$listesAgentsAjax
        ]);
    }

    public function showInfoAgent(Request $request)
    {
        $id = $request->id;
        $getInfosAgent = Agent::findOrfail($id);
        $projet = $getInfosAgent->projet;
        return response()->json([
            'getInfosAgent'=>$getInfosAgent,
            'projetAgent'=>$projet
        ]);  
    }

    public function listeCongeAgent($id){
        $IdAgent = $id;
        $listeCongeAgent = Agent::findOrfail($id);
        return view('Pages/Agents/listeCongeAgent',compact('listeCongeAgent','IdAgent'));
    }  

    public function listeCongeOneAgentPdf($id){
        $IdAgent = $id;
        $listeCongeOneAgent = Agent::findOrfail($id);
        //dd($IdAgent);
        return PDF::loadView('Pages/Pdf/listeCongeOneAgentPdf', compact('listeCongeOneAgent'))
                    ->stream();
        //return view('Pages/Pdf/listeCongeOneAgentPdf', compact('listeCongeOneAgent'));
    } 
}
