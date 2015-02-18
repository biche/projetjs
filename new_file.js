/**
 * @author Biche
 */
$(function(){
$.ajax({
	type : 'post',
	url:'mapage.php',
	data:'param1=1&param2=nom',
	sucess: function(xhr){
		alert(xhr);
	},
	error : function(xhr){
		alert(xhr.responseText);
	}
})
});