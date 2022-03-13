<?php

namespace App\Http\Controllers\AdminProjet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projet;

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
        $listesProjets = Projet::all();
        //dd($listesProjets);
        return view('Pages.Projets.listesProjets', compact('listesProjets'));
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
        $validator = validator::make($request->all(),[
            "numeroProjet"=>"required|string|min:2|max:100",  
            'intituleProjet'=>'required|string|min:2|max:100',
            'dateProjet'=>"required|string|min:2|max:15",
            'dateFinProjet'=>'required|string|min:2|max:15',
            'lieuProjet'=>'required|string|min:2|max:15', 
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
