<?php
namespace App\Models;
// require('PDF.php'); 
 
class ModeleOrdreAutre extends FPDF
{
	
	var $bodyText="hello";
	var $headerTextLeft="MINISTERE DE L'ADMINISTRATION TERRITORIALE ET DE LA DECENTRALISATION";
	var $headerTextRight="BURKINA FASO";
	var $tab=50;
	protected $B = 0;
protected $I = 0;
protected $U = 0;
	var $chemin="",$gradeSignataire="Administrateur Civil Officier \n Médaillé d'Honneur des collectivités locales",$signataire="Souleymane NAKANABO",$fctSignataire="Le Haut-Commissaire et P/D Le Secrétaire Générle de la Province",$nom="",$groupe="",$fonction="",$grade="",$lieu="",$motif="",$vehicule="",$chauffeur="",$datedepar="",$dateretour="";
	
	
	
	
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
	
	public function genererPdf()
	{
		$this->OutPut($this->chemin);
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
		$this->addTextHeaderLeft("PROVINCE DU YATENGA");
		$this->addTextHeaderLeft("-------------------");
		$this->addTextHeaderLeft("HAUT COMMISSARIAT/OUAHIGOUYA");
		$this->addTextHeaderLeft("-------------------");
		$this->addTextHeaderLeft("SECRETARIAT GENERAL");
		// $this->addTextHeaderLeft("N°2021-______________/MATD/RNRD/GVR-OHG/SG");
		

		
		$this->SetY(10);
		$this->SetX(130);
		$this->addTextHeaderRight($this->headerTextRight);
		$this->addTextHeaderRight("      ");
		$this->addTextHeaderRight("Unité - Progès - Justice");
		 $this->SetY(65);
		  $this->SetX(10);
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
		$this->SetFont("Arial","B",25);
		$this->SetX(60);
		 $this->Cell(110,15,"ORDRE DE MISSION",1,0,"C");
		 		$this->SetFont("Arial","B",11);
$this->Ln(15);
		 $this->Cell(190,8,utf8_decode("N°____________MATD/RNRD/PYTG/HC-OHG/SG"),0,0,"C");
		
		 $this->Ln(10);
		  $this->SetFont("Arial","",11);
		 // $this->Cell(0,180,"hello",1,0);
		 $this->SetX(10);
		 $this->Cell(60,190,"",1,0);
		 $this->SetY(85);
		 $this->SetX(10);
		 $this->SetFont("Arial","BU",11);
		 $this->Cell(60,15,"IMPUTATION",0,0,'C');
		 
		 $this->SetY(105); $this->SetFont("Arial","",11);
		 $this->Cell(60,15,"Chapitre___Art___",0);
		 
		  $this->SetFont("Arial","BU",11);
		  $this->SetY(120);
		 $this->Cell(60,15,"SITUATION DES CREDITS",0,0,'C');
		 
		 $this->SetY(135); $this->SetFont("Arial","",11);
		 $this->MultiCell(60,5,utf8_decode("\nCrédit alloués:_______________\n\nCrédits dépensés:_______\n\nPrésent engagement:____"),0,'L');
		 
		 $this->SetY(165); $this->SetFont("Arial","BU",11);
		 $this->Cell(60,15,"VISAS DU D.C.E",0,0,'C');
		 
		 $this->SetY(180); $this->SetFont("Arial","",11);
		 $this->MultiCell(60,5,utf8_decode("(Ou du délégué du directeur du contrôle financier)"),0,'J');
		 
		 $this->SetY(195); $this->SetFont("Arial","BU",11);
		 $this->MultiCell(60,5,"DATE DE SIGNATURE DU MINISTERE COMPETENT",0,'C');
		  $this->SetFont("Arial","",11);
		 $this->SetY(220);
		 $this->MultiCell(60,5,utf8_decode("3)Disponible après Présent engagement"),0,'J');
		
		 
		 
		 
		 
		 
		 
		 $this->SetY(90);
		 $this->SetX(70);
		 $this->Cell(130,190,"",1,0);
		 
		 $this->SetY(90);
		 $this->SetX(70);
		 $this->SetFont("Arial","BU",11);
		 $this->Cell(30,15,"Nom",0,0);
		  $this->SetFont("Arial","",11);
		  $this->SetY(90);
		 $this->SetX(110);
		 $this->Cell(90,15,$this->nom,0);

		 
		 
		 
		 $this->SetY(105);
		 $this->SetX(70);
		 		 $this->SetFont("Arial","BU",11);

		  $this->SetFont("Arial","BU",11);
		 $this->Cell(40,15,"Grade",0);
		 
		  $this->SetY(105);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->Cell(90,15,utf8_decode($this->grade),0);
		 
		 
		 
		 
		 
		 
		 
		 $this->SetY(120);
		 $this->SetX(70);
		  $this->SetFont("Arial","BU",11);
		 $this->Cell(30,15,"Fonction",0);
		 
		  $this->SetY(120);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->MultiCell(100,5,utf8_decode($this->fonction),0);
		 
		 
		 
		 
		 
		 
		  $this->SetY(135);
		 $this->SetX(70);		 $this->SetFont("Arial","BU",11);

		 $this->Cell(40,15,"Groupe",0);
		 
		  $this->SetY(135);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->Cell(90,15,utf8_decode($this->groupe),0);
		 
		 
		 
		 $this->SetY(150);
		 $this->SetX(70);		 $this->SetFont("Arial","BU",11);

		 $this->Cell(40,15,"Lieu",0);
		 
		  $this->SetY(150);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->Cell(90,15,utf8_decode($this->lieu),0);
		 
		 
		 
		 
		  $this->SetY(165);
		 $this->SetX(70);		 $this->SetFont("Arial","BU",11);

		 $this->Cell(30,15,"Motif",0);
		 
		  $this->SetY(165);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->MultiCell(100,5,utf8_decode($this->motif),0);
		 
		 
		 
		 
		 $this->SetY(180);
		 $this->SetX(70);		 $this->SetFont("Arial","BU",11);

		 $this->Cell(40,15,utf8_decode("Véhicule"),0);
		 
		  $this->SetY(180);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->Cell(90,15,utf8_decode($this->vehicule),0);
		 
		 
		 
		 
		 
		  $this->SetY(195);
		 $this->SetX(70);		 $this->SetFont("Arial","BU",11);

		 $this->Cell(30,15,"Chauffeur",0);
		 
		  $this->SetY(195);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->Cell(90,15,utf8_decode($this->chauffeur),0);
		 
		 
		 
		 
		 $this->SetY(210);
		 $this->SetX(70);		 $this->SetFont("Arial","BU",11);

		 $this->Cell(40,15,utf8_decode("Date de départ"),0);
		 
		  $this->SetY(210);
		 $this->SetX(110);		 $this->SetFont("Arial","",11);

		 $this->Cell(90,15,utf8_decode($this->datedepar),0);
		 
		 
		 
		 
		  $this->SetY(225);
		 $this->SetX(70);		 $this->SetFont("Arial","BU",11);

		 $this->Cell(40,15,"Date de retour",0);
		 $this->SetFont("Arial","",11);
		  $this->SetY(225);
		 $this->SetX(110);
		 $this->Cell(90,15,utf8_decode($this->dateretour),0);
		 
		 
		 
		
	}
	

	// Cette fonction permet d'ajouter du texte au header en haut a gauche
	public function addTextHeaderLeft($text)
	{
		$this->MultiCell(100,5,utf8_decode($text),0,'C');
	}
	
	// Cette fonction permet d'ajouter du texte au header en haut a droite
	public function addTextHeaderRight($text)
	{
		$this->SetX(135);
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
		$this->Cell(0,10,'Ouahigouya,le ______',0,0,'C');
		$this->SetFont('Arial','B',11);
		$this->SetY(-52);
        $this->SetX(125);
		$this->MultiCell(70,5,utf8_decode($this->fctSignataire),0,'C');
		
		
		
		
        $this->SetY(-35);
        $this->SetX(100);
		// Arial italic 8
		$this->SetFont('Arial','BU',11);
		// Page number
		$this->Cell(0,10,utf8_decode($this->signataire),0,0,'C');
		
		$this->SetY(-28);
        $this->SetX(120);
		// Arial italic 8
		$this->SetFont('Arial','',8);
		// Page number
		$this->MultiCell(60,5,utf8_decode($this->gradeSignataire),0,'C');
    } 
}

?>
