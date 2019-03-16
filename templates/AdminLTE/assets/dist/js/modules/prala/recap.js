$(document).ready(function(){
	$('a[href="#del_image"]').parent().remove();
	$('input[type="file"').parent().attr('class','col-md-12');
	$('input[type="file"').remove();
});