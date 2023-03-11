<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailEtudiant extends Mailable
{
    use Queueable, SerializesModels;
    public $Nom;
    public $Prenom;
    public $Matricule;
    public $CodeExam;
    public $EmailEnseignant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Nom,$Prenom,$Matricule,$CodeExam,$EmailEnseignant)
    {
        $this->Nom = $Nom;   
        $this->Prenom = $Prenom;   
        $this->Matricule = $Matricule; 
        $this->CodeExam = $CodeExam  ;
        $this->EmailEnseignant=$EmailEnseignant;


    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Mail Etudiant',
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
            markdown: 'Etudiant.Mail',
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
