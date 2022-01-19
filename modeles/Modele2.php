<?php
require('../fpdf.php');
class Model1 extends FPDF
{
	var $bodyText="";
	
	
	
	
	//Getter and setter
	public function setBodyText($text)
	{
		$this->bodyText=$text;
	}
	
	
	public function GetBodyText()
	{
		return $this->bodyText;
	}
	
	
	
	
	//Header de la page
	function Header()
	{

		$this->SetFont('Arial','B',11);
		$width=$this->w-$this->rMargin-10;
		$height=$this->h-$this->lMargin-10;
		$this->Cell($width,$height,"",0,0);
		$this->Ln(0);
		
		$this->addTextHeaderLeft("MINISTERE DE L'EDUCATION NATIONALE DE L'ALPHABETISATION ET DE LA PROMOTION DES LANGUES NATIONALES");
		$this->addTextHeaderLeft("---------------");
		$this->addTextHeaderLeft("REGION DU NORD");
		$this->addTextHeaderLeft("------------");
		$this->addTextHeaderLeft("DIRECTION REGIONALE DES ENSEIGNEMENTS POST PRIMAIRE ET SECONDAIRE DU NORD");
		$this->addTextHeaderLeft("----------------");
		$this->addTextHeaderLeft("BP 338 OUAHIGOUYA");
		$this->addTextHeaderLeft(" Tel-Secretariat:(226)24550980");
		$this->addTextHeaderLeft(" Tel Fax:(226)24550980");
		$this->addTextHeaderLeft("N°2021-01/MENAPLN/RNRD/DREPS-N");
		
		//Section pour le logo
		
		
		
		
		
		$this->SetY(10);
		$this->SetX(130);
		$this->addTextHeaderRight("BURKINA FASO");
		$this->addTextHeaderRight("Unité - Progès - Justice");
		$this->addTextHeaderRight("Ouahigouya".date('d F Y'));
		
		//Appelle de la fonction Body pour construire le text principale
		$this->Body($width,$height);
	}
	

	// Cette fonction permet d'ajouter du texte au header en haut a gauche
	public function addTextHeaderLeft($text)
	{
		$this->MultiCell(90,5,utf8_decode($text),0,'C');
	}
	
	// Cette fonction permet d'ajouter du texte au header en haut a droite
	public function addTextHeaderRight($text)
	{
		$this->SetX(130);
		$this->MultiCell(70,5,utf8_decode($text),0,'C');
	}
	
	
	function Body($width,$height)
	{
		$this->SetY(100);
		$this->Cell($width,0,$this->doNTabultation(50)."".nl2br($this->bodyText),0,0);
	}

	//cette fonction retourne une chaine de caracterer contenant une tabulation
	//Pour avoir la tabulation il faudrait ajouter cette chaine au texte
	public function doNTabultation($N)
	{
		$tab="";
		$i=0;
		while($i<$N)
		{
			$tab.="\t";
			$i++;
		}
		return $tab;
	}
	
	
	
	
	
	
	
 
	
    function Footer() 
    { 
        $this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    } 
}

// Instanciation of inherited class
$pdf = new Model1();
$pdf->AliasNbPages();
$pdf->AddPage();

// $pdf->Output("../pdfGenerer/ModeleTexteSimple.pdf");
$pdf->Output();
?>
