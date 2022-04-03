<?php

namespace App\Http\Controllers\AdminConge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Conge;
use App\Models\Agent;
use PDF;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listesConge = Conge::get();
        
        /*foreach ($listesConge as $item) {
           //echo ($item->id.",");
            //echo ($item->agent->nom.",");//ok
            //echo ($item->projet->intituleProjet.",");
           // dd($item->agent->id);
        }*/
        //$agentLieAuConge = $listesProjets->user_id;
        /*foreach($listesConge as $item) {
            $N = $item->agent;
            //dd($N);
            //echo $item->agent_id.',';
        }*/
       // dd($listesConge->agents());
        return view('Pages.Conge.listesConges', compact('listesConge'));
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
            "identiteId"=>'required',
            "identite"=>"required|string|min:2|max:100",  
            'projet_idConge'=>'required|max:200',
            'circonstanceConge'=>"required|max:100",
            'totalJourPrevueConge'=>'max:100',
            'congeDejaPris'=>'max:100',
            'nbrJrD'=>'max:100',
            'nbrJourR'=>'max:100',
            'explicationConge'=>'max:100',
            'dateDepart'=>'max:15',
            'dateRetour'=>'max:15', 
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            $data = [
                "agent_id" => $request->identiteId,
                "projet_id" => $request->projet_idConge,
                "circonstanceConge" => $request->circonstanceConge,
                "totalJourPrevueConge" => $request->totalJourPrevueConge,
                "congeDejaPris" => $request->congeDejaPris,
                "nbrJrD" => $request->nbrJrD,
                "nbrJourR" => $request->nbrJourR,
                "explicationConge" => $request->explicationConge,
                "dateDepart" => $request->dateDepart,
                "dateRetour" => $request->dateRetour,
                "statusConge"=> "en cours"
            ];
            //print_r($data);
            Conge::create($data);
            return response()->json(['status'=>1, 'messageSucces'=>'Enregistrement Congé avec success']);
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
        $postInfosConge = Conge::findOrfail($id);
        /*$AgentPostConge = $postInfosConge->agent->nom;
        dd($AgentPostConge);*/
        return view('Pages/Conge/postOneConges', compact('postInfosConge'));
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

    public function delete(Request $request)
    {
        $Id = $request->Id;
        $infosConge = Conge::findOrfail($Id);
        $infosConge->delete($infosConge);
    }

    public function updateStatusConge($id){

        $infosConge = Conge::findOrfail($id);
        if ($infosConge->statusConge == "encours" || $infosConge->statusConge == "en cours" ) {
            //print_r($infosConge->statusConge);
            $infosConge->update([
                'statusConge' => 'terminé'
            ]);
        }
        else{
            //print_r("terminé");
            $infosConge->update([
                'statusConge' => 'en cours'
            ]);
        }        
    }

    public function searchConge(Request $request)
    {
        $req = $request->searchCongeVal;
        $listesConge = Conge::where("circonstanceConge", 'like', '%'.$req.'%')
                                ->get();
        //dd($listesConge);
        return view('Pages.Conge.listesConges', compact('listesConge'));
    }

    /* recuperation des agents lié au projet */
    public function listeAgentsAffecteAuConge($id){
        $listeAgentsAffecteAuConge = Conge::findOrfail($id); 
        $infos = $listeAgentsAffecteAuConge->agent;
        
    }

    public function listeStaffCongeEnCoursPdf(){

        $listeStaffCongeEnCours = Conge::where('statusConge', "en cours")
                                        ->orWhere('statusConge',"encours")
                                        ->get();
        return PDF::loadView('Pages/Pdf/listeStaffCongeEnCoursPdf', compact('listeStaffCongeEnCours'))
                    ->setPaper('a4', 'landscape')
                    ->stream();

        //dd($listeStaffCongeEnCours);
        //return view('Pages/Pdf/listeStaffCongeEnCoursPdf', compact('listeStaffCongeEnCours'));
    }
}
