<?php
//require PlacaController
require_once 'controller/PlacaController.php';
//get the id from url
$id = $_GET['id'];
//create object Database
$pc = new PlacaController();
//get placa by id
$placa = $pc->getPlacaById($id);
//start session and check if user is logged in
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add bootstrap url -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Editar Placa</title>
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
    <!-- create edit form with bootstrap using placa -->
    <div class="container">
        <h1>Editar Placa</h1>
        <form action="" method="post">
        <div class="form-group">
                            <label for="placa">Matrícula</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $placa->getMatricula(); ?>"  >
                        </div>
                        <div class="form-group">
                            <label for="placa">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $placa->getModelo(); ?>"  >
                        </div>
                        <div class="form-group">
                            <label for="placa">Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="<?php echo $placa->getColor(); ?>"  >
                        </div>
                        <div class="form-group">
                            <label for="placa">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo $placa->getUbicacion(); ?>"  >
                        </div>
                        <div class="form-group">
                            <label for="placa">Intervención</label>
                            <input type="text" class="form-control" id="intervencion" name="intervencion" value="<?php echo $placa->getIntervencion(); ?>"  >
                        </div>
                        <div class="form-group">
                            <label for="placa">Comtenarios</label>
                            <input type="textArea" class="form-control" id="comentarios" name="comentarios" value="<?php echo $placa->getComentarios(); ?>"  >
                        </div>
                        <div class="form-group">
                            <label for="placa">Solucionado</label>
                            <?php
                             //dropdown list of solucionado
                                //if solucionado is 1 display text Solucionado else display text No solucionado
                               $placa->getSolucionado();
                                if($placa->getSolucionado() == 1){
                                    echo '<select class="form-control" name="solucionado">
                                            <option value="1">Solucionado</option>
                                            <option value="0">No Solucionado</option>
                                        </select>';
                                }else{
                                    echo '<select class="form-control" name="solucionado">
                                            <option value="0">No Solucionado</option>
                                            <option value="1">Solucionado</option>
                                        </select>';
                                }
                            ?>
                        <!-- hidden id -->
                        <input type="hidden" name="id" value="<?php echo $placa->getId(); ?>">
                        </div>
            <button type="submit" class="btn btn-warning ">Editar</button>
            <?php
                //if submit button is pressed update placa
                if(isset($_POST['matricula'])){
                    $pc->updatePlaca($_POST['id'],$_POST['matricula'], $_POST['modelo'], $_POST['color'], $_POST['ubicacion'], $_POST['intervencion'], $_POST['comentarios'], $_POST['solucionado']);
                }

            ?>
            <!-- back to home.php -->
            <a href="home.php" class="btn btn-primary">Volver</a>
        </form>
</body>
</html>