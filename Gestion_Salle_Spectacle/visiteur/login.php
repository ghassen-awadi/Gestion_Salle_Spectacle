<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>login Page</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../js/LoginChecker.js"></script>
	
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (isset($_POST['emailField']) && isset($_POST['passwordField']))
			{
				$email = $_POST['emailField'];
				$password = $_POST['passwordField'];
				require_once('Visiteur.php');
				$visiteur= new Visiteur();
				echo($visiteur->getPasswordVisiteur($email)['mdp']);
				if ($visiteur->getPasswordVisiteur($email)['mdp'] == $password)
				{
					$_SESSION["email"] = $_POST['emailField'];
					header ("Location: http://localhost/gestion_salle_spectacle/visiteur/reservation/");
				}
				else
				{
					echo "<script>alert('Email ou mot de passe invalide')</script>";
				}
			}

		}
		
	?>
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-25 my-auto shadow">
				<div class="card-header text-center bg-primary text-white">
					<h3>Visitor login form</h3>
				</div>
				<div class="card-body">
					<form action="login.php" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="emailField" />
						</div>
						<div class="form-group">
						 	<label for="password">Mot de passe</label>
							<input type="password" id="password" class="form-control" name="passwordField"/>
						</div>
						<input type="submit" class="btn btn-primary w-100" value="Login" name="buttonSubmit" id="loginButton">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
