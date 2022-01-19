<?php
 require('../fpdf.php');
class ModelTextSimple extends FPDF
{
	var $bodyText="";
	var $headerTextLeft="";
	var $headerTextRight="";
	
	
	//Getter and setter
	public function setBodyText($text)
	{
		$this->bodyText=$text;
		
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
		
		$this->Body();
		
	}
	

	//corps de la page
	public function Body()
	{
		$this->SetY(120);
		$this->SetX(30);
		$this->Cell(190,120,utf8_decode($this->bodyText),0,0,"J");
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
	

	public function Footer()
	{
		
	}
}

?>
