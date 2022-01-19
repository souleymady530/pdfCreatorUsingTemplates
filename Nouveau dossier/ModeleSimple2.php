<?php
 namespace App\Models;
class ModeleSimple2 extends FPDF
{
	var $bodyText="hello";
	var $headerTextLeft="MINISTERE DE L'EDUCATION NATIONALE DE L'ALPHABETISATION ET DE LA PROMOTION DES LANGUES NATIONALES";
	var $headerTextRight="BURKINA FASO";
	var $tab=50;var $lieu="- OUAGADOUGOU -";
	protected $B = 0;

	public $fct="Inspectrice de l'Enseingement Secondaire\nChevalier de l'Ordre des Palmes Académiques",$destinaire="MONSIEUR LE GOUVERNEUR DE LA REGION DU NORD",$message="J'ai lhdqiosqsdqsdvjkjQoazufazo",$objet="",$ref="",$refCor="",$exp="T.Amandine RAMDE/ILBOUDO",$signataire="Téné Amandine RAMDE/ILBOUDO";
	
	public $chemin="fichier/default.pdf", $expediteur="PIECE TRANSMISE PAR LA DIRECTRICE REGIONALE DES ENSEIGNEMENTS POST-PRIMAIRE ET SECONDAIRE DU NORD",
	$recepteur="Monsieur le directeur des ressources Humaine du Ministère de l'Education Nationale,de l'Alphabetisation et de la Promotion des Langues Nationales";
	var $dataTables=[],$partI="",$partII=[],$partIII="";
	
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
		$this->addTextHeaderLeft("DIRECTION REGIONALE DES ENSEIGNEMENTS POST-PRIMAIRE ET SECONDAIRE DU NORD");
		$this->addTextHeaderLeft("-------------------");
		
		$this->setFont('Arial','B',11);
		$this->addTextHeaderLeft("N° 2021-131/MENAPLN/RNRD/DREPS-N");

		
		$this->SetY(10);
		$this->SetX(130);
		$this->addTextHeaderRight($this->headerTextRight);
		$this->addTextHeaderRight("      ");
		$this->addTextHeaderRight("Unité - Progès - Justice");$this->addTextHeaderRight("\nOuahigouya, le ".date('d F Y'));
		
		$this->Body();
		
		
	}
	

	
	
	
	
	
	
	
	 function plot_table($widths, $lineheight, $table, $border=1, $aligns=array(), $fills=array(), $links=array())
	 {
        $func = function($text, $c_width){
            $len=strlen($text);
            $twidth = $this->GetStringWidth($text);
            $split = floor($c_width * $len / $twidth);
            $w_text = explode( "\n", wordwrap( $text, $split, "\n", true));
            return $w_text;
        };
        foreach ($table as $line){
            $line = array_map($func, $line, $widths);
            $maxlines = max(array_map("count", $line));
            foreach ($line as $key => $cell){
                $x_axis = $this->getx();
                $height = $lineheight * $maxlines / count($cell);
                $len = count($line);
                $width = (isset($widths[$key]) === TRUE ? $widths[$key] : $widths / count($line));
                $align = (isset($aligns[$key]) === TRUE ? $aligns[$key] : '');
                $fill = (isset($fills[$key]) === TRUE ? $fills[$key] : false);
                $link = (isset($links[$key]) === TRUE ? $links[$key] : '');
                foreach ($cell as $textline){
                    $this->cell($widths[$key],$height,$textline,0,0,$align,$fill,$link);
                    $height += 2 * $lineheight * $maxlines / count($cell);
                    $this->SetX($x_axis);
                }
                if($key == $len - 1){
                    $lbreak=1;
                }
                else{
                    $lbreak = 0;
                }
                $this->cell($widths[$key],$lineheight * $maxlines, '',$border,$lbreak);
            }
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	


	public function Body()
	{

		 
		
		$this->SetFont("Arial","B",14);
		$this->SetY(95);
		$this->SetX(85);
		$this->MultiCell(100,5,utf8_decode($this->expediteur),0,"C");
		$this->SetY(100);
		$this->SetX(85);
		$this->Cell(100,11,"A",0,0,"C");
		$this->SetY(110);
		$heig=0;
		foreach($this->dataTables as $exp)
		{
			$this->SetX(105);
			$this->MultiCell(100,5,"-".utf8_decode($exp),0,"L");
			$this->Ln(5);
			$heig+=10;
		}
		// $this->MultiCell(100,5,utf8_decode($this->recepteur),0,"C");
		
		
		$this->SetFont("Arial","BU",11);
		
		$this->SetY(120+$heig);
		$this->SetX(10);
		$this->setFont("Arial","BU",11);
		$this->Cell(20,11,"Objet:",0,0,"L");
		$this->setFont("Arial","",11);
		$this->Cell(120,11,utf8_decode($this->objet),0,0,"L");

		$this->SetY(130+$heig);
		$this->SetX(10);
		
		$this->MultiCell(220,5,utf8_decode($this->partI),0,"J");
		$this->Ln(5);
		foreach($this->partII as $li)
		{
			$this->SetX(10);
			$this->MultiCell(190,5,utf8_decode($li),0,"J");
			$this->Ln(5);
		}
		$this->Ln(5);
		$this->SetX(10);
		$this->MultiCell(190,5,utf8_decode($this->partIII),0,"J");
		 
		 
		 
		 
		
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
