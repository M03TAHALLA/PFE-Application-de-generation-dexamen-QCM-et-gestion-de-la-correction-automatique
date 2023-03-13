<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNoteEtudiant extends Mailable
{
    use Queueable, SerializesModels;
    public $Nom;
    public $Prenom;
    public $Matricules;
    public $CodeExam;
    public $Note;
    public $NombreQuestion;
    public $EmailEnseignant;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Nom,$Prenom,$Matricules,$Note,$NombreQuestion,$EmailEnseignant,$name)
    {
        $this->Nom = $Nom;   
        $this->Prenom = $Prenom;   
        $this->Matricules = $Matricules; 
        $this->Note=$Note;
        $this->NombreQuestion=$NombreQuestion;
        $this->EmailEnseignant = $EmailEnseignant;
        $this->name = $name;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Mail Note Etudiant',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'Etudiant.MailNoteEtudiant',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
