<?php
	class Admin 
	{
		private $cnx,$result;
		function __construct()
		{
			try 
			{
				require_once ('../connection/myConnection.php');
				$cnx = new MyConnection();
				$result = $cnx -> connection();
				$result->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			catch (PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}
			
		}

		function listeAdmins()
		{
			$cnx = new MyConnection();
			$result = $cnx->connection()->prepare("SELECT * FROM admin");
			$result->execute();
			return $result->fetchAll();
		}

		function supprimerAdmin($id)
		{
			$cnx = new MyConnection();
			return $cnx->connection()->prepare("DELETE FROM admin WHERE id = ?")->execute(array($id));
		}

		function modifierAdmin($nomComplet,$numTel,$email,$mdp,$id)
		{
				$cnx = new MyConnection();
			return $cnx->connection()->prepare("UPDATE admin SET nomComplet = ?, numTel = ? , email = ? , mdp = ? WHERE id = ? ")->execute(array($nomComplet,$numTel,$email,$mdp,$id));
		}

		function getAdmin($id)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT * FROM admin WHERE id = ?");
			$result->execute(array($id));
			return $result->fetch();
		}

		function ajouterAdmin($nomComplet,$numTel,$email,$mdp)
		{
			$cnx = new MyConnection();
			$query="insert into admin(nomComplet,numTel,email,mdp)values (?, ?, ?, ?)";
			return $cnx ->connection()->prepare($query)->execute(array($nomComplet,$numTel,$email,$mdp));
		}

		function getPasswordAdmin($email)
		{
			$cnx = new MyConnection();
			$result = $cnx ->connection()->prepare("SELECT * FROM admin WHERE email = ?");
			$result->execute(array($email));
			return $result->fetch();
		}
	}
?>