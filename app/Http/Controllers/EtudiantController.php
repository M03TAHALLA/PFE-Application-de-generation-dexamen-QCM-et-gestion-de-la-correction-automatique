<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Qcmliste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use TCPDF;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
    }

    public function PDF($id)
    {
        $etudiant = Etudiant::where('idEtud', $id)->get();
        $nombreQustion = QcmListe::where('id', $id)->value('NbrQuestion');
        $Cours = QcmListe::where('id', $id)->value('matiere');
        // Step 1: Establish database connection
        $pdf = new TCPDF();
        
        // set document information
    $pdf->SetTitle('Etudiants');
    foreach ($etudiant as $etud) {
        $spaceNom  =33;
    $pdf->SetTextColor(0, 0, 0);
    $pdf->AddPage();
    // set color for background
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetLineWidth(0.25);
    $pdf->Rect(9.025, 6.1, 187.5, 8.45, 'DF');

    $pdf->Rect(26.6,7.4, 3.34,2.1 , 'DF');
    $pdf->setFont('helvetica','',5);
    $pdf->Text(26.7, 7.5, 'A');

    $pdf->Rect(47,7.4, 3.35,2.1 , 'DF');
    $pdf->setFont('helvetica','',5);
    $pdf->Text(47.1, 7.5, 'B');

    $pdf->Rect(67.1,7.4, 3.34,2.1 , 'DF');
    $pdf->setFont('helvetica','',5);
    $pdf->Text(67.3, 7.5, 'C');

    $pdf->Rect(87.5,7.4, 3.34,2.1 , 'DF');
    $pdf->setFont('helvetica','',5);
    $pdf->Text(87.6, 7.5, 'D');
    
    $pdf->Rect(117.9,7.4, 3.34,2.1 , 'DF');
    $pdf->setFont('helvetica','',5);
    $pdf->Text(117.9, 7.5, 'D');

    $pdf->Rect(138.3,7.4, 3.34,2.1 , 'DF');
    $pdf->setFont('helvetica','',5);
    $pdf->Text(138.3, 7.5, 'C');
      
    $pdf->Rect(158.4,7.4, 3.34,2.1 , 'DF');
    $pdf->setFont('helvetica','',4.9);
    $pdf->Text(158.5, 7.5, 'B');

    $pdf->Rect(178.8,7.4, 3.34,2.1 , 'DF');
    $pdf->setFont('helvetica','',4.9);
    $pdf->Text(178.9, 7.5, 'D');

    $pdf->setFont('helvetica','B',7.7);
    $pdf->Text(35.2, 10.5, 'Remplissez soigneusement dans ce cadre les cases qui correspondent au codage de votre questionnaire');

    $pdf->setFont('helvetica','',10);
    $pdf->Text(8.1, 15, 'Nom/Prénom :');
    $pdf->Text(7.2, 20.5, 'Cours/Section :');

    $j=33.6;
    for($i=0;$i<31;$i++){
      $pdf->SetLineWidth(0.23);
      $pdf->Rect($j, 15.1, 2.89, 5, 'DF');
      $j=$j+2.91;
      }
      $pdf->setFont('helvetica','',7);
      $longueur = strlen($etud->Nom);
      for ($i = 0; $i < $longueur; $i++) {
        // Obtenir la lettre courante
        $lettreNom = $etud->Nom[$i];
      $pdf->Text($spaceNom, 16, strtoupper($lettreNom));
      $spaceNom = $spaceNom + 2.9;
      }
      for ($i = 0; $i < $longueur; $i++) {
        $longueur = strlen($etud->Prenom);
      $lettrePrenom = $etud->Prenom[$i];
      $pdf->Text($spaceNom + 3.2, 16,strtoupper($lettrePrenom));
      $spaceNom = $spaceNom + 2.9 ;
      }
     
      $pdf->setFont('helvetica','',10);

      $j=33.6;
    for($i=0;$i<31;$i++){
      $pdf->SetLineWidth(0.23);
      $pdf->Rect($j, 20.4, 2.89, 5, 'DF');
      $j=$j+2.91;
      }

      $pdf->setFont('helvetica','',8);
      $pdf->setFontSpacing(1);
      $spaceCours = 32.9;
      $longueurC = strlen($Cours);
      for ($i = 0; $i < $longueurC; $i++) {
        // Obtenir la lettre courante
        $lettreCour = $Cours[$i];
      $pdf->Text($spaceCours, 21, strtoupper($lettreCour));
      $spaceCours = $spaceCours + 2.9;
      }
      $pdf->setFontSpacing(0);  

      $pdf->Text(60.5, 26.1, "Date de l'évaluation :");
      $j=94.8;
      for($i=0;$i<10;$i++){
        if($i==2 || $i==5){
          $pdf->Rect($j, 26.2, 2.89, 5, 'DF');
          $pdf->setFont('helvetica','B',14);
          $j=$j+2.91;
        }else{
          $pdf->setFont('helvetica','',10);
      $pdf->Rect($j, 26.2, 2.89, 5, 'DF');
      $j=$j+2.89;
        }
      }

      $pdf->SetFillColor(0, 0, 0);
      $pdf->Rect(8.8, 27.5, 46,5, 'DF');
      $pdf->setFont('helvetica','B',10);
      $pdf->SetTextColor(255, 255, 255); // white text
      $pdf->Text(8.8, 27.5, 'Consignes de marquage');
      $pdf->SetFillColor(255, 255, 255);
      $pdf->SetLineWidth(0.5);
      $pdf->Rect(8.9, 32, 115.5 ,28, 'DF');
      $pdf->SetLineWidth(0.23);
      $pdf->setFont('helvetica','',8);
      $pdf->SetTextColor(0, 0, 0); // white text
      $pdf->Text(9.5, 34.9, "Remplissez à l'aide d'un bic noir/bleu foncé (ni crayon, ni feutre) une seule case par ligne.");
      $pdf->SetFont('helvetica', '', 10);
      $pdf->SetTextColor(0, 0, 0);
      $part_to_underline = "bic noir/bleu foncé";
      $part_width = $pdf->GetStringWidth($part_to_underline);
      $pdf->SetLineWidth(0.25);
      $pdf->Line(2 + $pdf->GetStringWidth("Remplissez à l'aide d"), 36 + 2, 2 + $pdf->GetStringWidth("Remplissez à llllls") + $part_width, 36 + 2);

      $pdf->SetFont('helvetica', '', 8);
      $pdf->Text(9.5, 39, "> Noircissez complètement le");
      $pdf->SetFillColor(0, 0, 0);
      $pdf->Rect(48.9, 40, 4.2, 2, 'DF');
      $pdf->Text(8.5, 45, "> En cas d'erreur, ne raturez pas sur la première ligne ");
      $pdf->SetFont('helvetica', '', 10);
      $pdf->Text(78, 45, "-- >");
      $pdf->SetFont('helvetica', '', 8);
      $pdf->SetFillColor(0, 0, 0);
      $pdf->Rect(92.4,45.3, 3.35,2.1, 'DF');
      $pdf->SetFillColor(255, 255, 255);
      $pdf->Rect(98,45.5, 3.35,2.1, 'DF');
      $pdf->SetFillColor(0, 0, 0);
      $pdf->Rect(103,45.5, 3.35,2.1, 'DF');
      $pdf->SetFillColor(255, 255, 255);
      $pdf->Rect(108,45.5, 3.35,2.1, 'DF');
      $pdf->Rect(113,45.5, 3.35,2.1, 'DF');
      $pdf->Rect(118,45.5, 3.35,2.1, 'DF');
      $pdf->Line(94.1 - 3, 46.5 - 3, 94.1 + 3, 46.5 + 3);
      $pdf->Line(94.1 - 3, 46.5 + 3, 94.1 + 3, 46.5 - 3);


      $pdf->Text(8.5, 49, "utilisez la seconde ligne pour choisir la réponse définitive");
      $pdf->SetFont('helvetica', '', 10);
      $pdf->Text(81, 49, "-- >");
      $pdf->SetFont('helvetica', '', 8);
      $pdf->SetFillColor(255, 255, 255);
      $pdf->Rect(93,49.7, 3.35,2.1, 'DF');
      $pdf->Rect(98,49.7, 3.35,2.1, 'DF');
      $pdf->SetFillColor(0, 0, 0);
      $pdf->Rect(103,49.7, 3.35,2.1, 'DF');
      $pdf->SetFillColor(255, 255, 255);
      $pdf->Rect(108,49.7, 3.35,2.1, 'DF');
      $pdf->Rect(113,49.7, 3.35,2.1, 'DF');
      $pdf->Rect(118,49.7, 3.35,2.1, 'DF');
      $pdf->SetFont('helvetica', '', 8.2);
      $pdf->Text(46, 52.5, "> N'inscrivez RIEN sur les bords de page !");
      $pdf->Text(46, 55.5, "> La correction est entièrement automatisée par ordinateur");
      $pdf->SetFont('helvetica', '', 8);
      $pdf->SetFillColor(0, 0, 0);
      $pdf->Rect(125.7, 15, 70.9,4.2, 'DF');
      $pdf->setFont('helvetica','B',10);


    $pdf->SetTextColor(255, 255, 255); // white text
    $pdf->Text(135, 14.9, 'Completez ici Votre Matricule :');
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetLineWidth(0.25);
    $pdf->Rect(125.7, 19.1, 70.8 ,41, 'DF');
    $pdf->SetTextColor(0, 0, 0); 
    $pdf->setFont('helvetica','',9);
    $pdf->Text(137.7 , 20.5, 'P');
    $pdf->Rect(143.35, 21.15,3.34,2.1, 'DF');
    $pdf->setFont('helvetica','',9.7);
    $pdf->Text(126.6, 27, 'chiffre 1');
    $pdf->Text(126.6,33.7, 'chiffre 2');
    $pdf->Text(126.6, 40.4, 'chiffre 3');
    $pdf->Text(126.6,47.1, 'chiffre 4');
    $pdf->Text(126.6, 53.8, 'chiffre 5');
    $pdf->SetLineWidth(0.5);
    $pdf->setFont('helvetica','',5);
    $pdf->SetLineWidth(0.5);
    $pdf->Line(141.4, 39 - 20, 141.4, 39 + 20);
    $j=28;
    $k=28;
    $matricule =$etud->Matricule; 
    $chiffres = str_split($matricule);
    for($i=0;$i<5;$i++){
        $pdf->SetLineWidth(0.25);
        for($mat = 0; $mat < count($chiffres); $mat++){
            if($chiffres[$mat]==0){
            $pdf->SetFillColor(0, 0, 0);
            $pdf->Rect(143.3, $j, 3.36,2.1, 'DF');
            $pdf->SetFillColor(255, 255, 255);
            }else{
                $pdf->Rect(143.3, $j, 3.36,2.1, 'DF');
            }
    $pdf->Text(143.6, $k, '0');
    if($chiffres[$mat]==1){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(148.3, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(148.3, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(148.6, $k, '1');
    if($chiffres[$mat]==2){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(153.3, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(153.3, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(153.49, $k, '2');
    if($chiffres[$mat]==3){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(158.3, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(158.3, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(158.45, $k, '3');
    if($chiffres[$mat]==4){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(163.6, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(163.6, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(163.8, $k, '4');
    if($chiffres[$mat]==5){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(168.7, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(168.7, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(168.9, $k, '5');
    if($chiffres[$mat]==6){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(173.7, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(173.7, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(173.9, $k, '6');
    if($chiffres[$mat]==7){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(178.7, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(178.7, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(179, $k, '7');
    if($chiffres[$mat]==8){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(183.8, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(183.8, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(183.9, $k, '8');
    if($chiffres[$mat]==9){
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(189, $j, 3.36,2.1, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        }else{
            $pdf->Rect(189, $j, 3.36,2.1, 'DF');
        }
    $pdf->Text(189.3, $k, '9');
    $j=$j+6.9;
    $k=$k+6.88;
        }
        break;
    }

    $pdf->SetFillColor(0, 0, 0);
    $pdf->Rect(8.7, 61, 188,4.5, 'DF');
    $pdf->setFont('helvetica','B',9.8);
    $pdf->SetTextColor(255, 255, 255); // white text
    $pdf->Text(71, 61.2, 'QUESTIONNAIRE A CHOIX MULTIPLE');
    $pdf->setFont('helvetica','',11);
    $pdf->SetTextColor(255, 255, 255); // white text
    $pdf->Text(18, 69, '1');
    $longeurline1 = $longeurline2 = $longeurline3  =   67.5;
    $largeurline1 = $largeurline2 = $largeurline3  = 71;

    $longeurline4 = $longeurline5 = $longeurline6  =   9.08;
    $largeurline4 = $largeurline5 = $largeurline6  = 13.08;

for($i=1; $i<= $nombreQustion ;$i++){

    if($i>0 && $i<=15){
        if($i>=10){
            $pdf->SetLineWidth(0.25);
        $pdf->setFont('helvetica','B',11);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(18.5, $longeurline1, 54,12.6, 'DF');
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(18.5, $longeurline1, 5.2,12.6, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(26.5, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(26.5, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(26.7, $largeurline1-1.79, '1');
        $pdf->Text(26.7, $largeurline1+5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(26.7, $largeurline1+1, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(31.6, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(31.6, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','B',5);
        $pdf->Text(32, $largeurline1-1.79, '2');
        $pdf->Text(32, $largeurline1+5, '2');
        
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(36.7, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(36.7, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(37, $largeurline1-1.75, '3');
        $pdf->Text(37, $largeurline1+5, '3');
        $pdf->setFont('helvetica','B',11);
      

        $pdf->Rect(41.8, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(41.8, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(42, $largeurline1-1.75, '4');
        $pdf->Text(42, $largeurline1+5, '4');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(46.9, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(46.9, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(47.2, $largeurline1-1.75, '5');
        $pdf->Text(47.2, $largeurline1+5, '5');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(52, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(52, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(52.1, $largeurline1-1.75, 'A');
        $pdf->Text(52.1, $largeurline1+5, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(57.1, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(57.1, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(57.1, $largeurline1-1.75, 'T');
        $pdf->Text(57.1, $largeurline1+5, 'T');
        $pdf->setFont('helvetica','B',10);
        
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(18.5, $largeurline1+0.95, $i);
        $longeurline1= $longeurline1+13.7;
        $largeurline1 = $largeurline1 + 13.7;
        $pdf->SetTextColor(0, 0, 0);
        }else{
        $pdf->setFont('helvetica','B',11);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(18.5, $longeurline1, 54,12.6, 'DF');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(26.5, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(26.5, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(26.7, $largeurline1-1.7, '1');
        $pdf->Text(26.7, $largeurline1+5.1, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(26.7, $largeurline1+1, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);

          $pdf->Rect(31.6, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(31.6, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',4.5);
        $pdf->Text(31.9, $largeurline1-1.7, '2');
        $pdf->Text(31.9, $largeurline1+5.1, '2');
        $pdf->setFont('helvetica','B',11);


        $pdf->Rect(36.7, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(36.7, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(36.9, $largeurline1-1.7, '3');
        $pdf->Text(36.9, $largeurline1+5.1, '3');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(41.8, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(41.8, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(42, $largeurline1-1.75, '4');
        $pdf->Text(42, $largeurline1+5.1, '4');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(46.9, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(46.9, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(47.1, $largeurline1-1.75, '5');
        $pdf->Text(47.1, $largeurline1+5.1, '5');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(52, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(52, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(52.1, $largeurline1-1.75, 'A');
        $pdf->Text(52.1, $largeurline1+5.1, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(57.1, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(57.1, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(57.2, $largeurline1-1.75, 'T');
        $pdf->Text(57.2, $largeurline1+5.1, 'T');
        $pdf->setFont('helvetica','B',11);


        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(18.5, $longeurline1, 5.2,12.6, 'DF');
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(19.5, $largeurline1+0.95, $i);
        $longeurline1= $longeurline1+13.7;
        $largeurline1 = $largeurline1 + 13.7;
        $pdf->SetTextColor(0, 0, 0);
       
    }
    }
    if($i>15 && $i<=30){
        $pdf->SetLineWidth(0.25);
        $pdf->setFont('helvetica','B',11);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(80.1, $longeurline2, 54,12.6, 'DF');
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(80.1, $longeurline2, 5.2,12.6, 'DF');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(87.4, $longeurline2+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(87.4, $longeurline2+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(87.6, $largeurline2-1.79, '1');
        $pdf->Text(87.6,$largeurline2+5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(89, $largeurline2+1, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(92.5, $longeurline2+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(92.5, $longeurline2+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(92.8, $largeurline2-1.79, '2');
        $pdf->Text(92.8, $largeurline2+5, '2');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(97.5, $longeurline2+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(97.5, $longeurline2+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(97.7, $largeurline2-1.79, '3');
        $pdf->Text(97.7, $largeurline2+5, '3');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(102.5, $longeurline2+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(102.5, $longeurline2+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(102.5, $largeurline2-1.79, '4');
        $pdf->Text(102.5, $largeurline2+5, '4');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(107.7, $longeurline2+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(107.7, $longeurline2+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(107.8, $largeurline2-1.79, '5');
        $pdf->Text(107.8, $largeurline2+5, '5');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(112.8, $longeurline2+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(112.8, $longeurline2+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(112.9, $largeurline2-1.79, 'A');
        $pdf->Text(112.9, $largeurline2+5, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(117.9, $longeurline2+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(117.9, $longeurline2+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(118, $largeurline2-1.79, 'T');
        $pdf->Text(118, $largeurline2+5, 'T');
        $pdf->setFont('helvetica','B',10);
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(80, $largeurline2+0.95, $i);
        $longeurline2 = $longeurline2+13.7;
        $largeurline2 = $largeurline2 + 13.7;

         
    }

    if($i>30 && $i<=45){
        $pdf->SetLineWidth(0.25);
        $pdf->setFont('helvetica','B',11);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(140.8, $longeurline3, 54,12.6, 'DF');
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(140.8, $longeurline3, 5.2,12.6, 'DF');

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(148.25, $longeurline3+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(148.25, $longeurline3+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(148.5, $largeurline3-1.79, '1');
        $pdf->Text(148.5,$largeurline3+5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(149.8, $largeurline3+1, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(153.25, $longeurline3+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(153.25, $longeurline3+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(153.5, $largeurline3-1.79, '2');
        $pdf->Text(153.5,$largeurline3+5, '2');
        $pdf->setFont('helvetica','B',11);

        
        $pdf->Rect(158.28, $longeurline3+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(158.28, $longeurline3+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(158.5, $largeurline3-1.79, '3');
        $pdf->Text(158.5,$largeurline3+5, '3');
        $pdf->setFont('helvetica','B',11);


        $pdf->Rect(163.29, $longeurline3+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(163.29, $longeurline3+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(163.5, $largeurline3-1.79, '4');
        $pdf->Text(163.5,$largeurline3+5, '4');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(168.52, $longeurline3+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(168.52, $longeurline3+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(168.7, $largeurline3-1.79, '5');
        $pdf->Text(168.7,$largeurline3+5, '5');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(173.52, $longeurline3+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(173.52, $longeurline3+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(173.7, $largeurline3-1.79, 'A');
        $pdf->Text(173.7,$largeurline3+5, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(178.6, $longeurline3+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(178.6, $longeurline3+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(178.7, $largeurline3-1.79, 'T');
        $pdf->Text(178.7,$largeurline3+5, 'T');
        $pdf->setFont('helvetica','B',11);

        
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(140.4, $largeurline3+0.8, $i);
        $longeurline3 = $longeurline3+13.7;
        $largeurline3 = $largeurline3 + 13.7;
        
    }

    if($i == 46){
        $pdf->AddPage();
    }

    if($i>45 && $i<=64){
        $pdf->setFont('helvetica','B',9.5);
        $pdf->SetLineWidth(0.25);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(20.5, $longeurline4, 54,12.6, 'DF');
  
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(20.5, $longeurline4, 5.2,12.6, 'DF');
       

        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(20.5, $largeurline4+0.7, $i);
        $pdf->SetFillColor(255, 255, 255);

        $pdf->Rect(27.5, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(27.5, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(27.7, $largeurline4-2.4, '1');
        $pdf->Text(27.7, $largeurline4+4.5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(28.5, $largeurline4+0.7, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);
    


        $pdf->Rect(32.6, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(32.6, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(32.8, $largeurline4-2.3, '2');
        $pdf->Text(32.8, $largeurline4+4.5, '2');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(37.6, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(37.6, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(37.99, $largeurline4-2.4, '3');
        $pdf->Text(37.99, $largeurline4+4.5, '3');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(42.5, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(42.5, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(42.85, $largeurline4-2.4, '4');
        $pdf->Text(42.85, $largeurline4+4.5, '4');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(47.9, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(47.9, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(48, $largeurline4-2.4, '5');
        $pdf->Text(48, $largeurline4+4.5, '5');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(52.89, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(52.89, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(53, $largeurline4-2.4, 'A');
        $pdf->Text(53, $largeurline4+4.5, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(57.87, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(57.87, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(58, $largeurline4-2.4, 'T');
        $pdf->Text(58, $largeurline4+4.5, 'T');
        $pdf->setFont('helvetica','B',11);



        
        $longeurline4 = $longeurline4+13.759;
        $largeurline4 = $largeurline4 + 13.759;
    }
    if($i>64 && $i<=83){
        $pdf->setFont('helvetica','B',11);
        $pdf->SetLineWidth(0.25);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(81.3, $longeurline5, 54,12.6, 'DF');
  
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(81.3, $longeurline5, 5.2,12.6, 'DF');

        $pdf->SetFillColor(255, 255, 255);

        $pdf->Rect(88.5, $longeurline5+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(88.5, $longeurline5+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(88.7, $largeurline5-2.4, '1');
        $pdf->Text(88.7, $largeurline5+4.5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(90, $largeurline5+0.7, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(93.5, $longeurline5+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(93.5, $longeurline5+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(93.8, $largeurline5-2.4, '2');
        $pdf->Text(93.8, $largeurline5+4.5, '2');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(98.5, $longeurline5+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(98.5, $longeurline5+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(98.8, $largeurline5-2.4, '3');
        $pdf->Text(98.8, $largeurline5+4.5, '3');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(103.5, $longeurline5+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(103.5, $longeurline5+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(103.8, $largeurline5-2.4, '4');
        $pdf->Text(103.8, $largeurline5+4.5, '4');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(108.8, $longeurline5+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(108.8, $longeurline5+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(109.1, $largeurline5-2.4, '5');
        $pdf->Text(109.1, $largeurline5+4.5, '5');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(113.9, $longeurline5+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(113.9, $longeurline5+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(114.1, $largeurline5-2.4, 'A');
        $pdf->Text(114.1, $largeurline5+4.5, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(118.9, $longeurline5+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(118.9, $longeurline5+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(119.1, $largeurline5-2.4, 'T');
        $pdf->Text(119.1, $largeurline5+4.5, 'T');
        $pdf->setFont('helvetica','B',11);
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(81, $largeurline5, $i);
        $longeurline5 = $longeurline5+13.757;
        $largeurline5 = $largeurline5 + 13.757;
    }
    if($i>83 && $i<=102){
        if($i>=100){
            $pdf->setFont('helvetica','B',9);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(141.95, $longeurline6, 54,12.6, 'DF');
  
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(141.95, $longeurline6, 5.2,12.6, 'DF');

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(149.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(149.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(149.7, $largeurline6-2.4, '1');
        $pdf->Text(149.7, $largeurline6+4.5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(150.5, $largeurline6+0.7, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);


        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(154.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(154.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(154.7, $largeurline6-2.4, '2');
        $pdf->Text(154.7, $largeurline6+4.5, '2');
        $pdf->setFont('helvetica','B',11);


        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(159.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(159.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(159.7, $largeurline6-2.4, '3');
        $pdf->Text(159.7, $largeurline6+4.5, '3');
        $pdf->setFont('helvetica','B',11);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(164.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(164.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(164.7, $largeurline6-2.4, '4');
        $pdf->Text(164.7, $largeurline6+4.5, '4');
        $pdf->setFont('helvetica','B',11);

        
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(169.75, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(169.75, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(169.95, $largeurline6-2.4, '5');
        $pdf->Text(169.95, $largeurline6+4.5, '5');
        $pdf->setFont('helvetica','B',11);

            
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(174.75, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(174.75, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(174.95, $largeurline6-2.4, 'A');
        $pdf->Text(174.95, $largeurline6+4.5, 'A');
        $pdf->setFont('helvetica','B',11);

        
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(179.78, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(179.78, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(179.96, $largeurline6-2.4, 'T');
        $pdf->Text(179.96, $largeurline6+4.5, 'T');
        $pdf->setFont('helvetica','B',11);


  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->setFont('helvetica','B',8);
        $pdf->Text(141, $largeurline6, $i);
        $longeurline6= $longeurline6+13.7;
        $largeurline6 = $largeurline6 + 13.7;
        }else{
        $pdf->setFont('helvetica','B',11);
        $pdf->SetLineWidth(0.25);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(141.95, $longeurline6, 54,12.6, 'DF');
  
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(141.95, $longeurline6, 5.2,12.6, 'DF');

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(149.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(149.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(149.7, $largeurline6-2.4, '1');
        $pdf->Text(149.7, $largeurline6+4.5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(150.5, $largeurline6+0.7, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);


        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(154.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(154.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(154.7, $largeurline6-2.4, '2');
        $pdf->Text(154.7, $largeurline6+4.5, '2');
        $pdf->setFont('helvetica','B',11);


        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(159.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(159.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(159.7, $largeurline6-2.4, '3');
        $pdf->Text(159.7, $largeurline6+4.5, '3');
        $pdf->setFont('helvetica','B',11);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(164.5, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(164.5, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(164.7, $largeurline6-2.4, '4');
        $pdf->Text(164.7, $largeurline6+4.5, '4');
        $pdf->setFont('helvetica','B',11);

        
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(169.75, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(169.75, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(169.95, $largeurline6-2.4, '5');
        $pdf->Text(169.95, $largeurline6+4.5, '5');
        $pdf->setFont('helvetica','B',11);

            
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(174.75, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(174.75, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(174.95, $largeurline6-2.4, 'A');
        $pdf->Text(174.95, $largeurline6+4.5, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(179.78, $longeurline6+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(179.78, $longeurline6+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(179.96, $largeurline6-2.4, 'T');
        $pdf->Text(179.96, $largeurline6+4.5, 'T');
        $pdf->setFont('helvetica','B',11);

        
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(141.7, $largeurline6, $i);
        $longeurline6 = $longeurline6+13.757;
        $largeurline6 = $largeurline6 + 13.757;
        }
    }
}
    }
    Storage::deleteDirectory('uploads');
    $pdfname = 'Etudiant'.$id.'';

    if (Storage::exists('uploads/' . $pdfname)) {
        // If the file already exists, delete it before saving the new file
        Storage::delete('uploads/' . $pdfname);
    }else{
        Storage::put('uploads/Etudiants'.$id.'.pdf',  $pdf->output('Etudiants.'.$id.'.pdf','S'));
    }

    $filePath = storage_path('uploads/Etudiants'.$i.'.pdf');

        return $pdf->output('Etudiants.'.$id.'.pdf');
   
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
