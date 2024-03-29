<?php

namespace App\Http\Controllers;

use App\Models\Qcmliste;
use App\Models\solution as ModelsSolution;
use Illuminate\Http\Request;
use Spatie\Ignition\Contracts\Solution;

class QcmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Qcmliste.index', [
            'listeqcm' => Qcmliste::orderBy('id', 'desc')->get(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Qcmliste.create');
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
            'Idqcm'=>'required',
            'Numquestion'=>'required',
            'Matiere'=>'required',
            'Point'=>['required','integer'],
        ]);
        $qcmliste = new Qcmliste();
        $qcmliste->idqcm = $request->input('Idqcm');
        $qcmliste->NbrQuestion = $request->input('Numquestion');
        $qcmliste->CodeExam = $request->input('CodeExam');
        $qcmliste->matiere = $request->input('Matiere');
        $qcmliste->libelle = $request->input('libelle');
        $qcmliste->Point = $request->input('Point');
        $qcmliste->PointF = $request->input('PointF');
        $qcmliste->PointN = $request->input('PointN');
        $qcmliste->Heurs = $request->input('Heurs');
        $qcmliste->user_id = auth()->user()->id;
        $qcmliste->save();
        return redirect()->route('Qcmliste.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($qcmliste)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($qcmliste)
    {
        return view('Qcmliste.edit', [
            'listeqcm'=>Qcmliste::findOrFail($qcmliste)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $qcmliste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $qcmliste)
    {
        $request->validate([
            'Idqcm'=>'required',
            'Numquestion'=>'required',
            'Matiere'=>'required',
            'Point'=>['required','integer'],
        ]);
        $UpdateQcmlliste = Qcmliste::findOrFail($qcmliste);
        $UpdateQcmlliste->idqcm = $request->input('Idqcm');
        $UpdateQcmlliste->NbrQuestion = $request->input('Numquestion');
        $UpdateQcmlliste->matiere = $request->input('Matiere');
        $UpdateQcmlliste->libelle = $request->input('libelle');
        $UpdateQcmlliste->CodeExam = $request->input('CodeExam');
        $UpdateQcmlliste->Point = $request->input('Point');
        $UpdateQcmlliste->Heurs = $request->input('Heurs');
        $UpdateQcmlliste->PointF = $request->input('PointF');
        $UpdateQcmlliste->PointN = $request->input('PointN');
        $UpdateQcmlliste->user_id = auth()->user()->id;
        $UpdateQcmlliste->save();
        return redirect()->route('Qcmliste.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($qcmliste)
    {
        $deleteQcmlliste = Qcmliste::findOrFail($qcmliste);
        $deleteQcmlliste->delete();
        return redirect()->route('Qcmliste.index');
    }
}
