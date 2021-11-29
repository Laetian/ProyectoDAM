<?php
session_start();
//check if user is logged in
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
//require solucionado.php
require_once 'controller/DatabaseController.php';
//get the id from url
$id = $_GET['id'];
//create object Database
$db = new DatabaseController();
//get placa by id
$placa = $db->getPlacaById($id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add bootstrap css from url-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Solucionar</title>
</head>
<body>
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
    <!-- container form -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Solucionar</h3>
                    </div>
                    <div class="panel-body">
                    <form action="" method="post" class="form-rounded">
                        <div class="form-group">
                            <label for="placa">Matrícula</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $placa->getMatricula(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="placa">Modelo</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $placa->getModelo(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="placa">Color</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $placa->getColor(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="placa">Ubicación</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $placa->getUbicacion(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="placa">Intervención</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $placa->getIntervencion(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="placa">Comtenarios</label>
                            <input type="textArea" class="form-control" id="placa" name="placa" value="<?php echo $placa->getComentarios(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="placa">Solucionado</label>
                            <?php
                                //if solucionado is 1 display text Solucionado else display text No solucionado
                                if($placa->getSolucionado() == 1){
                                    echo '<input type="text" class="form-control" id="placa" name="placa" value="Solucionado" readonly>';
                                }else{
                                    echo '<input type="text" class="form-control" id="placa" name="placa" value="No solucionado" readonly>';
                                }
                            ?>

                        </div>

                        <!-- back to home.php -->
                        <a href="home.php" class="btn btn-primary">Volver</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>