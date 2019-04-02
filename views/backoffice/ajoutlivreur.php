<?PHP
include "../../entities/livreur.php";
include "../../core/livreurC.php";

if (isset($_POST['login']) and isset($_POST['mdp']) and isset($_POST['salaire']) and isset($_POST['cinL']) )
{
$livreur1=new livreur($_POST['login'],$_POST['mdp'],$_POST['cinL'],$_POST['salaire']);
//Partie2
/*
var_dump($livraison1);
}
*/
//Partie3
$livreur1C=new livreurC();
$livreur1C->ajouterlivreur($livreur1);
header('Location: b.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>