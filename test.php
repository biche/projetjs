<?php
	//$pageName = $_POST["pageName"];
	//var_dump($pageName);
	session_start();
	$contenu = $_POST["contenu"];
	$fichier_a_ouvrir = fopen ($_SESSION{'pageName'}, "w+");
	//On écrit dans le fichier
	fwrite($fichier_a_ouvrir, $contenu);
	//On ferme la connexion
	fclose ($fichier_a_ouvrir);
?>