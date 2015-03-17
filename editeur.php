<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="import" href="editable.html">
    	<script src="js/jquery-1.4.2.min.js"></script>
    	<script type="text/javascript">
    	</script>
        <script src="edit.js" type="text/javascript" charset="utf-8"></script>
    </head>
	<body onload="InitEditable()">
		<br /> 
		<iframe id="editor" src="<?php echo($_SESSION{'pageName'}); ?>" style="width: 80%;height: 200%;"> </iframe>
		<br /><br />
		<br />
		<button onclick="formatDoc('bold');modifPage();">Gras</button>
		<button onclick="formatDoc('italic');modifPage();">Italique</button>
		<button onclick="formatDoc('underline');modifPage();">Souligné</button>
		<select onchange="formatDoc('formatblock',this[this.selectedIndex].value);modifPage();">
			<option selected>Format</option>
			<option value="h1">Titre 1 &lt;h1&gt;</option>
			<option value="h2">Titre 2 &lt;h2&gt;</option>
			<option value="h3">Titre 3 &lt;h3&gt;</option>
			<option value="h4">Titre 4 &lt;h4&gt;</option>
			<option value="h5">Titre 5 &lt;h5&gt;</option>
			<option value="h6">Sous-titre &lt;h6&gt;</option>
			<option value="p">Paragraphe &lt;p&gt;</option>
		</select>
		<select onchange="formatDoc('fontname',this[this.selectedIndex].value);modifPage();">
			<option selected>Police de caractère</option>
			<option>Arial</option>
			<option>Arial Black</option>
			<option>Courier New</option>
			<option>Times New Roman</option>
		</select>
		<select onchange="formatDoc('fontsize',this[this.selectedIndex].value);modifPage();">
			<option class="heading" selected>Taille</option>
			<option value="1">Très petit</option>
			<option value="2">Petit</option>
			<option value="3">Normal</option>
			<option value="4">Moyen</option>
			<option value="5">Gros</option>
			<option value="6">Très gros</option>
			<option value="7">Maximum</option>
		</select>
		<select onchange="formatDoc('forecolor',this[this.selectedIndex].value);modifPage();">
			<option class="heading" selected>Couleur du texte</option>
			<option value="red">Rouge</option>
			<option value="blue">Bleu</option>
			<option value="green">Vert</option>
			<option value="black">Noir</option>
		</select>
		<select onchange="formatDoc('backcolor',this[this.selectedIndex].value);modifPage();">
			<option class="heading" selected>Couleur de l'arrière plan</option>
			<option value="red">rouge</option>
			<option value="green">Vert</option>
			<option value="black">Noir</option>
			<option value="white">Blanc</option>
		</select>
		<button onclick="formatDoc('justifyleft');modifPage();">Aligner à gauche</button>
		<button onclick="formatDoc('justifycenter');modifPage();">Centrer</button>
		<button onclick="formatDoc('justifyright');modifPage();">Aligner à droite</button>
		<button onclick="formatDoc('insertorderedlist');modifPage();">Liste numérotée</button>
		<button onclick="formatDoc('insertunorderedlist');modifPage();">Liste à puces</button>
		<button onclick="formatDoc('cut');modifPage();">Couper</button>
		<button onclick="formatDoc('copy');modifPage();">Copier</button>
		<button onclick="formatDoc('paste');modifPage();">Coller</button>
		<button onclick="formatDoc('undo');modifPage();">Annuler</button>
		<button onclick="formatDoc('redo');modifPage();">Refaire</button>
		<form action="#" method="post" enctype="multipart/form-data">
    		Select image to upload:
    		<input type="file" name="fileToUpload" id="fileToUpload">
    		<input type="submit" value="Upload Image" name="submit">
		</form>
		<button onclick="formatDoc('insertImage','upload/<?php if(isset($_FILES["fileToUpload"])){echo basename( $_FILES["fileToUpload"]["name"]);} ?>');">Envoi de l'image</button>
<?php
	if(isset($_FILES["fileToUpload"])){
		$target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Vérifie que c'est une image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "Se fichier est une image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "Se fichier n'est pas une image";
		        $uploadOk = 0;
		    }
		}
		// Vérifie que le fichier n'existe pas
		if (file_exists($target_file)) {
		    echo "Le fichier existe déjà.";
		    $uploadOk = 0;
		}
		// Vérifie la taille de l'image
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Votre image est trop grande.";
		    $uploadOk = 0;
		}
		// Extentions d'images accepté
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Le format de l'image doit être : JPG, JPEG, PNG ou GIF";
		    $uploadOk = 0;
		}
		// Vérifie si les conditions pour l'upload sont remplies
		if ($uploadOk == 0) {
		    echo "Votre image n'a pas était envoyé";
		// Nous allons essyé d'upload
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "Votre image ". basename( $_FILES["fileToUpload"]["name"]). " a bien été envoyé.";
		    } else {
		        echo "Votre n'a pas été envoyé";
		    }
		}?>
<?php	}
?> 
		<button onclick="modifPage();">Send</button>
	</body>
</html>