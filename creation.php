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
		<iframe id="editor" src="" style="width: 80%;height: 200%;"> </iframe>
		<br /><br />
		<br />
		
		<button onclick="formatDoc('bold');">Gras</button>
		<button onclick="formatDoc('italic');">Italique</button>
		<button onclick="formatDoc('underline');">Souligné</button>
		<select onchange="formatDoc('formatblock',this[this.selectedIndex].value);">
			<option selected>Format</option>
			<option value="h1">Titre 1 &lt;h1&gt;</option>
			<option value="h2">Titre 2 &lt;h2&gt;</option>
			<option value="h3">Titre 3 &lt;h3&gt;</option>
			<option value="h4">Titre 4 &lt;h4&gt;</option>
			<option value="h5">Titre 5 &lt;h5&gt;</option>
			<option value="h6">Sous-titre &lt;h6&gt;</option>
			<option value="p">Paragraphe &lt;p&gt;</option>
		</select>
		<select onchange="formatDoc('fontname',this[this.selectedIndex].value);">
			<option selected>Police de caractère</option>
			<option>Arial</option>
			<option>Arial Black</option>
			<option>Courier New</option>
			<option>Times New Roman</option>
		</select>
		<select onchange="formatDoc('fontsize',this[this.selectedIndex].value);">
			<option class="heading" selected>Taille</option>
			<option value="1">Très petit</option>
			<option value="2">Petit</option>
			<option value="3">Normal</option>
			<option value="4">Moyen</option>
			<option value="5">Gros</option>
			<option value="6">Très gros</option>
			<option value="7">Maximum</option>
		</select>
		<select onchange="formatDoc('forecolor',this[this.selectedIndex].value);">
			<option class="heading" selected>Couleur du texte</option>
			<option value="red">Rouge</option>
			<option value="blue">Bleu</option>
			<option value="green">Vert</option>
			<option value="black">Noir</option>
		</select>
		<select onchange="formatDoc('backcolor',this[this.selectedIndex].value);">
			<option class="heading" selected>Couleur de l'arrière plan</option>
			<option value="red">rouge</option>
			<option value="green">Vert</option>
			<option value="black">Noir</option>
			<option value="white">Blanc</option>
		</select>
		<button onclick="formatDoc('justifyleft');">Aligner à gauche</button>
		<button onclick="formatDoc('justifycenter');">Centrer</button>
		<button onclick="formatDoc('justifyright');">Aligner à droite</button>
		<button onclick="formatDoc('insertorderedlist');">Liste numérotée</button>
		<button onclick="formatDoc('insertunorderedlist');">Liste à puces</button>
		<button onclick="formatDoc('cut');">Couper</button>
		<button onclick="formatDoc('copy');">Copier</button>
		<button onclick="formatDoc('paste');">Coller</button>
		<button onclick="formatDoc('undo');">Annuler</button>
		<button onclick="formatDoc('redo');">Refaire</button>
		<label for="nomPage">Nom de la page : </label>
		<input name="nomPage" id="nom" type="text" placeholder="coucou" required />
		<button onclick="creerPage();">Envoyer</button>
		</form>
	</body>
</html>