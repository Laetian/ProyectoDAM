<!DOCTYPE html>
<html lang="es">
<?php
 //require LoginController
 require_once 'controller/LoginController.php';
 require_once 'controller/PlacaController.php';
 //create LoginController object
 $login = new LoginController();
 $placa_controller = new PlacaController();
//start session and check if user is logged in
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add bootstrap 5 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- add fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <!-- bootstrap navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Parking Shield</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="graficos.php">Gráficos</a>
            </li>
            </form>
        </div>
    </nav>
    <!-- end of bootstrap navbar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- logout form -->
                <form action="" method="post">
                    <input type="submit" name="logout" id="logout" value="Logout" class="btn btn-danger">
                </form>
                <?php
                    //if submit button is clicked call tu function logout
                    if(isset($_POST['logout'])){
                        $login->logout();
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- divider -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    <!-- create table with Matrícula, Modelo, Color, Ubicación, Intervención and add button of Ver blue and Solucionado green using crud.php and getAllPlacas-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Ubicación</th>
                            <th>Intervención</th>
                            <th>Solucionado</th>
                            <th>Ver</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //loop through placas
                        foreach($placa_controller->getAllPlacas() as $placa){
                            echo '<tr>';
                            echo '<td>'.$placa['matricula'].'</td>';
                            echo '<td>'.$placa['modelo'].'</td>';
                            echo '<td>'.$placa['color'].'</td>';
                            echo '<td>'.$placa['ubicacion'].'</td>';
                            echo '<td>'.$placa['intervencion'].'</td>';
                            //if solucionado equals 0 echo no else echo yes
                            if($placa['solucionado'] == 0){
                                echo '<td>No</td>';
                            }else{
                                echo '<td>Sí</td>';
                            }
                            echo '<td><a href="ver_placa.php?id='.$placa['id'].'" class="btn btn-primary">Ver</a></td>';
                            echo '<td><a href="editar_placa.php?id='.$placa['id'].'" class="btn btn-warning">Editar</a></td>';
                            echo '</tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    <!-- footer with copyright and rrss -->
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
<!-- facebook logo fontawesome -->
            <a href="https://www.facebook.com/ParkingShield-105799674416097/"><i class="fab fa-facebook-square"></i></a>
<!-- twitter logo fontawesome -->
            <a href="https://twitter.com/ParkingShield"><i class="fab fa-twitter-square"></i></a>
<!-- instagram logo fontawesome -->
            <a href="https://www.instagram.com/parkingshield/"><i class="fab fa-instagram"></i></a>

        </div>
    </footer>
    

    <!-- add bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</body>
</html>
