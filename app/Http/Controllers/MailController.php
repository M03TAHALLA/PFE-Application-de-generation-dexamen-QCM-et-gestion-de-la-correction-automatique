<?php

namespace App\Http\Controllers;

use App\Mail\MailEtudiant;
use App\Models\Qcmliste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($id){
        $Mails = DB::table('etudiants')
                ->where('idEtud', $id)
                ->pluck('Email')
                ->toArray();
        $Nom = DB::table('etudiants')
        ->where('idEtud', $id)
        ->pluck('Nom')
        ->toArray();
        $Prenom = DB::table('etudiants')
        ->where('idEtud', $id)
        ->pluck('Prenom')
        ->toArray();
        $Matricule = DB::table('etudiants')
        ->where('idEtud', $id)
        ->pluck('Matricule')
        ->toArray();
        $CodeExam = Qcmliste::where('id', $id)->value('CodeExam');
        $UserId = Qcmliste::where('id', $id)->value('user_id');
        $EmailEnseignant = User::where('id', $UserId)->value('email');

        for($i=0;$i < count($Mails);$i++){
        Mail::to($Mails[$i])->send(new MailEtudiant($Nom[$i],$Prenom[$i],$Matricule[$i],$CodeExam,$EmailEnseignant));
        }
        return redirect()->back()->with('success', 'Emails Envoyé Avec success');
    }

    public function sendNotes($id){
        $Mails = DB::table('etudiants')
                ->where('idEtud', $id)
                ->pluck('Email')
                ->toArray();
        $Nom = DB::table('etudiants')
        ->where('idEtud', $id)
        ->pluck('Nom')
        ->toArray();
        $Prenom = DB::table('etudiants')
        ->where('idEtud', $id)
        ->pluck('Prenom')
        ->toArray();
        $Matricule = DB::table('etudiants')
        ->where('idEtud', $id)
        ->pluck('Matricule')
        ->toArray();
        $CodeExam = Qcmliste::where('id', $id)->value('CodeExam');
        $UserId = Qcmliste::where('id', $id)->value('user_id');
        $EmailEnseignant = User::where('id', $UserId)->value('email');

        for($i=0;$i < count($Mails);$i++){
        Mail::to($Mails[$i])->send(new MailEtudiant($Nom[$i],$Prenom[$i],$Matricule[$i],$CodeExam,$EmailEnseignant));
        }
        return redirect()->back()->with('success', 'Emails Envoyé Avec success');
    }
}
