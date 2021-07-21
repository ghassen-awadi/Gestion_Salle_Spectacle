<?php
        require_once('Visiteur.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
                if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"]))
                {
                    $visiteur = new Visiteur();
                    $visiteur->ajouterVisiteur($_POST["nom"]." ".$_POST["prenom"],$_POST["email"],$_POST["password"]);
                }
        }
        
?>
<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card" style="margin-top: 50px;">
                            <div class="card-header" style="text-align: center; font-style: oblique;"><h2>Sign up</h2></div>
                            <div class="card-body">

                                <form class="form-horizontal">

                                    <div class="form-group">
                                        <label for="nom" class="cols-sm-2 control-label">Nom</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Saisir votre nom" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom" class="cols-sm-2 control-label">Prénom</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisir votre prénom" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Saisir votre email" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Mot De Passe</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Saisir le mot de passe" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm" class="cols-sm-2 control-label">Confirmer Mot De Passe</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirmer votre mot de passe" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button type="button" class="btn btn-primary btn-lg btn-block login-button" id="register">Register</button>
                                    </div>
                                  
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>
<script src="../js/register.js"></script>
</body>
</html>