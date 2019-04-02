<HTML>
<head>
</head>
<body>
	<script type="text/javascript">
  function notifyMe() {
  if (!("Notification" in window)) {
    alert("This browser does not support system notifications");
  }
  else if (Notification.permission === "granted") {
    notify();
  }
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      if (permission === "granted") {
        notify();
      }
    });
  }
  
  function notify() {
    var notification = new Notification('LIVRAISON', {
      icon: '../notifier.png',
      body: "Hey! LIVRAISON modifié avec succés!",

    });

    notification.onclick = function () {
      window.location.replace("a.php");      
    };
    setTimeout(notification.close.bind(notification), 5000); 
  }

}
</script>
<?PHP
include "../../entities/livraison.php";
include "../../core/livraisonC.php";
if (isset($_GET['cin'])){
	$livraisonC=new livraisonC();
    $result=$livraisonC->recupererlivraison($_GET['cin']);
	foreach($result as $row){
		$cin=$row['cin'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$ville=$row['ville'];
		$mail=$row['mail'];
		$postal=$row['postal'];
?>
<form method="POST">
<table>
<caption>Modifier livraison</caption>
<tr>
<td>cin</td>
<td><input type="number" name="cin" value="<?PHP echo $cin ?>"></td>
</tr>
<tr>
<td>nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>ville</td>
<td><input type="number" name="ville" value="<?PHP echo $ville ?>"></td>
</tr>
<tr>
<td>mail</td>
<td><input type="text" name="mail" value="<?PHP echo $mail ?>"></td>
</tr>
<tr>
<td></td>
<tr>
<td>postal</td>
<td><input type="text" name="postal" value="<?PHP echo $postal ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="cin_ini" value="<?PHP echo $_GET['cin'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livraison=new livraison($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['ville'],$_POST['mail'],$_POST['postal']);
	$livraisonC->modifierlivraison($livraison,$_POST['cin_ini']);
	echo $_POST['cin_ini'];
	//header('Location: afficherlivraison.php');
	echo "<script language=javascript>
  notifyMe();
  </script>";
}
?>


</body>
</HTMl>