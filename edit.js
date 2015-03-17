var editorDoc;
function InitEditable () {
/*  var test='<br /><iframe id="editor" name="editor" src="editable.html" style="width: 80%;height: 200%;"> </iframe><br /><br /><br /><button onclick="formatDoc(\'bold\');modifPage();">Gras</button><button onclick="formatDoc(\'italic\');modifPage();">Italique</button><button onclick="formatDoc(\'underline\');modifPage();">Souligné</button><select onchange="formatDoc(\'formatblock\',this[this.selectedIndex].value);modifPage();"><option selected>Format</option><option value="h1">Titre 1 &lt;h1&gt;</option><option value="h2">Titre 2 &lt;h2&gt;</option><option value="h3">Titre 3 &lt;h3&gt;</option><option value="h4">Titre 4 &lt;h4&gt;</option><option value="h5">Titre 5 &lt;h5&gt;</option><option value="h6">Sous-titre &lt;h6&gt;</option><option value="p">Paragraphe &lt;p&gt;</option></select><select onchange="formatDoc(\'fontname\',this[this.selectedIndex].value);modifPage();"><option selected>Police de caractère</option><option>Arial</option><option>Arial Black</option><option>Courier New</option><option>Times New Roman</option></select><select onchange="formatDoc(\'fontsize\',this[this.selectedIndex].value);modifPage();"><option class="heading" selected>Taille</option><option value="1">Très petit</option><option value="2">Petit</option><option value="3">Normal</option><option value="4">Moyen</option><option value="5">Gros</option><option value="6">Très gros</option><option value="7">Maximum</option></select><select onchange="formatDoc(\'forecolor\',this[this.selectedIndex].value);modifPage();"><option class="heading" selected>Couleur du texte</option><option value="red">Rouge</option><option value="blue">Bleu</option><option value="green">Vert</option><option value="black">Noir</option></select><select onchange="formatDoc(\'backcolor\',this[this.selectedIndex].value);modifPage();"><option class="heading" selected>Couleur de l\'arrière plan</option><option value="red">rouge</option><option value="green">Vert</option><option value="black">Noir</option><option value="white">Blanc</option></select><button onclick="formatDoc(\'justifyleft\');modifPage();">Aligner à gauche</button><button onclick="formatDoc(\'justifycenter\');modifPage();">Centrer</button><button onclick="formatDoc(\'justifyright\');modifPage();">Aligner à droite</button><button onclick="formatDoc(\'insertorderedlist\');modifPage();">Liste numérotée</button><button onclick="formatDoc(\'insertunorderedlist\');modifPage();">Liste à puces</button><button onclick="formatDoc(\'cut\');modifPage();">Couper</button><button onclick="formatDoc(\'copy\');modifPage();">Copier</button><button onclick="formatDoc(\'paste\');modifPage();">Coller</button><button onclick="formatDoc(\'undo\');modifPage();">Annuler</button><button onclick="formatDoc(\'redo\');modifPage();">Refaire</button>';
    alert(test);
    document.body.innerHTML=test;
   	var cache = document.getElementById ("cacher");
    var cacheDoc = cache.contentWindow.document;          
    var cacheBody = cacheDoc.body;
    //alert(cacheBody.innerHTML);
    document.body.innerHTML=cacheBody.innerHTML;
    setTimeout(function() {*/
	    var editor = document.getElementById ("editor");
	    editorDoc = editor.contentWindow.document;
	    var editorBody = editorDoc.body;
	        // turn off spellcheck
	    if ('spellcheck' in editorBody) {    // Firefox
	        editorBody.spellcheck = false;
	    }
	
	    if ('contentEditable' in editorBody) {
	            // allow contentEditable
	        editorBody.contentEditable = true;
	    }
	    else {  // Firefox earlier than version 3
	        if ('designMode' in editorDoc) {
	                // turn on designMode
	            editorDoc.designMode = "on";                
	        }
	    }
	   // var nom = window.location.pathname;
	    //alert(nom);
   // }, 100);
}
function sendPageName(){
	var nom = window.location.pathname;
	nom=nom.split("/");
	nom=nom[nom.length - 1];
	alert(nom);
	$.ajax({
		url : 'envoi.php',
		type : 'POST',
 		data: "pageName=" + nom, 
 		success:function(data){document.location='editeur.php';}
	});
}
function afficheEdit(){
	var nom = window.location.pathname;
	nom=nom.split("/");
	nom=nom[nom.length - 1];
	alert(nom);
	var cache = document.getElementById ("cacher");
    var cacheDoc = cache.contentWindow.document;          
    var cacheBody = cacheDoc.body;
    //alert(cacheBody.innerHTML);
    document.body.innerHTML=cacheBody.innerHTML;
    setTimeout(function() {
	    var editor = document.getElementById ("editor");
	    editorDoc = editor.contentWindow.document;
	    var editorBody = editorDoc.body;
	
	        // turn off spellcheck
	    if ('spellcheck' in editorBody) {    // Firefox
	        editorBody.spellcheck = false;
	    }
	
	    if ('contentEditable' in editorBody) {
	            // allow contentEditable
	        editorBody.contentEditable = true;
	    }
	    else {  // Firefox earlier than version 3
	        if ('designMode' in editorDoc) {
	                // turn on designMode
	            editorDoc.designMode = "on";                
	        }
	    }
	    editor.src=nom;
    }, 100);
}
function modifPage(){
	var editor = document.getElementById ("editor");
    editorDoc = editor.contentWindow.document;
    var page='<!DOCTYPE HTML>\n<html>\n\t' + editorDoc.documentElement.innerHTML + '\n</html>';          
    var editorBody = editorDoc.body;
    var h=editorDoc.getElementsByTagName("h1");
    alert(h[0].innerHTML);
    $.ajax({
		url : 'test.php',
		type : 'POST',
 		data: "contenu=" + page,
	});
}
function ToggleBold () {
    editorDoc.execCommand ('bold', false, null);
}
function formatDoc(sCmd,valeur) {
	//alert(sCmd);
	//alert(editorDoc.innerHTML);
	editorDoc.execCommand(sCmd, false, valeur);
	editor.focus();
}
function creerPage(){
	var nomPage=document.getElementById("nom").value;
	var h=editorDoc.getElementsByTagName("h1");
    alert(h[0].innerHTML);
	if (nomPage == '') {
		alert("coucou");
		}else{
		var editor = document.getElementById ("editor");
	    editorDoc = editor.contentWindow.document;
	    var page='<!DOCTYPE HTML>\n<html>\n\t' + editorDoc.documentElement.innerHTML + '\n</html>';          
	    var editorBody = editorDoc.body;
	    $.ajax({
			url : 'creer.php',
			type : 'POST',
	 		data: "contenu=" + page + '&nomPage=' + nomPage,
		});
	}
}