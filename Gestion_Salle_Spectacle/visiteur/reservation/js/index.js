$(document).ready(function(){
	$(".btn-danger").click(function(){
		var $row = $(this).closest("tr");    // Find the row
	    var $text = $row.find("#idSpectacle").text(); // Find the text
	    window.location.replace("delete.php?idSpectacle="+$text);
	});

	 $(".btn-success").click(function() {
	   window.location.replace("AjouterReservation.html");
	});
});