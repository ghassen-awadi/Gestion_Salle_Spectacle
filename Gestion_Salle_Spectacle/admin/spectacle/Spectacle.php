<?php
	class Spectacle 
	{
		private $cnx,$result;
		function __construct()
		{
			try 
			{
				require_once("C:\wamp64\www\Gestion_Salle_Spectacle\connection\myConnection.php");
				$cnx = new MyConnection();
				$result = $cnx -> connection();
				$result->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			catch (PDOException $e) 
			{
				echo "Connection failed: " . $e->getMessage();
			}
			
		}

		function listeSpectacles()
		{
			$cnx = new MyConnection();
			$result = $cnx->connection()->prepare("SELECT * FROM spectacle");
			$result->execute();
			return $result->fetchAll();
		}

		function listeSpectaclesPourVisiteur()
		{
			$cnx = new MyConnection();
			$result = $cnx->connection()->prepare("SELECT nomSpectacle,dateSpectacle,	heureSpectacle,image,nbPlacesDisponible FROM spectacle");
			$result->execute();
			return $result->fetchAll();
		}


		function supprimerSpectacle($id)
		{
			$cnx = new MyConnection();
			return $cnx->connection()->prepare("DELETE FROM spectacle WHERE id = ?")->execute(array($id));
		}

		function modifierSpectacle($nomSpectacle,$dateSpectacle,$heureSpectacle,$nomOrganisateur,$image,$description,$id)
		{
			$cnx = new MyConnection();
			return $cnx->connection()->prepare("UPDATE spectacle SET nomSpectacle = ?, dateSpectacle = ? , heureSpectacle = ? , nomOrganisateur = ? , image = ? , description = ? WHERE id = ? ")->execute(array($nomSpectacle,$dateSpectacle,$heureSpectacle,$nomOrganisateur,$image,$description,$id));
		}


		function getSpectacle($id)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT * FROM spectacle WHERE id = ?");
			$result->execute(array($id));
			return $result->fetch();
		}


		function ajouterSpectacle($nomSpectacle,$dateSpectacle,$heureSpectacle,$nomOrganisateur,$image,$description)
		{
			$cnx = new MyConnection();
			$query="insert into spectacle(nomSpectacle,dateSpectacle,heureSpectacle,nomOrganisateur,image,description)values (?,?,?,?,?,?)";
			return $cnx ->connection()->prepare($query)->execute(array($nomSpectacle,$dateSpectacle,$heureSpectacle,$nomOrganisateur,$image,$description));
		}


		function getDetailsSpectacle($nomSpectacle,$dateSpectacle)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT image,description FROM spectacle WHERE nomSpectacle = ? AND dateSpectacle = ?");
			$result->execute(array($nomSpectacle,$dateSpectacle));
			return $result->fetch();
		}

		function modifierNombrePlaces($nbPlacesDisponible,$dateSpectacle,$nomSpectacle)
		{
			$cnx = new MyConnection();
			return $cnx->connection()->prepare("UPDATE spectacle SET nbPlacesDisponible = ? WHERE dateSpectacle = ? AND nomSpectacle = ? ")->execute(array($nbPlacesDisponible,$dateSpectacle,$nomSpectacle));
		}


	}
?>