<?php
	$nomPage=$_POST["nomPage"] . ".php";
	$contenu = $_POST["contenu"];
	$fichier_a_ouvrir = fopen ($nomPage, "w+");
	//On écrit dans le fichier
	fwrite($fichier_a_ouvrir, $contenu);
	//On ferme la connexion
	fclose ($fichier_a_ouvrir);
?>