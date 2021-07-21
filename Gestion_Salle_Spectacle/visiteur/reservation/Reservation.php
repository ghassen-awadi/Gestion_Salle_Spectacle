<?php

	class Reservation 
	{
		private $cnx,$result;
		function __construct()
		{
			try 
			{
				require_once ('C:/wamp64/www/Gestion_Salle_Spectacle/connection/myConnection.php');
				$cnx = new MyConnection();
				$result = $cnx -> connection();
				$result->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			catch (PDOException $e) 
			{
				echo "Connection failed: " . $e->getMessage();
			}
			
		}

		function listeReservations($emailSpectateur)
		{
			$cnx = new MyConnection();
			$result = $cnx->connection()->prepare("SELECT * FROM reservation WHERE emailSpectateur = ?");
			$result->execute(array($emailSpectateur));
			return $result->fetchAll();
		}

		function supprimerReservation($id)
		{
			$cnx = new MyConnection();
			return $cnx->connection()->prepare("DELETE FROM reservation WHERE id = ?")->execute(array($id));
		}

		function modifierReservation($id,$nomSpectateur,$nomSpectacle,$dateSpectacle,$emailSpectateur,$numPlace)
		{
			$cnx = new MyConnection();
			return $cnx->connection()->prepare("UPDATE reservation SET nomSpectateur = ? , nomSpectacle = ? , dateSpectacle = ? , emailSpectateur = ? , numPlace = ? WHERE id = ? ")->execute(array($nomSpectateur,$nomSpectacle,$dateSpectacle,$emailSpectateur,$numPlace,$id));
		}

		function getReservation($id)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT * FROM reservation WHERE id = ?");
			$result->execute(array($id));
			return $result->fetch();
		}




		function getNumPlacesDisponible($nomSpectacle,$dateSpectacle)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT nbPlacesDisponible FROM spectacle WHERE (nomSpectacle = ? AND dateSpectacle = ?)");
			$result->execute(array($nomSpectacle,$dateSpectacle));
			return $result->fetch();
		}

		function ajouterReservation($nomSpectateur,$emailSpectateur,$nomSpectacle,$dateSpectacle,$numPlace)
		{
			$cnx = new MyConnection();
			$query="insert into reservation(nomSpectateur,emailSpectateur,nomSpectacle,dateSpectacle,numPlace)values (?, ?, ?, ?,?)";
			return $cnx ->connection()->prepare($query)->execute(array($nomSpectateur,$emailSpectateur,$nomSpectacle,$dateSpectacle,$numPlace));
		}

	}
?>