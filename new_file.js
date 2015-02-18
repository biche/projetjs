/**
 * @author Biche
 */
$(function(){
	alert('tot');
$.ajax({
	type : 'post',
	url:'mapage.php',
	data:'param1=1&param2=nom',
	success: function(xhr){
		alert(xhr);
	},
	error : function(xhr){
		alert("pas ok ");
	}
});
});