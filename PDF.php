<?php
include('FPDF.php');
class PDF extends FPDF
{
 	
	var $_cine='';
	var $_prix='';
	var $_type='';
	private $imgDir="classique.jpg";
	public function setImgDir($dir)
	{
		$this->imgDir=$dir;
		
	}
	public function setCine($nomVar)
{
	$this->_Cine=$nomVar;
}
//Page header
function Header()
{
    //Logo
    // $this->Image($this->imgDir,0,0,100);
    //Arial bold 15
    $this->SetFont('Arial','B',12);
	$this->setXY(80,20);
	    $this->Cell(60,0,$this->_cine);
		$this->Ln();
		$this->Ln();
		

    //Move to the right
     
    //Title
   /*
	$this->Cell(-13);
	    $this->SetFont('Arial','B',6);

	$this->Cell(0,2,'****************************************************************************************************************************************************',0,1);
    $this->Cell(0,10,'Pass:'.$this->_type.'                                     Prix:	'.$this->_prix.'                                  '.utf8_decode('Ciné :'.$this->_cine),0,1,'C');
    
    $this->Cell(-13);
	$this->Cell(0,2,'****************************************************************************************************************************',0,1);
    //Line break
    //$this->Ln(20);*/
}
 
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    //$this->SetY(-15);
    //Arial italic 8
	  $this->SetFont('Arial','I',10);
    //Page number
	$this->setXY(0,135);
    $this->Cell(0,0,'By Ouedraogo Filwende Soule-Mady Serges:',0,0,'C');
	$this->Ln(3);
    $this->Cell(0,0,'https://www.pdfCUT.com',0,0,'C');
    
}

}


?>