<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
	    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light static-top" style="background-color: #126E82"> <!--navbar-dark bg-primary-->
  <div class="container">
    <a class="navbar-brand" href="#">
          <img src="http://placehold.it/150x50?text=Logo" alt="">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html" style="color: white;">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="visiteur/" style="color: white;">Consulter les spectacles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php" style="color: white;">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

         
         	<div class="container-fluid">
                        		 <div class="container">
			  <div class="row" style="margin:auto;">
				     <div class="col-md-offset-3" style="margin-top:50px;">
									<?php
										require_once("../admin/spectacle/Spectacle.php");
										$result = new Spectacle();
										$res = $result->listeSpectaclesPourVisiteur();
                    $count = 0;
                    echo("<center><div class='row'>");
										foreach($res as $row)
										{
                        if (($count % 3 == 0) && ($count != 0))
                        {
                             echo "<center><div class='row'><div class='col-sm-4'><div class='card' style='width: 18rem; margin:20px; margin-left:50px;'>
                          <img class='card-img-top' src='../images/".$row['image']."' alt='Card image cap'>
                          <div class='card-body'>
                            <h5 class='card-title'>Détails Spectacle</h5>
                            <p class='card-text'>Nom: ".$row['nomSpectacle']."</p>
                            <p class='card-text'>Date: ".$row['dateSpectacle']."</p>
                            <p class='card-text'>Heure: ".$row['heureSpectacle']."</p>
                            <p class='card-text'>Places Disponible: ".$row['nbPlacesDisponible']."</p>
                              <a href='detail_spectacle.php?nomSpectacle=".$row['nomSpectacle']. "&dateSpectacle=".$row['dateSpectacle']."' class='btn btn-primary'>Read More</a>
                          </div>
                        </div></div></div></center>";
                        }
                        echo "<center><div class='row'><div class='col-sm-4'><div class='card' style='width: 18rem; margin:20px; margin-left:50px;'>
                        <img class='card-img-top' src='../images/".$row['image']."' alt='Card image cap'>
                        <div class='card-body'>
                          <h5 class='card-title'>Détails Spectacle</h5>
                            <p class='card-text'>Nom: ".$row['nomSpectacle']."</p>
                            <p class='card-text'>Date: ".$row['dateSpectacle']."</p>
                            <p class='card-text'>Heure: ".$row['heureSpectacle']."</p>
                            <p class='card-text'>Places Disponible: ".$row['nbPlacesDisponible']."</p>
                          <a href='detail_spectacle.php?nomSpectacle=".$row['nomSpectacle']. "&dateSpectacle=".$row['dateSpectacle']."' class='btn btn-primary'>Read More</a>
                        </div>
                      </div></div></div></center>";
                      $count = $count + 1;
										}
                    echo("</div></center>");
								?>
					</div>
			</div>
    </div>
	

                        </div> 
                        <div id="result"></div>
                        
</body>

<script type="text/javascript" src="../js/consulterSpectacles.js"></script>
</html>
