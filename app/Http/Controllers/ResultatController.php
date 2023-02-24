<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\question;
use App\Models\resultat;
use App\Models\solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Resultat.Scan',[
            'id'=>$id
        ]);

    }

    public function details($matricule){
        $question = question::select('*')->where('Matricule','=',$matricule)->get();

        $nomEtudiant = DB::table('resultats')
                ->where('Matricule', $matricule)
                ->value('NPetudiants');
        $id = DB::table('resultats')
        ->where('Matricule', $matricule)
        ->value('idqcm');

        

        $solution = solution::select('*')->where('qcmliste_id','=',$id)->get();  
        
        
        return view('Resultat.details',[
            'question' => $question,
            'Nom'=>$nomEtudiant,
            'id'=>$id,
            'solution'=>$solution,
        ]);
    }

    public function Resultat(Request $request){

        $id = $request->input('id');
        $pdf = $request->input('upload');

        $etudiants = resultat::select('*')->where('idqcm','=',$id)->get(1);

        return view('Resultat.result',[
            'id' => $id,
            'pdf'=>$pdf,
            'etudiants' => $etudiants
        ]);
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
