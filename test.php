<?php
	$contenu = $_POST["contenu"];
	$fichier_a_ouvrir = fopen ("editable.html", "a+");
	//On écrit dans le fichier
	fwrite($fichier_a_ouvrir, $contenu);
	//On ferme la connexion
	fclose ($fichier_a_ouvrir);
?>