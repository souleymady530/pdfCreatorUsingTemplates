<?php
require('../fpdf.php');
class ModeleCorrespondance extends FPDF
{
	var $bodyText="";
	var $headerTextLeft="MINISTERE DE L'EDUCATION NATIONALE DE L'ALPHABETISATION ET DE LA PROMOTION DES LANGUES NATIONALES";
	var $headerTextRight="BURKINA FASO";
	var $tab=50;
	var $fct="Inspectrice de l'Enseingement Secondaire\nChevalier de l'Ordre des Palmes Académiques",$destinaire="MONSIEUR LE GOUVERNEUR DE LA REGION DU NORD",$message="",$objet="",$ref="",$refCor="",$expediteur="T.Amandine RAMDE/ILBOUDO";
	//Getter and setter
	public function setTabulation($n)
	{
		$this->tab=$n;
	}
	public function getTabulation()
	{
		return $this->tab;
	}
	
	public function setBodyText($text)
	{
		$this->bodyText=$this->doNTabultation($this->tab)."".$text;
		
	}
	
	
	public function GetBodyText()
	{
		return $this->bodyText;
	}
	
	public function setHeaderLeftText($text)
	{
		$this->headerTextLeft=$text;
	}
	public function setHeaderRightText($text)
	{
		$this->headerTextRight=$text;
	}
	
	public function GetHeaderLeftText()
	{
		return $this->headerTextLeft;
	}
	public function getHeaderRightText()
	{
		return $this->headerTextRight;
	}
	
	
	//Header de la page
	function Header()
	{

		$this->SetFont('Arial','B',11);
		$width=$this->w-$this->rMargin-10;
		$height=$this->h-$this->lMargin-10;
		$this->Cell($width,$height,"",0,0);
		$this->Ln(0);
		
		$this->addTextHeaderLeft($this->headerTextLeft);
		$this->addTextHeaderLeft("-------------");
		$this->addTextHeaderLeft("REGION DU NORD");
		$this->addTextHeaderLeft("------------------");
		$this->addTextHeaderLeft("DIRECTION REGIONALE DES ENSEIGNEMENTS POST-PRIMAIRE ET SECONDAIRE DU NORD");
		$this->addTextHeaderLeft("-------------------");
		$this->addTextHeaderLeft("BP 338 OUAHIGOUYA");
		$this->SetFont('Arial','B',9);
		$this->addTextHeaderLeft("Tél.secrétariat:(226) 24 55 09 80");
		$this->addTextHeaderLeft("Tél.Fax:(226) 24 55 07 05");
		$this->setFont('Arial','B',11);
		$this->addTextHeaderLeft(utf8_decode($this->ref));
		
		
		$this->SetY(10);
		$this->SetX(130);
		$this->addTextHeaderRight($this->headerTextRight);
				$this->addTextHeaderRight("Unité - Progès - Justice");


		$this->addTextHeaderRight("\nOuahigouya, le".date('d F Y'));
		$this->addTextHeaderRight("\n\n\n\n\n\nLA DIRECTRICE REGIONALE");
		$this->addTextHeaderRight("\nA");
		$this->addTextHeaderRight("\n\n".$this->destinaire);
		$this->addTextHeaderRight("\n\n-OUAHIGOUYA-");
		$this->SetY(120);
		  $this->SetX(10);
		$this->Body();
		//Appelle de la fonction Body pour construire le text principale
		// $this->Body($width,$height);
	}
	function Body()
	{
		$this->setFont("Arial","BU",11);
		$this->Cell(20,11,"Objet:",0,0,"L");
		$this->setFont("Arial","",11);
		// $this->SetFont("Arial","",11);
		$this->Cell(120,11,utf8_decode($this->objet),0,0,"L");
		$this->SetY(135);
		$this->setFont("Arial","BUI",11);
		$this->Cell(20,11,utf8_decode("Réf:"),0,0,"L");
		$this->setFont("Arial","",11);
		$this->Cell(120,11,utf8_decode($this->refCor),0,0,"L");
		
		$this->SetY(145);
		$this->Cell(190,120,utf8_decode($this->message),0,0,"J");
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
	
	
	

	//cette fonction retourne une chaine de caracterer contenant une tabulation
	//Pour avoir la tabulation il faudrait ajouter cette chaine au texte
	public function doNTabultation($N)
	{
		$tabu="";
		$i=0;
		while($i<50)
		{
			$tabu.="\t";
			$i++;
		}
		return $tabu;
	}
	
	
	




	
	
	
 
	
    function Footer() 
    { 
	
	
        $this->SetY(-35);
        $this->SetX(100);
		// Arial italic 8
		$this->SetFont('Arial','BU',11);
		// Page number
		$this->Cell(0,10,utf8_decode($this->expediteur),0,0,'C');
		$this->SetY(-25);
        $this->SetX(120);
		// Arial italic 8
		$this->SetFont('Arial','',8);
		// Page number
		$this->MultiCell(60,5,utf8_decode($this->fct),0,'C');
    } 
}

// Instanciation of inherited class
// $pdf->Output();
?>
