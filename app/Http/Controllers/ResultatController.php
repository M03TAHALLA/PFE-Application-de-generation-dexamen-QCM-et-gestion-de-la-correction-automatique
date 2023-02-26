<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\question;
use App\Models\resultat;
use App\Models\solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Sabberworm\CSS\Property\Import;
use Symfony\Component\Process\Process;


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

    public function details($matricule,$id){
                include 'C:/Users/TAHALLA MOHAMMED/Desktop/Lecture-du-template-d-un-QCM-avec-OpenCV-main/depuis_qcm.php';
        for($i=0; $i<count($etudiant); $i++) {
            if($etudiant[$i][3]==$matricule){
                $nomEtudiant = $etudiant[$i][1];
                break;
            }
        }

        $solution = solution::select('*')->where('qcmliste_id','=',$id)->get();


        for($i=0; $i<count($etudiant); $i++) {
            if($etudiant[$i][3]==$matricule){
                $reponse=$etudiant[$i][4];
                break;
            }
        }        


        
        $ReponseArray = array();
        foreach(str_split($reponse) as $caractere) {
            array_push($ReponseArray, $caractere);
        }
  



        
        return view('Resultat.details',[
            'Nom'=>$nomEtudiant,
            'ReponseArray'=>$ReponseArray,
            'solution'=>$solution,
        ]);
    }

    public function Resultat(Request $request){

        $id = $request->input('id');
        $pdf = $request->file('upload');

        $etudiants = resultat::select('*')->where('idqcm','=',$id)->get(1);


        $pdf = $request->file('pdf');
        $path = Storage::disk('local')->put('/', $pdf);

        exec("C:\Users\TAHALLA MOHAMMED\Desktop\Lecture-du-template-d-un-QCM-avec-OpenCV-main\main_programme.py");



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
