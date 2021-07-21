<?php 
   session_start(); 
?>
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
   <?php
      require_once('../admin/spectacle/Spectacle.php');
      $spectacle = new Spectacle();
      $row = $spectacle->getDetailsSpectacle($_GET["nomSpectacle"],$_GET["dateSpectacle"]);
      echo "<center><div id='img_div'>";
      echo "<img style='margin:50px;' height='200' width='500' src='http://localhost/gestion_salle_spectacle/images/".$row['image']."' >";
      echo "</div><br><br><p>".$row['description']."</p><br><br><a href='login.php' class='btn btn-success'>Réserver</a><a style='margin-left:20px;' href='index.php' class='btn btn-danger'>Annuler</a></center>";
      $_SESSION["nomSpectacle"] = $_GET["nomSpectacle"];
      $_SESSION["dateSpectacle"] = $_GET["dateSpectacle"];
   ?>
</body>
</html>
