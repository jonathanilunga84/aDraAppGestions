<?php

namespace App\Http\Controllers\AdminProjet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projet;
use PDF;

class ProjetController extends Controller
{
   /*public function __construct(Request $request)
    {
        $this->middleware('auth');
    } */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$listesProjets = Projet::all();
        $listesProjets = Projet::orderBy('intituleProjet', 'ASC')->paginate(20);
        $countProjetEncours = Projet::where('status', 'en cours')
                                    ->orWhere('status', 'encours')
                                    ->get();
        $myPaginateProjetExist = "";
        //dd($countProjetEncours);
        return view('Pages.Projets.listesProjets', compact('listesProjets','myPaginateProjetExist','countProjetEncours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Pages.Agents.listesAgents');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //statusProjet ="encours","terminé"
        $validator = validator::make($request->all(),[
            "numeroProjet"=>"min:2|max:100",  
            'intituleProjet'=>'required|string|min:2|max:100',
            'dateProjet'=>"required|string|min:2|max:15",
            'dateFinProjet'=>'required|string|min:2|max:15',
            'lieuProjet'=>'required|string|min:2|max:200', 
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            //print_r("validator ok");
            $data = [
                'numeroProjet' => $request->numeroProjet,
                'intituleProjet' => $request->intituleProjet,
                'dateProjet' => $request->dateProjet,
                'dateFinProjet'=>$request->dateFinProjet,
                'lieuProjet' => $request->lieuProjet,
                'status' => "en cours",
                'user_id'=> Auth()->user()->id
            ];
            Projet::create($data);
            return response()->json(['status'=>1, 'messageSucces'=>'Projet enregistrer avec success']);
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
        $postProjets = Projet::find($id);
        $nbrHomme =  $postProjets->agents->where('sexe', 'masculin')->count();
        $nbrFemme = $postProjets->agents->where('sexe', 'feminin')->count();
        //dd($nbrHomme);
        return view('Pages.Projets.postOneProjets', compact('postProjets','nbrHomme','nbrFemme'));


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
            "numeroProjetM"=>"min:2|max:100",  
            'intituleProjetModif'=>'required|string|min:2|max:100',
            'dateProjetModif'=>"required|string|min:2|max:15",
            'dateFinProjetModif'=>'required|string|min:2|max:15',
            'lieuProjetModif'=>'required|string|min:2|max:15', 
            'IdModif'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            //print_r("validator ok");
            $data = [
                'numeroProjet' => $request->numeroProjetM,
                'intituleProjet' => $request->intituleProjetModif,
                'dateProjet' => $request->dateProjetModif,
                'dateFinProjet'=>$request->dateFinProjetModif,
                'lieuProjet' => $request->lieuProjetModif,
                'status' => "en cours",
                'user_id'=> Auth()->user()->id
            ];
            $infos = Projet::find($request->IdModif);
            $infos->update($data);
            return response()->json(['status'=>1, 'messageSucces'=>'Projet Modifié avec success']);
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

    //methode ajax pour supprimer un projet
    public function delete(Request $request){
        $Id = $request->id;
        //$getProjet = Projet::find($Id);
        //print_r($getProjet);
        Projet::destroy($Id);
    }

    public function updateStatusProjet($id){
        $infosOneProjet = Projet::findOrfail($id);
        if ($infosOneProjet->status == "encours" || $infosOneProjet->status == "en cours" ) {
            //print_r($infosConge->statusConge);
            $infosOneProjet->update([
                'status' => 'terminé'
            ]);
        }
        else{
            //print_r("terminé");
            $infosOneProjet->update([
                'status' => 'en cours'
            ]);
        }
        //print_r($infosOneProjet);
    }

    public function searchProjet(Request $request)
    {
        $req = $request->intituleProjetSearch;
        //dd($req);
        $listesProjets = Projet::where("intituleProjet", 'like', '%'.$req.'%')->get();
        //dd($listesProjets);
        return view('Pages.Projets.listesProjets', compact('listesProjets'));
    }

    public function fectchOneProjetAjax(Request $request){
        $Id = $request->Id;
        $infosOneProjet = Projet::find($Id);
        //dd($listesAgentsAjax);
        return response()->json([
            'infosOneProjet'=>$infosOneProjet
        ]);
    }

    public function listeAgentsAffecteAuProjet($id){
        $IdProjet = $id;
        $listeAgentsAffecteAuProjet = Projet::findOrfail($id);
        $nbrHomme =  $listeAgentsAffecteAuProjet->agents->where('sexe', 'masculin')->count();
        $nbrFemme = $listeAgentsAffecteAuProjet->agents->where('sexe', 'feminin')->count();
        //$listeAgentsAffecteAuProjet->agents;
        $L_A_F_O_P = $listeAgentsAffecteAuProjet->agents()->orderBy('nom','ASC')->get();
        //dd($listeAgentsAffecteAuProjet->agents()->orderBy('id','DESC')->get());
        /*foreach($listeAgentsAffecteAuProjet->agents as $item){
            echo ($item->id);
        }*/
        return view('Pages/Projets/listeAgentsAffecteAuProjet', compact("listeAgentsAffecteAuProjet","L_A_F_O_P","IdProjet","nbrHomme","nbrFemme"));
    }

    public function listeAgentsEncoursAffecteAuProjetPdf($id){
        $IdProjet = $id;
        $listeAgentsEncoursAffecteAuProjet = Projet::findOrfail($IdProjet);
        $agents = $listeAgentsEncoursAffecteAuProjet->agents()->where('status',"en cours")->orderBy('nom', 'ASC')->get();
        //dd($agents);
        //view()->share('employee',$listeAgentsAffecteAuProjet);
        //return $pdf->stream();
        return PDF::loadView('Pages/Pdf/listeAgentsEncoursAffecteAuProjetPdf', compact('listeAgentsEncoursAffecteAuProjet','agents'))
                    ->setPaper('a4', 'landscape')
                    //->setPaper('a4')
                    ->setWarnings(false)
                    ->stream();
        //return view('Pages/Pdf/listeAgentsAffecteAuProjetPdf', compact("listeAgentsAffecteAuProjet"));
    }

    public function listeAgentsEncoursTermineAffecteAuProjetPdf($id){
        $IdProjet = $id;
        $listeAgentsEncoursAffecteAuProjet = Projet::findOrfail($IdProjet);
        $agents = $listeAgentsEncoursAffecteAuProjet->agents()->orderBy('nom', 'ASC')->get();//->where('status',"en cours");
        //dd($agents);
        //view()->share('employee',$listeAgentsAffecteAuProjet);
        //return $pdf->stream();
        return PDF::loadView('Pages/Pdf/listeAgentsEncoursAffecteAuProjetPdf', compact('listeAgentsEncoursAffecteAuProjet','agents'))
                    ->setPaper('a4', 'landscape')
                    //->setPaper('a4')
                    ->setWarnings(false)
                    ->stream();
        //return view('Pages/Pdf/listeAgentsAffecteAuProjetPdf', compact("listeAgentsAffecteAuProjet"));
    }

    public function listeAgentsAffecteAuProjetQuiOnDesCongesPdf($id){
        $Idprojet = $id;
        $projet = Projet::findOrfail($id);
        //$conges = $projet->congeAgentProjet->sortByDesc('nom'); //OK
        $conges = $projet->congeAgentProjet->sortByDesc('nom'); //OK
        //dd($conges);
        return PDF::loadView('Pages/Pdf/listeAgentsAffecteAuProjetQuiOnDesCongesPdf', compact('conges','projet'))
                    ->setPaper('a4', 'landscape')
                    //->setPaper('a4')
                    ->setWarnings(false)
                    ->stream();
        //return view('Pages/Pdf/listeAgentsAffecteAuProjetQuiOnDesCongesPdf', compact('conges','projet'));
    }

    public function fectchAllProjetAjax(){
        $listesProjets = Projet::get();
        $output = ' ';
        //print_r($listesProjets);

        if ($listesProjets->count() > 0) {
           echo $output .= '<tbody><td>BJR</td>';
            /*foreach ($listesProjets as $item) {
                $output .= '<tr>
                    <td>'.$item->numeroProjet.'</td>
                    <td>'.$item->lieuProjet.'</td>
                </tr>';
            }*/
            $output .= '</tbody>';
        }
        else{
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }

    }
}
