<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Qcmliste;
use App\Models\question;
use App\Models\resultat;
use App\Models\solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDO;
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
    public function Exam(){
        return view('Exams.LoginEtudiant');

    }

    public function details($matricule,$id){


        include 'C:/xampp/htdocs/QCMProject/public/depuis_qcm.php';

        for($i=0; $i<count($etudiant); $i++) {
            if($etudiant[$i][3]==$matricule){
                $nomEtudiant = $etudiant[$i][1];
                break;
            }
        }

        $Matiere = $etudiant[0][2];


        $solution = solution::select('*')->where('qcmliste_id','=',$id)->get();

        $Sivrai =QcmListe::where('id', $id)->value('Point');
        $SiFaux =QcmListe::where('id', $id)->value('PointF');
        $SansReponse =QcmListe::where('id', $id)->value('PointN');




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
        $SolutionExam = array();
        $connect = new PDO("mysql:host=localhost;dbname=qcmdb", "root", "");
        $query = "SELECT * FROM solutions WHERE qcmliste_id=$id ORDER BY id  ASC";
        $result = $connect->query($query);
        foreach($result as $row){
            if($row['A']==1){
                array_push($SolutionExam, 1);
            }
            if($row['B']==1){
                array_push($SolutionExam, 2);
            }
            if($row['C']==1){
                array_push($SolutionExam, 3);
            }
            if($row['D']==1){
                array_push($SolutionExam, 4);
            }
            if($row['E']==1){
                array_push($SolutionExam, 5);
            }
        }


        $ResultatExam = array();
        $NoteFinale = 0;
        $NoteFinale1 = 0;
        $NoteFinale2 = 0;
        for ($i = 0; $i < count($ReponseArray); $i++) {
    if ($ReponseArray[$i] == $SolutionExam[$i]) {
        $NoteFinale1 = $NoteFinale1 +  $Sivrai ;
        $ResultatExam[$i] = 'True';
        continue;
    }
    if($ReponseArray[$i] != $SolutionExam[$i]){
        $ResultatExam[$i] = 'False';
        $NoteFinale2 = $NoteFinale2 +  $SiFaux ; 
    }
}

    $NoteFinale  = $NoteFinale1 + $NoteFinale2;

    
        return view('Resultat.details',[
            'Nom'=>$nomEtudiant,
            'ReponseArray'=>$ReponseArray,
            'solution'=>$solution,
            'SolutionExam'=>$SolutionExam,
            'ResultatExam'=>$ResultatExam,
            'Matiere'=>$Matiere,
            'NoteFinale'=> $NoteFinale
        ]);
        
    }

    public function Resultat(Request $request){
        $studentName = 'Etudiant';
        // Supprime tous les fichiers existants dans le dossier "public/uploads"
Storage::deleteDirectory('public/uploads');

// Crée un nouveau dossier vide "public/uploads"
Storage::makeDirectory('public/uploads');

        $path = $request->file('pdf')->storeAS('public/uploads', $studentName . '.pdf');

        $comande1 = '"C:/Users/TAHALLA MOHAMMED/AppData/Local/Programs/Python/Python311/python.exe" c:/xampp/htdocs/QCMProject/app/Console/PythonSplit/Pdf.py';
        shell_exec($comande1);

        Storage::delete('public/uploads/Etudiant.pdf');



    $command = '"C:/Users/TAHALLA MOHAMMED/AppData/Local/Programs/Python/Python311/python.exe" c:/xampp/htdocs/QCMProject/app/Console/Pyhton/main_programme.py';
    shell_exec($command);

        $id = $request->input('id');
        $pdf = $request->file('upload');

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
