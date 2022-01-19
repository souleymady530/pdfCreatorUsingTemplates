<?php
// require('../fpdf.php');
class Model1 extends FPDF
{
	var $bodyText="";
	var $headerTextLeft="MINISTERE DE L'EDUCATION NATIONALE DE L'ALPHABETISATION ET DE LA PROMOTION DES LANGUES NATIONALES";
	var $headerTextRight="BURKINA FASO";
	var $tab=50;
	
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
		
		
		$this->SetY(10);
		$this->SetX(130);
		$this->addTextHeaderRight($this->headerTextRight);
		
		//Appelle de la fonction Body pour construire le text principale
		// $this->Body($width,$height);
	}
	
	
	function Body($width,$height)
	{
		$this->AddPage();
		 $this->SetY($this->GetY()+30);
		$this->MultiCell($width-30,5,$this->bodyText,0,0);
		
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
	
	
        $this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    } 
}

// Instanciation of inherited class
// $pdf->Output();
?>
