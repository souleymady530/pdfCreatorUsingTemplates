<?php
 require('../fpdf.php');
class ModeleA extends FPDF
{
	var $bodyText="hello";
	var $headerTextLeft="MINISTERE DE L'EDUCATION NATIONALE DE L'ALPHABETISATION ET DE LA PROMOTION DES LANGUES NATIONALES";
	var $headerTextRight="BURKINA FASO";
	var $tab=50;var $lieu="- OUAGADOUGOU -";
	protected $B = 0;
protected $I = 0;
protected $U = 0;
	var $fct="Inspectrice de l'Enseingement Secondaire\nChevalier de l'Ordre des Palmes Académiques",$destinaire="MONSIEUR LE GOUVERNEUR DE LA REGION DU NORD",$message="J'ai lhdqiosqsdqsdvjkjQoazufazo",$objet="",$ref="",$refCor="",$exp="T.Amandine RAMDE/ILBOUDO",$signataire="Téné Amandine RAMDE/ILBOUDO";
	
	var $expediteur="PIECE TRANSMISE PAR LA DIRECTRICE REGIONALE DES ENSEIGNEMENTS POST-PRIMAIRE ET SECONDAIRE DU NORD",
	$recepteur="Monsieur le directeur des ressources Humaine du Ministère de l'Education Nationale,de l'Alphabetisation et de la Promotion des Langues Nationales";
	var $dataTables=[];
	
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
		
		$this->setFont('Arial','B',11);
		$this->addTextHeaderLeft("N° 2021-131/MENAPLN/RNRD/DREPS-N");

		
		$this->SetY(10);
		$this->SetX(130);
		$this->addTextHeaderRight($this->headerTextRight);
		$this->addTextHeaderRight("      ");
		$this->addTextHeaderRight("Unité - Progès - Justice");$this->addTextHeaderRight("\nOuahigouya, le ".date('d F Y'));
		
		
		
	}
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


	public function Body()
	{

		 
		
		
		$this->AddPage();
		$this->SetY(120);
		$this->SetX(20);
		$this->MultiCell(190,5,utf8_decode($this->bodyText),0,"J");
    
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
		$this->MultiCell(70,5,utf8_decode($text),0,'J');
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
	
	
	


public function Footer()
	{
		$this->SetFont('Arial','BU',11);
		$this->SetY(180+84-$this->h);
        $this->SetX(125);
		$this->MultiCell(70,5,utf8_decode($this->signataire),0,'C');
		
		
		
		
       
		
		$this->SetY(180+85-$this->h);
        $this->SetX(120);
		// Arial italic 8
		$this->SetFont('Arial','',8);
		// Page number
		$this->MultiCell(70,5,"\n".utf8_decode($this->fct),0,'C');
	}

	
	
	
 
	
   

}

?>
