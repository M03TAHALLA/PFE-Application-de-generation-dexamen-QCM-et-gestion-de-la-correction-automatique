<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Http\Request;

class ReponseEtudiantController extends Controller
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
    public function store(Request $request)
    {
        $nombreQuestion = $request->input('nombreQuestion');
        for ($i = 0; $i < $nombreQuestion; $i++) {
            for ($j = 1; $j <= $nombreQuestion; $j++) {
                $Reponse[$i][$j] = new Reponse;
                $Reponse[$i][$j]->Matricule = $request->Matricule;
                $Reponse[$i][$j]->A = $request->input('A'.$j.'') ? 1 : 0;
                $Reponse[$i][$j]->B = $request->input('B'.$j.'') ? 1 : 0;
                $Reponse[$i][$j]->C = $request->input('C'.$j.'') ? 1 : 0;
                $Reponse[$i][$j]->D = $request->input('D'.$j.'') ? 1 : 0;
                $Reponse[$i][$j]->E = $request->input('E'.$j.'') ? 1 : 0;
            }
        }
        for ($i = 0; $i < 1; $i++) {
            for ($j = 1; $j <= $nombreQuestion; $j++) {
                $Reponse[$i][$j]->save();
            }
        }
        return view('welcome',[
            'success'=>'Attendez Votre Notes Dans Votre Email'
        ]);
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
