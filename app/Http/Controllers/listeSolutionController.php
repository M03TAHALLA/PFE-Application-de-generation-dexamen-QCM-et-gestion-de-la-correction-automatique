<?php

namespace App\Http\Controllers;

use App\Imports\ImportSolution;
use App\Models\Listesolution;
use App\Models\Qcmliste;
use App\Models\solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Ignition\Contracts\Solution as ContractsSolution;
use TCPDF;



class listeSolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Solution.suiver');
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
        $id = $request->idqcm;
        $count = DB::table('solutions')->where('qcmliste_id',$id)->count();

if ($count > 0) {
    DB::table('solutions')
    ->where('qcmliste_id', $request->idqcm)
    ->limit($count)
    ->delete();
}
        $nbrqustion = $request->input('NbrQuestion');
        for ($i = 0; $i < 1; $i++) {
            for ($j = 1; $j <= $nbrqustion; $j++) {
                $solution[$i][$j] = new Solution;
                $solution[$i][$j]->qcmliste_id = $request->idqcm;
                $solution[$i][$j]->A = $request->input('A'.$j.'') ? 1 : 0;
                $solution[$i][$j]->B = $request->input('B'.$j.'') ? 1 : 0;
                $solution[$i][$j]->C = $request->input('C'.$j.'') ? 1 : 0;
                $solution[$i][$j]->D = $request->input('D'.$j.'') ? 1 : 0;
                $solution[$i][$j]->E = $request->input('E'.$j.'') ? 1 : 0;
                $solution[$i][$j]->created_at=$request->input('created_at');
            }


        }
        for ($i = 0; $i < 1; $i++) {
            for ($j = 1; $j <= $nbrqustion; $j++) {
                $solution[$i][$j]->save();
            }
        }
        return redirect()->back()->with([
            'success' => 'La solution Ajouteés',
        ]);
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($qcmliste)
    {
        return view('Solution.suiver', [
            'listeqcm'=>Qcmliste::findOrFail($qcmliste),
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
