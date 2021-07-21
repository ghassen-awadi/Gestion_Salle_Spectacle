<?php
	require_once ('Reservation.php');
	$reservation = new Reservation();
	if ($reservation->supprimerReservation($_GET["idSpectacle"]))
	{
		header("Refresh:0; url=index.php");	
	}
	
?>