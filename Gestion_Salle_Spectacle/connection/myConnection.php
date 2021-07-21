<?php
	
	class MyConnection
	{
			public function connection()
			{
				return new PDO('mysql:host=localhost;dbname=gestion_evenement','root','');
			}
			
	}
?>