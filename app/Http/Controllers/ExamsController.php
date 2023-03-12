<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Exam;
use App\Models\Qcmliste;
use App\Models\Reponse;
use App\Models\ReponseEtud;
use App\Models\solution;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class ExamsController extends Controller
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
        return view('Exams.LoginEtudiant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $matricule = $request->input('Matricule');
    $Code_Exam = $request->input('Code_Exam');
        if (!Qcmliste::where('CodeExam', $Code_Exam)->exists()) {
            return redirect()->back()->with('message2', 'This Exam Is Not Exist');
        }

        if(!Etudiant::where('Matricule', $matricule)->exists()){
            return redirect()->back()->with('message', "Vous n'êtes pas Engager dans cet examen");
        }
        $Exam = new Exam();
        $Exam->Nom = $request->input('Nom');
        $Exam->Prenom = $request->input('Prenom');
        $Exam->Code_Exam = $request->input('Code_Exam');
        $Exam->Matricule = $request->input('Matricule');
        $Exam->save();
        return view('Exams.AffichageExam',[
            'Matricule'=>  $request->input('Matricule'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Matricule)
    {
        $CodeExam = Exam::where('Matricule', $Matricule)->value('Code_Exam');
        $UserId = QcmListe::where('CodeExam', $CodeExam)->value('user_id');
        $matiere = QcmListe::where('CodeExam', $CodeExam)->value('matiere');
        $Heurs = QcmListe::where('CodeExam', $CodeExam)->value('Heurs');
        $Name = User::where('id',$UserId)->value('name');
        $nombreQuestion = QcmListe::where('CodeExam', $CodeExam)->value('NbrQuestion');
        return view('Exams.DemarerExam',[
            'Matricule'=>$Matricule,
            'nombreQuestion'=>$nombreQuestion,
            'Name'=>$Name,
            'matiere'=>$matiere,
            'Heurs'=>$Heurs
        ]);
    }

    public function ResultatExam($id){
        $Etudiants = DB::table('exams')
            ->where('Code_Exam', '=', $id)
            ->select('*')
            ->get();
        return view('Exams.ResultExams',[
            'Etudiants'=>$Etudiants,
        ]);
    }

    public function ResultatEtudiant($id){

        $CodeExam = Exam::where('Matricule', $id)->value('Code_Exam');
        $idqcm = Qcmliste::where('CodeExam',$CodeExam)->value('id');

        $Sivrai =QcmListe::where('id', $idqcm)->value('Point');
        $SiFaux =QcmListe::where('id', $idqcm)->value('PointF');
        $SansReponse =QcmListe::where('id', $idqcm)->value('PointN');

        $solution = solution::select('*')->where('qcmliste_id','=',$idqcm)->get();
        $ReponseEtudiant = Reponse::select('*')->where('Matricule','=',$id)->get();
        $SolutionExam = array();
        $connect = new PDO("mysql:host=localhost;dbname=qcmdb", "root", "");
        $query = "SELECT * FROM solutions WHERE qcmliste_id=$idqcm ORDER BY id  ASC";
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
        $ReponseEtudiant = array();
        $query = "SELECT * FROM reponses WHERE Matricule=$id";
        $result = $connect->query($query);
        foreach($result as $row){
            if($row['A']==1){
                array_push($ReponseEtudiant, 1);
            }
            if($row['B']==1){
                array_push($ReponseEtudiant, 2);
            }
            if($row['C']==1){
                array_push($ReponseEtudiant, 3);
            }
            if($row['D']==1){
                array_push($ReponseEtudiant, 4);
            }
            if($row['E']==1){
                array_push($ReponseEtudiant, 5);
            }
        }
        $ResultatExam = array();
        $NoteFinale = 0;
        $NoteFinale1 = 0;
        $NoteFinale2 = 0;
        for ($i = 0; $i < count($SolutionExam); $i++) {
    if ($ReponseEtudiant[$i] == $SolutionExam[$i]) {
        $NoteFinale1 = $NoteFinale1 +  $Sivrai ;
        $ResultatExam[$i] = 'True';
        continue;
    }
    if($ReponseEtudiant[$i] != $SolutionExam[$i]){
        $ResultatExam[$i] = 'False';
        $NoteFinale2 = $NoteFinale2 +  $SiFaux ; 
    }
}

    $NoteFinale  = $NoteFinale1 + $NoteFinale2;

        return view('Exams.ResultatEtudiant',[
            'idqcm'=>$idqcm,
            'solution'=>$solution,
            'ReponseEtudiant'=>$ReponseEtudiant,
            'SolutionExam'=>$SolutionExam,
            'ResultatExam'=>$ResultatExam,
            'NoteFinale'=>$NoteFinale
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
?>