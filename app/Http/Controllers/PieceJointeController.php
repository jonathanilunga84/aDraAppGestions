<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\PieceJointe;
use Illuminate\Support\Facades\Storage;
use Session;

class PieceJointeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        //$nameAgent = Agent::findOrfail(9);
        $nameAgent = Agent::find($id);
        $documents = "";
        $nomPiecejointe = $request->nomPiece;
        //dd($nameAgent);
        if ($nameAgent) {
            if($request->hasfile('docPieceJointe'))
            {   $documents = $request->file('docPieceJointe');
                $extension = $documents->getClientOriginalExtension();
                $filename = $nomPiecejointe .''. time().'.'.$extension;//$request->file('docPieceJointe');
                $documents->storeAs('public/documentsAgents', $filename);
                PieceJointe::create([
                    'agent_id' => $id,
                    'nomPiecejointe' => $nomPiecejointe,
                    'documentsAgnet'=>'documentsAgents/'.$filename
                ]);
                /*foreach($documents as $doc){
                    $extension = $doc->getClientOriginalExtension();
                    $filename = $nameAgent->nom .''. time(). '.'.$extension;//$request->file('docPieceJointe');
                    //dd($filename);
                    $doc->storeAs('public/documentsAgents', $filename);
                    PieceJointe::create([
                        'agent_id' => $id,
                        'documentsAgnet'=>'documentsAgents/'.$filename
                    ]);
                    //echo 'documentsAgents/'.$filename.'<br/>';
                }*/
                //$this->boucleMultipleDocument($documents,$nameAgent);
            }else{
                Session::flash('error','veillez selectionner un ou plusieurs document');
                return back();
                //return "veillez selectionner un ou plusieurs document";
            }
        }
        else{
            return 'pas de identité trouvé';
        }
        Session::flash('success','Enregistrement document effectué avec succes');
        return back();
    }

    public function boucleMultipleDocument($documents, $nameAgent){
        foreach($documents as $doc){
            $extension = $doc->getClientOriginalExtension();
            $filename = $nameAgent->nom .''. time(). '.'.$extension;//$request->file('docPieceJointe');
            //dd($filename);
            $doc->storeAs('public/documentsAgents', $filename);
            PieceJointe::create([
                'agent_id' => $nameAgent->id,
                'documentsAgnet'=>'documentsAgents/'.$filename
            ]);
            //echo 'documentsAgents/'.$filename.'<br/>';
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

    public function delete($id){

        $doc = PieceJointe::findOrfail($id);
        //$sup = $doc->delete();
        //print_r($sup);
        if (Storage::delete('public/'.$doc->documentsAgnet)) {
            //$sup = 
            $doc->delete();
            //print_r("ok sup");
        }
        else{
            print_r('No Sup');
        }
    }
}
