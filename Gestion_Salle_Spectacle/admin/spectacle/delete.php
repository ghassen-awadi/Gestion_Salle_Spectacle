<?php
	require_once ('Spectacle.php');
	$spectacle = new Spectacle();
	$spectacle->supprimerSpectacle($_GET["idSpectacle"]);
	header("Refresh:0; url=index.php");
?>