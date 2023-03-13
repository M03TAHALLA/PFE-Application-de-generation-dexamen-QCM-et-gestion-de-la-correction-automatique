<?php

namespace App\Http\Controllers;

use App\Mail\MailEtudiant;
use App\Mail\MailNoteEtudiant;
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
        $Matricules = DB::table('exams')
        ->where('Code_Exam', '=', $id)
        ->pluck('Matricule');

        $Nom = DB::table('exams')
        ->where('Code_Exam', '=', $id)
        ->pluck('Nom');

        $Prenom = DB::table('exams')
        ->where('Code_Exam', '=', $id)
        ->pluck('Prenom');

        $Emails = DB::table('etudiants')
            ->join('exams', 'etudiants.Matricule', '=', 'exams.Matricule')
            ->whereIn('exams.Matricule', $Matricules)
            ->pluck('etudiants.Email');

        $Note = DB::table('note_etuds')
            ->join('exams', 'note_etuds.Matricule', '=', 'exams.Matricule')
            ->whereIn('exams.Matricule', $Matricules)
            ->pluck('note_etuds.NoteFinale');

        $NombreQuestion = Qcmliste::where('CodeExam', $id)->value('NbrQuestion');


        $iduser = Qcmliste::where('CodeExam', $id)->value('user_id');

        $EmailEnseignant = User::where('id', $iduser)->value('email');

        $name = User::where('id', $iduser)->value('name');


        for($i=0;$i < count($Emails);$i++){
        Mail::to($Emails[$i])->send(new MailNoteEtudiant($Nom[$i],$Prenom[$i],$Matricules[$i],$Note[$i],$NombreQuestion,$EmailEnseignant,$name));
        }
        return redirect()->back()->with('success', 'Emails Envoyé Avec success');
    }
}
