<?php
// require("../fpdf.php");
require("../modeles/ModelTextSimple.php");


$pdf = new ModelTextSimple();

$pdf->setHeaderLeftText($_POST['textHeaderGauche']);
$pdf->setHeaderRightText($_POST['textHeaderDroite']);
$pdf->setBodyText($_POST['bodyText']);
$pdf->Body();
$pdf->AliasNbPages();
$pdf->Output("../pdfGenerer/ModeleTexteSimple1.pdf");

echo "ok";
?>