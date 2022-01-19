<?php
namespace App\Models;
// require('PDF.php');

class ModeleNote4X extends FPDF
{
	var $bodyText="hello";
	var $headerTextLeft="MINISTERE DE L'EDUCATION NATIONALE DE L'ALPHABETISATION ET DE LA PROMOTION DES LANGUES NATIONALES";
	var $headerTextRight="BURKINA FASO";
	var $tab=50;var $lieu="- OUAGADOUGOU -";
	protected $B = 0;
protected $I = 0;
protected $U = 0;
	public $sousNote="",$msgNote="", $fct="Inspectrice de l'Enseingement Secondaire\nChevalier de l'Ordre des Palmes Académiques",$destinaire="",$message="",$objet="",$ref="",$refCor="",$exp="T.Amandine RAMDE/ILBOUDO",$signataire="La Directrice Régionale";
	
	public $text="",$expediteur="",$recepteur="";
	public $col1="",$col2="",$col3="",$col4="",$chemin="";
	
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
	function pseudoHeader()
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
		$this->addTextHeaderRight("Unité - Progès - Justice");$this->addTextHeaderRight("\nOuahigouya, le".date('d F Y'));
		
		$this->Body();
		
		
		
	}
	

	public function genererPdf()
	{
		$this->Output($this->chemin);
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

		
		 $this->SetFont("Arial","B",11);
		$this->SetY(95);
		$this->SetX(10);
		$this->MultiCell(180,5,utf8_decode($this->objet),1,"J");
		$this->SetFont("Arial","",11);
		$this->SetY(120);
		$this->SetX(10);
		$this->MultiCell(180,5,utf8_decode($this->text),0,"J");
		
				
				
		$this->SetFont("Arial","B",12);
		$this->SetY(145);
		$this->SetX(10);
		
		
		$this->MultiCell(15,5,$this->col1,1,"C");
		
		$this->SetY(145);
		$this->SetX(25);
		$this->Cell(60,15,$this->col2,1,0,"C");
		
		$this->SetY(145);
		$this->SetX(85);
		$this->Cell(60,15,$this->col3,1,0,"C");
		
		$this->SetY(145);
		$this->SetX(145);
		$this->Cell(60,15,$this->col4,1,0,"C");
		
		
		$this->SetY(160);
	    $this->SetFont("Arial","",11);
   
	}
	
	public function pseudoFooter()
	{
		$this->SetFont('Arial','B',11);
		$this->SetY(-30+$this->h);
        $this->SetX(125);
		$this->MultiCell(50,5,utf8_decode($this->signataire),0,'C');
		
		
		
		
       $this->SetY(200+40-$this->h);
        $this->SetX(100);
		// Arial italic 8
		$this->SetFont('Arial','BU',11);
		// Page number
		$this->Cell(0,10,utf8_decode($this->exp),0,0,'C');
		
		$this->SetY(200+50-$this->h);
        $this->SetX(120);
		// Arial italic 8
		$this->SetFont('Arial','',8);
		// Page number
		$this->MultiCell(60,5,"\n".utf8_decode($this->fct),0,'C');
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
}

?>