$(document).ready(function(){
	$("#register").click(function(){
		if ($.trim($("#nom").val()).length == 0)
		{
			alert("merci de saisir votre nom");
			$('input[name="nom"]').focus();
		}
		else if ($.trim($("#prenom").val()).length == 0)
		{
			alert("merci de saisir votre prénom");
			$('input[name="prenom"]').focus();
		}
		else if ($.trim($("#email").val()).length == 0)
		{
			alert("merci de saisir votre email");
			$('input[name="email"]').focus();
		}
		else if ($.trim($("#password").val()).length == 0)
		{
			alert("merci de saisir un mot de passe");
			$('input[name="password"]').focus();
		}
		else if ($.trim($("#confirm").val()).length == 0)
		{
			alert("merci de confirmer votre mot de passe");
			$('input[name="confirm"]').focus();
		}
		else if (!isEmailValid($.trim($("#email").val())))
		{
			alert("merci de saisir un format d'email correcte");
		}
		else if ($("#password").val() != $("#confirm").val())
		{
			alert("les mots de pass ne sont pas identique, merci de réessayer");
		}
		else if (!isNameValid($.trim($("#nom").val())))
		{
			alert("merci de saisir un nom valide");
			$('input[name="nom"]').focus();
		}
		else if (!isNameValid($.trim($("#prenom").val())))
		{
			alert("merci de saisir un prénom valide");
			$('input[name="prenom"]').focus();
		}
		else
		{
			$.ajax({
			  method: "POST",
			  url: "register.php",
			  data: {nom:$.trim($("#nom").val()),
			  prenom:$.trim($("#prenom").val()),
			  email:$.trim($("#email").val()),
			  password:$.trim($("#password").val())}
			}).done(function(){
				window.location.replace("index.php");
			});
		}
	});
});

function isEmailValid($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

function isNameValid($name) {
  var nameReg = /^[a-zA-Z ]+$/;
  return nameReg.test( $name );
}