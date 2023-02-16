<?php
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Author Name');
$pdf->SetTitle('Example PDF');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();

// set color for background
$pdf->SetFillColor(255, 255, 255);

// set color for text
$pdf->SetTextColor(0, 0, 0);
// draw rectangle
$pdf->Rect(10, 6, 191, 9.5, 'DF');
$pdf->Rect(15, 7.8, 4, 3, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->Text(15, 7.5, 'A');
$pdf->Rect(35,7.8, 4, 3, 'DF');
$pdf->SetFillColor(255, 255, 255);
$pdf->setFont('helvetica','',8);
$pdf->Text(35, 7.5, 'B');
$pdf->Rect(55, 7.8, 4, 3, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->Text(55, 7.5, 'C');
$pdf->Rect(75, 7.8, 4, 3, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->Text(75, 7.5, 'D');
$pdf->Rect(122, 7.8, 4, 3, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->Text(122, 7.5, 'D');
$pdf->Rect(142,7.8, 4, 3, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->Text(142, 7.5, 'C');
$pdf->Rect(162,7.8, 4, 3, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->Text(162, 7.5, 'B');
$pdf->Rect(182, 7.8, 4, 3, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->Text(182, 7.5, 'A');
$pdf->setFont('helvetica','B',8);
$pdf->Text(30, 11, 'Remplissez soigneusement dans ce cadre les cases qui correspondent au codage de votre questionnaire');
$pdf->setFont('helvetica','',9);
$pdf->Text(3, 19, 'Nom/Prenom:');
$j=24;
for($i=0;$i<30;$i++){
$pdf->Rect($j, 16.5, 4, 7, 'DF');
$pdf->Text($j, 18, 'A');
$j=$j+4;
}
$pdf->Text(2, 25, 'Cours/Section:');
$j=24;
for($i=0;$i<30;$i++){
$pdf->Rect($j, 23, 4, 7, 'DF');
$pdf->Text($j, 25, 'A');
$j=$j+4;
}
$pdf->setFont('helvetica','',10);
$pdf->Text(70, 32.5, "Date de l'évaluation :");
$j=104;
for($i=0;$i<10;$i++){
  if($i==2 || $i==5){
    $pdf->Rect($j, 30.5, 4, 7, 'DF');
    $pdf->setFont('helvetica','B',14);
    $pdf->Text($j+0.5, 31, '/');
    $j=$j+4;
  }else{
    $pdf->setFont('helvetica','',10);
$pdf->Rect($j, 30.5, 4, 7, 'DF');
$pdf->Text($j, 31.5, 'A');
$j=$j+4;
  }
}
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(4, 34, 50,5, 'DF');
$pdf->setFont('helvetica','B',10);
$pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(4, 34, 'Consignes de marquage');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(4, 39, 140 ,32, 'DF');
$pdf->setFont('helvetica','',8);
$pdf->SetTextColor(0, 0, 0); // white text
$pdf->Text(4, 42, "Remplissez à l'aide d'un bic noir/bleu foncé (ni crayon, ni feutre) une seule case par ligne.");
$pdf->SetFont('helvetica', '', 10);
$pdf->SetTextColor(0, 0, 0);
$part_to_underline = "bic noir/bleu foncé";
$part_width = $pdf->GetStringWidth($part_to_underline);
$pdf->SetLineWidth(0.5);
$pdf->Line(2 + $pdf->GetStringWidth("Remplissez à l'aide d"), 43.5 + 2, 2 + $pdf->GetStringWidth("Remplissez à llllls") + $part_width, 43.5 + 2);
$pdf->SetFont('helvetica', '', 8);
$pdf->Text(4, 47, "> Noircissez complètement le");
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(44, 47.8, 5, 2, 'DF');
$pdf->Text(4, 52, "> En cas d'erreur, ne raturez pas sur la première ligne ");
$pdf->SetFont('helvetica', '', 10);
$pdf->Text(75, 52, "-- >");
$pdf->SetFont('helvetica', '', 8);
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(85, 53, 5, 2, 'DF');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(93, 53, 5, 2, 'DF');
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(101, 53, 5, 2, 'DF');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(109, 53, 5, 2, 'DF');
$pdf->Rect(117, 53, 5, 2, 'DF');
$pdf->Rect(125, 53, 5, 2, 'DF');
$pdf->SetLineWidth(0.5);
$pdf->Line(87 - 3, 54 - 3, 87 + 3, 54 + 3);
$pdf->Line(87 - 3, 54 + 3, 87 + 3, 54 - 3);
$pdf->Text(3, 57, "utilisez la seconde ligne pour choisir la réponse définitive");
$pdf->SetFont('helvetica', '', 10);
$pdf->Text(75, 57, "-- >");
$pdf->SetFont('helvetica', '', 8);
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(85, 58, 5, 2, 'DF');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(93, 58, 5, 2, 'DF');
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(101, 58, 5, 2, 'DF');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(109, 58, 5, 2, 'DF');
$pdf->Rect(117, 58, 5, 2, 'DF');
$pdf->Rect(125, 58, 5, 2, 'DF');
$pdf->Text(20, 62, "> N'inscrivez RIEN sur les bords de page !");
$pdf->Text(20, 66 , "> La correction est entièrement automatisée par ordinateur");
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(145, 16.5, 64,5, 'DF');
$pdf->setFont('helvetica','B',10);
$pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(153, 16, 'Completez Votre Matricule');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(145, 21.7, 64 ,49, 'DF');
$pdf->SetTextColor(0, 0, 0); 
$pdf->setFont('helvetica','',10);
$pdf->Text(149, 23, 'P');
$pdf->Rect(160, 24, 3, 3, 'DF');
$pdf->setFont('helvetica','',9);
$pdf->Text(144.5, 37, 'Chiffre 1');
$pdf->Text(144.5,44 , 'Chiffre 2');
$pdf->Text(144.5, 51, 'Chiffre 3');
$pdf->Text(144.5,58, 'Chiffre 4');
$pdf->Text(144.5, 65, 'Chiffre 5');
$pdf->SetLineWidth(0.5);
$pdf->setFont('helvetica','',8);
$pdf->Line(158.5, 46 - 25, 158.5, 46 + 25);
$j=37;
$k=36.7;
for($i=0;$i<5;$i++){
$pdf->Rect(160, $j, 3, 3, 'DF');
$pdf->Text(159.7, $k, '0');
$pdf->Rect(165, $j, 3, 3, 'DF');
$pdf->Text(164.7, $k, '1');
$pdf->Rect(170, $j, 3, 3, 'DF');
$pdf->Text(169.7, $k, '2');
$pdf->Rect(175, $j, 3, 3, 'DF');
$pdf->Text(174.7, $k, '3');
$pdf->Rect(180, $j, 3, 3, 'DF');
$pdf->Text(179.7, $k, '4');
$pdf->Rect(185, $j, 3, 3, 'DF');
$pdf->Text(184.7, $k, '5');
$pdf->Rect(190, $j, 3, 3, 'DF');
$pdf->Text(189.7, $k, '6');
$pdf->Rect(195, $j, 3, 3, 'DF');
$pdf->Text(194.7, $k, '7');
$pdf->Rect(200, $j, 3, 3, 'DF');
$pdf->Text(199.7, $k, '8');
$pdf->Rect(205, $j, 3, 3, 'DF');
$pdf->Text(204.7, $k, '9');
$j=$j+7.1;
$k=$k+7.1;
}
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(5, 72, 201,5, 'DF');
$pdf->setFont('helvetica','B',11);
$pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(70, 72, 'QUESTIONNAIRE A CHOIX MULTIPLE');
$pdf->setFont('helvetica','',11);
$j=80;
for($i=0,$n=1;$i<11;$i++,$n++){
  $pdf->setFont('helvetica','B',11);
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(12, $j, 9,16, 'DF');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(21, $j, 51,16, 'DF');
$pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(14, $j+5, $n);
$j=$j+18;
}
$j=80;
for($i=0,$n=12;$i<11;$i++,$n++){
  $pdf->SetFillColor(0, 0, 0);
  $pdf->Rect(76, $j, 9,16, 'DF');
  $pdf->SetFillColor(255, 255, 255);
  $pdf->Rect(85, $j, 51,16, 'DF');
  $pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(78, $j+5, $n);
  $j=$j+18;
}
$j=80;
for($i=0,$n=23;$i<11;$i++,$n++){
  $pdf->SetFillColor(0, 0, 0);
  $pdf->Rect(140, $j, 9,16, 'DF');
  $pdf->SetFillColor(255, 255, 255);
  $pdf->Rect(148, $j, 51,16, 'DF');
  $pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(141, $j+5, $n);
  $j=$j+18;
}
$pdf->SetFillColor(255, 255, 255);
$j=24;
for($i=0;$i<6;$i++){
$pdf->Rect($j, 82, 4, 3, 'DF');
$j=$j+8;
}
$j=24;
for($i=0;$i<6;$i++){
  $pdf->Rect($j, 90, 4, 3, 'DF');
  $j=$j+8;
  }
$pdf->SetTextColor(0, 0, 0);
$pdf->setFont('helvetica','',9); // white text
$pdf->Text(24.5,85.5, 'une case maximum par ligne');
$j=24;
for($i=0;$i<6;$i++){
  $pdf->Rect($j, 90, 4, 3, 'DF');
  $j=$j+8;
  }
$pdf->AddPage();

$j=20;
for($i=0,$n=34;$i<14;$i++,$n++){
  $pdf->setFont('helvetica','B',11);
$pdf->SetFillColor(0, 0, 0);
$pdf->Rect(12, $j, 9,16, 'DF');
$pdf->SetFillColor(255, 255, 255);
$pdf->Rect(21, $j, 51,16, 'DF');
$pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(13, $j+5, $n);
$j=$j+18;
}
$j=20;
for($i=0,$n=48;$i<14;$i++,$n++){
  $pdf->SetFillColor(0, 0, 0);
  $pdf->Rect(76, $j, 9,16, 'DF');
  $pdf->SetFillColor(255, 255, 255);
  $pdf->Rect(85, $j, 51,16, 'DF');
  $pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(77, $j+5, $n);
  $j=$j+18;
}
$j=20;
for($i=0,$n=62;$i<14;$i++,$n++){
  $pdf->SetFillColor(0, 0, 0);
  $pdf->Rect(140, $j, 9,16, 'DF');
  $pdf->SetFillColor(255, 255, 255);
  $pdf->Rect(148, $j, 51,16, 'DF');
  $pdf->SetTextColor(255, 255, 255); // white text
$pdf->Text(141, $j+5, $n);
  $j=$j+18;
}
$pdf->Output('example_001.pdf', 'I');
?>