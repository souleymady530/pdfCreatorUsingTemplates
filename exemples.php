<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>pdf Creator Using Template </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
	
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />    
   
   
  </head>
  <body class="container-fluid">
    <div class="row">
	</div>
    <div class="col-lg-12" style="color:white;background-color:orange;height:50px;text-align:center;">
	
	<div class="col-lg-1 col-lg-push-2" style="">
	<a href="index.php" style="">Acceuil</a>
	</div>
	
	<div class="col-lg-1 col-lg-push-2" style="">
	<a href="exemples.php">Exemples</a>
	</div>
	<div class="col-lg-1 col-lg-push-2" style="">
	<a href="modele.php">Modeles</a>
	</div>
	
	</div>
	<div class="col-lg-12" >
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
	<h2>Modele I (Header-2 text central-1 et footer)</h2>
	</div>
	<div class="row" >
	
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-push">
	<h3>Header</h3>
	Le header contient deux partie qui occupe les deux coté: leur Texte est centré et on peut ajouter autant qu'on veux avec les methodes
	addTextHeaderLeft($text) et addTextHeaderRight($text).
	<h3>Le Body</h3>
	Cette partie contient un seul text centrale d hauteur variable selon vos envies. Elle se construit grace a une methode créee specialement et qui appele a la fin de la methode permettant de generer le header.
	<h3>Le Footer</h3>
	Cette partie contient uniquement le numero de la page et l'aligne au center;
	<span>Remercions au passage la bibliotheque fpdf</span>
	<div class="row">
	<code>
	Se refferer a la classe Model1 dans le dossier modeles
	</code>
	</div>
	<div class="col-lg-7 col-lg-push-2">
	<hr/>
	<label>Ajouter un text au header a gouche</label>
	<input type="text" class="headerLeftTextA form-control"/>
	
	<label>Ajouter un text au header a droit</label>
	<input type="text" class="headerRightTextA form-control"/>
	
	<label>Ajouter un text au center</label>
	<textarea class="bodyTextA form-control">
	</textarea>
	
	
	
	</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-push">
	<div class="row">
	</div>
		<hr/><iframe class="iframeA" src="pdfGenerer/ModeleTexteSimple1.pdf"></iframe>
	</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	<div class="col-lg-12" hidden>
	<h2>Model Avec Header Et Logo</h2>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
	<h2>Modele I (Header-2 text central-1 et footer)</h2>
	</div>
	<div class="row" hidden>
	
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-push">
	<h3>Header</h3>
	Le header contient deux partie qui occupe les deux coté: leur Texte est centré et on peut ajouter autant qu'on veux avec les methodes
	addTextHeaderLeft($text) et addTextHeaderRight($text).
	<h3>Le Body</h3>
	Cette partie contient un seul text centrale d hauteur variable selon vos envies. Elle se construit grace a une methode créee specialement et qui appele a la fin de la methode permettant de generer le header.
	<h3>Le Footer</h3>
	Cette partie contient uniquement le numero de la page et l'aligne au center;
	<span>Remercions au passage la bibliotheque fpdf</span>
	<div class="row">
	<code>
	Se refferer a la classe Model1 dans le dossier modeles
	</code>
	</div>
	<div class="col-lg-7 col-lg-push-2">
	<hr/>
	<label>Ajouter un text au header a gouche</label>
	<input type="text" class="headerLeftText2 form-control"/>
	
	<label>Ajouter un text au header a droit</label>
	<input type="text" class="headerRightText2 form-control"/>
	
	<label>Ajouter un text au center</label>
	<textarea class="bodyText2 form-control"></textarea>
	
	
	<label>Tabulation Text-central</label>
	<select class="tabCentrale2 form-control" disabled>
		<?php for($i=0;$i<50;$i++)
			echo'<option value="'.$i.'">'.$i.'</option>';
		?>
	</select>
	</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-push">
	<div class="row">
	</div>
		<hr/><iframe class="iframe" src="pdfGenerer/Modele2.pdf"></iframe>
	</div>
	</div>
	</div>
	
	<style>
	.col-lg-1 a
	{
		text-decoration:none;
		color:white;
		
	}
	.col-lg-1
	{
		margin-top:10px;
	}
	
	
	.iframeA
	{
		height:500px;
		width:100%;
		margin-bottom:100px;
	}
	</style>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/TrtModelTextSimple.js"></script>

	<script type="text/javascript">
	
	
	

	
	
	</script>
  </body>
</html>
