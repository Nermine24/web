
<HTML>
<head>
</head>
<body>
<?PHP
include "../../entities/livreur.php";
include "../../core/livreurC.php";
if (isset($_GET['login'])){
	$livreurC=new livreurC();
    $result=$livreurC->recupererlivreur($_GET['login']);
	foreach($result as $row){
		$login=$row['login'];
		$mdp=$row['mdp'];
		$salaire=$row['salaire'];
		$cinL=$row['cinL'];
		
?>
<form method="POST">
<table>
<caption>Modifier livreur</caption>
<tr>
<td>login</td>
<td><input type="text" name="login" value="<?PHP echo $login ?>"></td>
</tr>
<tr>
<td>mdp</td>
<td><input type="text" name="mdp" value="<?PHP echo $mdp ?>"></td>
</tr>
<tr>
<td>salaire</td>
<td><input type="number" name="salaire" value="<?PHP echo $salaire ?>"></td>
</tr>
<tr>
<td>cinL</td>
<td><input type="number" name="cinL" value="<?PHP echo $cinL ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="login_ini" value="<?PHP echo $_GET['login'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livreur=new livreur($_POST['login'],$_POST['mdp'],$_POST['cinL'],$_POST['salaire']);
	$livreurC->modifierlivreur($livreur,$_POST['login_ini']);
	echo $_POST['login_ini'];
	header('Location: b.php');
}
?>
</body>
</HTMl>