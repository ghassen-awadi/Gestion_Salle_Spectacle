<?php
        require_once('Reservation.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
               if (isset($_POST["nomSpectateur"]) && isset($_POST["emailSpectateur"]) && isset($_POST["nomSpectacle"]) && isset($_POST["dateSpectacle"]))
               {
	                  $reservation = new Reservation();
	                  $row = $reservation->getNumPlacesDisponible($_POST["nomSpectacle"],$_POST["dateSpectacle"]);
	                  $numPlace = (300-intval($row["nbPlacesDisponible"]))+1;
	                  
	                  if (intval($row["nbPlacesDisponible"]) != 0)
	                  {
	                  	   if ($reservation->ajouterReservation($_POST["nomSpectateur"],$_POST["emailSpectateur"],$_POST["nomSpectacle"],$_POST["dateSpectacle"],$numPlace))
					  		{
						  		require_once ("../../admin/spectacle/Spectacle.php");
						  		$spectacle = new Spectacle();
						  		if ($spectacle->modifierNombrePlaces(300-$numPlace,$_POST["dateSpectacle"],$_POST["nomSpectacle"]))
						  		{
						  			header("Refresh:0; url=index.php");
						  		}
								
					  		}
	                  }
	                  else
	                  {
	                  		header("Refresh:0; url=index.php");
	                  }

					
               }
        }
        
?>

