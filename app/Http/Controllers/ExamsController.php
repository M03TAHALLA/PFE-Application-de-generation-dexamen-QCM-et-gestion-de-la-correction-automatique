<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Qcmliste;
use App\Models\ReponseEtud;
use App\Models\User;
use Illuminate\Http\Request;

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
        if (Exam::where('Matricule', $matricule)->exists()) {
            return redirect()->back()->with('message', 'Matricule already exists in Exams');
        }

        if (!Qcmliste::where('CodeExam', $Code_Exam)->exists()) {
            return redirect()->back()->with('message2', 'This Exam Is Not Exist');
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

    public function StoreReponseEtud(Request $request){
        $ReponseEtud = new ReponseEtud();
        

    }

    public function StoreReponses(Request $request){
        $ReponseEtud = new ReponseEtud();

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
        $nombreQustion = QcmListe::where('CodeExam', $CodeExam)->value('NbrQuestion');
        return view('Exams.DemarerExam',[
            'Matricule'=>$Matricule,
            'nombreQustion'=>$nombreQustion,
            'Name'=>$Name,
            'matiere'=>$matiere,
            'Heurs'=>$Heurs
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