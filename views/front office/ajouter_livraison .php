<?php
include "../entities/liv.php" ;
include "../core/livC.php" ;

if ( isset($_GET['Email']) && isset($_GET['region']) && isset($_GET['telC'])&& isset($_GET['adresseC'])&& isset($_GET['codeP'])&& isset($_GET['nomC'])) 
{
    $nomC=$_GET['nomC'];
	$mailC=$_GET['Email'];
	$telC=$_GET['telC'];
	$adresseC=$_GET['adresseC'];
	$region=$_GET['region'];
	$codeP=$_GET['codeP'];

}
	
	
if (  isset($_GET['Email']) && isset($_GET['region']) && isset($_GET['telC'])&& isset($_GET['adresseC'])&& isset($_GET['codeP'])&& isset($_GET['nomC'])) 
	{
		$p=new Livreur($nomC,$mailC,$telC,$adresseC,$region,$codeP);
		$LivreurC=new LivreurC();
		$mes=$LivreurC->ajouter($p);
		if ($mes==true) 
		{
			echo "ajout avec succees";
		}
		else
			header('Location:formeditor.php');

    }
}
?>