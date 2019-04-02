<?php

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "dbname";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());
//declaration des variables à partir formulaire
	$name = $_POST["firstName"];
	$surname = $_POST["lastName"];
	echo $name;
	echo $surname;

?>