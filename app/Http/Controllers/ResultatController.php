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
        include 'C:/xampp/htdocs/QCMProject/public/depuis_qcm.php';
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
