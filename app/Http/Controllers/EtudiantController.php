<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Qcmliste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EtudiantController extends Controller
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
    public function create($id)
    {
        return view('Etudiant.createEtud',[
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Matricule'=>'required',
            'Nom'=>'required',
            'Prenom'=>['required']
        ]);
        $etudiant = new Etudiant();
        $etudiant->Matricule = $request->input('Matricule');
        $etudiant->Nom = $request->input('Nom');
        $etudiant->Prenom = $request->input('Prenom');
        $etudiant->idEtud = $request->input('idqcm');
        $etudiant->save();
        return Redirect()->route('etudiant.show',$request->input('idqcm'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::select('*')->distinct()->get();
        $duplicates = DB::table('etudiants')
            ->select('Nom', 'Prenom','Matricule', DB::raw('count(*) as total'))
            ->groupBy('Nom', 'Prenom','Matricule')
            ->havingRaw('count(*) > 1')
            ->get();
        foreach ($duplicates as $duplicate) {
            DB::table('etudiants')
                ->where('Nom', $duplicate->Nom)
                ->where('Prenom', $duplicate->Prenom)
                ->where('Matricule', $duplicate->Prenom)
                ->limit($duplicate->total - 1)
                ->delete();
        }
        $NombreEtudiant = Etudiant::count();
        return view('Etudiant.Etud',[
            'etudiant'=>$etudiant,
            'NombreEtudiant'=>$NombreEtudiant,
            'id'=>$id,
        ]);
    }
    public function createEtudiant($id){
        return view('Etudiant.createEtud',[
            'id'=>$id
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
        return view('Etudiant.editEtudiant',[
            'etudiant'=>Etudiant::findOrFail($id),

        ]);
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
        $request->validate([
            'Matricule'=>'required',
            'Nom'=>'required',
            'Prenom'=>['required']
        ]);
        $UpdateEtud = Etudiant::findOrFail($id);
        $UpdateEtud->Matricule = $request->input('Matricule');
        $UpdateEtud->Nom = $request->input('Nom');
        $UpdateEtud->Prenom = $request->input('Prenom');
        $UpdateEtud->idEtud = $request->input('idqcm');
        $UpdateEtud->save();
        return Redirect()->route('etudiant.show',$request->input('idqcm'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteEtud = Etudiant::findOrFail($id);
        $deleteEtud->delete();
        return redirect()->route('etudiant.show',$deleteEtud->idEtud);
    }
  
}
