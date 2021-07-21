<?php
        require_once('Spectacle.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
                  if (isset($_POST["nomSpectacle"]) && isset($_POST["dateSpectacle"]) && isset($_POST["heureSpectacle"]) && isset($_POST["nomOrganisateur"]) && isset($_POST["nomOrganisateur"]) && isset($_POST["description"]))
                {
                    $spectacle = new Spectacle();
                    $spectacle->modifierSpectacle($_POST["nomSpectacle"],$_POST["dateSpectacle"],$_POST["heureSpectacle"],$_POST["nomOrganisateur"],$_FILES["image"]["name"],$_POST["description"],$_POST["idSpectacle"]);
                        header("Refresh:0; url=index.php"); 
                }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="http://localhost/gestion_salle_spectacle/">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="http://localhost/gestion_salle_spectacle/admin/spectacle/">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Spectacles
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="http://localhost/gestion_salle_spectacle/admin/spectacle/">Gestion Spectacles</a>
                                    <a class="nav-link" href="http://localhost/gestion_salle_spectacle/admin/spectacle/AjouterSpectacle.php">Ajouter Spectacle</a>
                                </nav>
                            </div>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4 text-center">Modifier Spectacle</h1>
                        <div class="form-group">
                            <form action="ModifierSpectacle.php" method="post" enctype="multipart/form-data">
                                <?php
                                        $spectacle = new Spectacle();
                                        $row = $spectacle->getSpectacle($_GET["idSpectacle"]);
                                        echo "<center>";
                                        echo "<label for='idSpectacle'>ID:</label><input type='text' class='form-control' readonly id='idSpectacle' name='idSpectacle' value=$row[id]>";
                                        echo "<label for='nomSpectacle'>Nom Spectacle:</label><input type='text' class='form-control' id='nomSpectacle'  name='nomSpectacle' value=$row[nomSpectacle]>";
                                        echo "<label for='dateSpectacle'>Date Spectacle:</label><input type='date' class='form-control' id='dateSpectacle'  name='dateSpectacle' value=$row[dateSpectacle]>";
                                        echo "<label for='heureSpectacle'>Heure Spectacle:</label><input type='time'  class='form-control' id='heureSpectacle'  name='heureSpectacle' value=$row[heureSpectacle]>";
                                        echo "<label for='nomOrganisateur'>Nom Organisateur:</label><input type='text'  class='form-control' id='nomOrganisateur' name='nomOrganisateur' value=$row[nomOrganisateur]>";
                                         echo "<label for='image'>Image:</label><input type='file'  class='form-control' id='image' name='image' value=$row[image] accept='image/jpeg,image/png'>";
                                          echo "<label for='description'>Description:</label><textarea  class='form-control' id='description' name='description' rows='10'>$row[description]</textarea><br>";
                                        echo "<div ><input type='submit' class='btn btn-success' id='saveButton' value='Enregistrer' style='margin-right:15px;'><input type='button' class='btn btn-danger' id='cancelButton' value='Annuler' </div></center>";
                                ?>
                            </form>
                        </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="./js/ModiferSpectacle.js"></script>
    </body>
</html>
