<?php
include "../entities/liv.php" ;
include "../core/livC.php" ;

if ( isset($_GET['mail']) && isset($_GET['nom']) && isset($_GET['tel'])&& isset($_GET['adresse']) ) 
{
    $nom=$_GET['nom'];


	$mail=$_GET['mail'];
	$tel=$_GET['tel'];
	$adresse=$_GET['adresse'];}
	
	
if ( isset($_GET['mail']) && isset($_GET['nom']) && isset($_GET['tel'])&& isset($_GET['permis']) ) 
	{
		$p=new Livreur($nom,$mail,$tel,$adresse);
		$LivreurC=new LivreurC();
		$mes=$LivreurC->ajouter($p);
		if ($mes==true) 
		{
			echo "ajout avec succees";
		}
		else
			header('Location:formelements.php');

    }
}
?>