<?php
 require('../fpdf.php');
class Model3 extends FPDF
{
	
	var $bodyText="hello";
	var $headerTextLeft="MINISTERE DE L'EDUCATION NATIONALE DE L'ALPHABETISATION ET DE LA PROMOTION DES LANGUES NATIONALES";
	var $headerTextRight="BURKINA FASO";
	var $tab=50;
	protected $B = 0;
protected $I = 0;
protected $U = 0;
	var $gradeSignataire="",$signataire="",$fctSignataire="La Directrice Régionale",$nom="",$groupe="",$fonction="",$grade="",$lieu="",$motif="",$vehicule="",$chauffeur="",$datedepar="",$dateretour="";
	
	
	
	
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
		$this->addTextHeaderLeft("N° 2021-131/MENAPLN/RNRD/DREPS-N");

		
		$this->SetY(10);
		$this->SetX(130);
		$this->addTextHeaderRight($this->headerTextRight);
		$this->addTextHeaderRight("      ");
		$this->addTextHeaderRight("Unité - Progès - Justice");
		 $this->SetY(90);
		  $this->SetX(50);
		$this->Body();
		
		
	}
	
	
	function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
  
}



	public function Body()
	{
		   // $this->Cell(0,6,"",1,0,'L',FALSE);
		   $this->SetFont("Arial",'B',20);
		   $this->Cell(130,10,"DEMANDE D'ORDRE DE MISSION",1,0,'C',FALSE);
		   // $this->Ln(0);
		   		   $this->SetFont("Arial",'B',14);
				   $this->Ln(20);
			
			
		$this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Nom:",0,0,'J');
		 

		 $this->SetFont("Arial","",16);
		 $this->Cell(120,5,$this->nom,0,0,'J');
		 $this->Ln(12);
		 
		 
		 
		 
		 
		 $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Grade:",0,0,'J');
		 

		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->grade,0,0,'J');
		 $this->Ln(12);
		 
		 
		 
		  $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Fonction:",0,0,'J');
		 
		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->fonction,0,0,'J');
		 $this->Ln(12);
		 
		 
		  $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Groupe:",0,0,'J');
		 

		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->groupe,0,0,'J');
		 $this->Ln(12);
		 
		 
		  $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Lieu:",0,0,'J');
		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->lieu,0,0,'J');
		 $this->Ln(12);
		 
		 
		  $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Motif:",0,0,'J');
		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->motif,0,0,'J');
		 $this->Ln(12);
		 
		 
		  $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,utf8_decode("Véhicule:"),0,0,'J');
		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->vehicule,0,0,'J');
		 $this->Ln(12);
		 
		 
		 
		  $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Chauffeur:",0,0,'J');
		 $this->SetFont("Arial","",14);
		 $this->Cell(130,5,$this->chauffeur,0,0,'J');
		 $this->Ln(12);
		 
		 
		 
		 
		  $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,utf8_decode("Date de départ:"),0,0,'J');
		 

		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->datedepar,0,0,'J');
		 $this->Ln(12);
		 
		 
		 
		 
		   $this->SetFont("Arial","BUI");
		 $this->Cell(50,5,"Date de retour:",0,0,'J');

		 $this->SetFont("Arial","",14);
		 $this->Cell(120,5,$this->dateretour,0,0,'J');
		 $this->Ln(12);
		 
		 
		 
		 
		
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
	
	
        $this->SetY(-60);
        $this->SetX(100);
		$this->SetFont('Arial','I',11);
		// Page number
		$this->Cell(0,10,'Ouahigouya,le'.date('d F Y'),0,0,'C');
		$this->SetFont('Arial','B',11);
		$this->SetY(-55);
        $this->SetX(100);
		$this->Cell(0,10,utf8_decode($this->fctSignataire),0,0,'C');
		
		
		
		
        $this->SetY(-30);
        $this->SetX(100);
		// Arial italic 8
		$this->SetFont('Arial','BUI',8);
		// Page number
		$this->Cell(0,10,$this->signataire,0,0,'C');
		
		$this->SetY(-25);
        $this->SetX(100);
		// Arial italic 8
		$this->SetFont('Arial','',8);
		// Page number
		$this->Cell(0,10,$this->gradeSignataire,0,0,'C');
    } 
}

?>
