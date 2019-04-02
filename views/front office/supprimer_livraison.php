<?php
include "../core/livC.php";

$LivraisonC = new LivraisonC();
if (isset($_POST["num"]))
	{ 
	 
	$LivraisonC->supprimerLivraison($_POST["num"]);
	header('Location:formeditor.php');
}

?>