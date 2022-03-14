<?php

namespace App\Http\Controllers\AdminAgent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projet;
use App\Models\Agent;
use App\Models\User;

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
        //dd($mail);
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
            'postnom'=>'required|string|min:2|max:100',
            'prenom'=>"required|string|min:2|max:15",
            'sexe'=>'required|string|min:2|max:15',
            'etatCivil'=>'required|string|min:2|max:100',
            'telephone'=>'required|string|min:2|max:15', 
            'lieuNaissance'=>'string|min:2|max:200',
            'email'=>'string|min:2|max:100',
            'NumCarteIdentite'=>'string|min:2|max:100',
            'nationalite'=>'string|min:2|max:100',
            'adresseResidence'=>'string|min:2|max:200',
            'NumCompteBancaire'=>'string|min:2|max:200',
            'projet_id'=>'required|string|max:200',
            'fonction'=>'string|min:2|max:200',
            'lieuAffectation'=>'string|min:2|max:200',
            'dateNaissance'=>'string|min:2|max:15',
            'dateDebut'=>'string|min:2|max:15',
            'dateFinPrevue'=>'string|min:2|max:15',
            'DateFinEffective'=>'string|min:2|max:15',
            'DureeContratMois'=>'string|min:2|max:15',
            'DureeContratJour'=>'string|min:2|max:15',
            'status'=>'string|min:2|max:100'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            //print_r("validator ok"); $UserNamePseudo.''."@gmail.com",
            $UserNamePseudo = $request->nom.''.$datas = date('dy');
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
