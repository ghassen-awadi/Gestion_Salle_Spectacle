$(document).ready(function() {

	$("#loginButton").prop("disabled",true);

	$("#password").click(function(){
		 /*   $.ajax({    //create an ajax request to display.php
	        type: "GET",
	        url: "getPasswordAdmin.php",
	        data: {emailValue: $("#email").val()}                             
	    }).done(function(data){
	    	//var result = JSON.parse(data);
	    	window.location.replace("getPasswordAdmin.php");
	    }).fail(function(){
	    	alert("une erreur se produit, merci de réactualiser la page");
	    });*/
	/*    var email = ;
	    $.post("./getPasswordAdmin.php",
	    {
	    	emailValue: email
	    },function(){
	    		alert(email);
	    		//window.location.replace("getPasswordAdmin.php");
	    });*/

		if ($("#email").val().length == 0)	
		{
			alert("merci de remplir le champs email");
			$("#email").focus();
		}

	});

	$("#password").keyup(function(){
		if ($("#password").val().length != 0)
		{
			$("#loginButton").prop("disabled",false);
		}
		else
		{
			$("#loginButton").prop("disabled",true);
		}
	});

	
});