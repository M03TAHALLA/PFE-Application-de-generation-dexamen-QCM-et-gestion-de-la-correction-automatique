<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Qcmliste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use mysqli;
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
        // Step 1: Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcmdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Construct and execute SQL query
$sql = "SELECT * FROM etudiants WHERE idEtud =".$id."";
$result = $conn->query($sql);

// Step 3: Retrieve query results and store in a variable
$etudiant_data = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $etudiant_data .= $row["Nom"]." ";
        $etudiant_data .= $row["Prenom"];
        // add more fields as needed
    }
}
        $pdf = new TCPDF();
        
        // set document information
    $pdf->SetTitle('Etudinats');
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
      $j=33.6;
    for($i=0;$i<31;$i++){
      $pdf->SetLineWidth(0.23);
      $pdf->Rect($j, 20.4, 2.89, 5, 'DF');
      $j=$j+2.91;
      }

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
    for($i=0;$i<5;$i++){
    $pdf->SetLineWidth(0.25);
    $pdf->Rect(143.3, $j, 3.36,2.1, 'DF');
    $pdf->Text(143.6, $k, '0');
    $pdf->Rect(148.3, $j, 3.36,2.1, 'DF');
    $pdf->Text(148.6, $k, '1');
    $pdf->Rect(153.3, $j, 3.36,2.1, 'DF');
    $pdf->Text(153.49, $k, '2');
    $pdf->Rect(158.3, $j, 3.36,2.1, 'DF');
    $pdf->Text(158.45, $k, '3');
    $pdf->Rect(163.6, $j, 3.36,2.1, 'DF');
    $pdf->Text(163.8, $k, '4');
    $pdf->Rect(168.7, $j, 3.36,2.1, 'DF');
    $pdf->Text(168.9, $k, '5');
    $pdf->Rect(173.7, $j, 3.36,2.1, 'DF');
    $pdf->Text(173.9, $k, '6');
    $pdf->Rect(178.7, $j, 3.36,2.1, 'DF');
    $pdf->Text(179, $k, '7');
    $pdf->Rect(183.8, $j, 3.36,2.1, 'DF');
    $pdf->Text(183.9, $k, '8');
    $pdf->Rect(189, $j, 3.36,2.1, 'DF');
    $pdf->Text(189.3, $k, '9');
    $j=$j+6.9;
    $k=$k+6.88;
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

for($i=1;$i<=52;$i++){

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
        $pdf->setFont('helvetica','B',11);
        
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(18.1, $largeurline1, $i);
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
        $pdf->Text(26.7, $largeurline1-1.79, '1');
        $pdf->Text(26.7, $largeurline1+5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(26.7, $largeurline1+1, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);
    


        $pdf->Rect(31.6, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(31.6, $longeurline1+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(32, $largeurline1-1.75, '2');
        $pdf->Text(32, $largeurline1+5, '2');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(36.7, $longeurline1+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(36.7, $longeurline1+8.6, 3.36,2.1, 'DF');
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
        $pdf->setFont('helvetica','B',11);


        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(18.5, $longeurline1, 5.2,12.6, 'DF');
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(19.2, $largeurline1, $i);
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
        $pdf->setFont('helvetica','B',11);
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(79.5, $largeurline2, $i);
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
        $pdf->Text(140.7, $largeurline3, $i);
        $longeurline3 = $longeurline3+13.7;
        $largeurline3 = $largeurline3 + 13.7;
        
    }

    if($i == 46){
        $pdf->AddPage();
    }

    if($i>45 && $i<=64){
        $pdf->setFont('helvetica','B',11);
        $pdf->SetLineWidth(0.25);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(20.3, $longeurline4, 54,12.6, 'DF');
  
        $pdf->SetFillColor(0, 0, 0);
        $pdf->Rect(20.3, $longeurline4, 5.2,12.6, 'DF');
       

        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(19.8, $largeurline4, $i);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Rect(27.5, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(27.5, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(27.7, $largeurline4-1.79, '1');
        $pdf->Text(27.7, $largeurline4+5, '1');
        $pdf->setFont('helvetica','I',7);
        $pdf->Text(26.7, $largeurline4+1, 'une case maximum par ligne');
        $pdf->setFont('helvetica','B',11);
    


        $pdf->Rect(32.6, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(32.6, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->setFont('helvetica','',5);
        $pdf->Text(32.5, $largeurline4-1.75, '2');
        $pdf->Text(32.5, $largeurline4+5, '2');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(37.6, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(37.6, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(38, $largeurline4-1.75, '3');
        $pdf->Text(38, $largeurline4+5, '3');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(42.5, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(42.5, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(43, $largeurline4-1.75, '4');
        $pdf->Text(43, $largeurline4+5, '4');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(47.9, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(47.9, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(47.4, $largeurline4-1.75, '5');
        $pdf->Text(47.4, $largeurline4+5, '5');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(53, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(53, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(52.4, $largeurline4-1.75, 'A');
        $pdf->Text(52.4, $largeurline4+5, 'A');
        $pdf->setFont('helvetica','B',11);

        $pdf->Rect(58, $longeurline4+1.77, 3.36,2.1, 'DF');
        $pdf->Rect(58, $longeurline4+8.6, 3.36,2.1, 'DF');
        $pdf->setFont('helvetica','',5);
        $pdf->Text(57.7, $largeurline4-1.75, 'T');
        $pdf->Text(57.7, $largeurline4+5, 'T');
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
  
        $pdf->SetTextColor(255, 255, 255); // white text
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
  
        $pdf->SetTextColor(255, 255, 255); // white text
        $pdf->Text(141.7, $largeurline6, $i);
        $longeurline6 = $longeurline6+13.757;
        $largeurline6 = $largeurline6 + 13.757;
        }
    }
}

        return $pdf->output('Etudiants.pdf');
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
