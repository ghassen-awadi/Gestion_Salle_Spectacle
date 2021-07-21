<?php
	class Visiteur 
	{
		private $cnx,$result;
		function __construct()
		{
			try 
			{
				require_once ('C:\wamp64\www\Gestion_Salle_Spectacle\connection\myConnection.php');
				$cnx = new MyConnection();
				$result = $cnx -> connection();
				$result->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			catch (PDOException $e) 
			{
				echo "Connection failed: " . $e->getMessage();
			}
			
		}

		function listeVisiteurs()
		{
			$cnx = new MyConnection();
			$result = $cnx->connection()->prepare("SELECT * FROM visiteur");
			$result->execute();
			return $result->fetchAll();
		}

		function supprimerVisiteur($id)
		{
			$cnx = new MyConnection();
			return $cnx->connection()->prepare("DELETE FROM visiteur WHERE id = ?")->execute(array($id));
		}

		function modifierVisiteur($nomComplet,$numTel,$email,$mdp,$id)
		{
				$cnx = new MyConnection();
			return $cnx->connection()->prepare("UPDATE visiteur SET nomComplet = ?, numTel = ? , email = ? , mdp = ? WHERE id = ? ")->execute(array($nomComplet,$numTel,$email,$mdp,$id));
		}

		function getVisiteur($id)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT * FROM visiteur WHERE id = ?");
			$result->execute(array($id));
			return $result->fetch();
		}

		function getNomCompletVisiteur($email)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT * FROM visiteur WHERE email = ?");
			$result->execute(array($email));
			return $result->fetch();
		}

		function ajouterVisiteur($nomComplet,$email,$mdp)
		{
			$cnx = new MyConnection();
			$query="insert into visiteur(nomComplet,email,mdp)values (?, ?, ?)";
			return $cnx ->connection()->prepare($query)->execute(array($nomComplet,$email,$mdp));
		}

		function getPasswordVisiteur($email)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT * FROM visiteur WHERE email = ?");
			$result->execute(array($email));
			return $result->fetch();
		}
	}
?>