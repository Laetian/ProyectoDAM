<?php

//create PlacaController class
class PlacaController{

    //constructor
    public function __construct(){

        require_once 'model/Database.php';
        require_once 'model/Placa.php';
    }

    //get all placas
    public function getAllPlacas(){
        $db = new Database();
        $stmt = $db->getConnection()->prepare("SELECT * FROM placas");
        $stmt->execute();
        $result = $stmt->fetchAll();
        //return placas
        return $result;
    }
    //update solucionado
    public static function updateSolucionado($id, $solucionado){
        $db = new Database();
        //if solucionado is 1, set to 0 and vice versa
        if($solucionado == 1){
            $stmt = $db->getConnection()->prepare("UPDATE placas SET solucionado = 0 WHERE id = :id");
        }else{
            $stmt = $db->getConnection()->prepare("UPDATE placas SET solucionado = 1 WHERE id = :id");
        }
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
        //get placa by id
        public static function getPlacaById($id){
            $db = new Database();
            $stmt = $db->getConnection()->prepare("SELECT * FROM placas WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $placa = new Placa($result['id'], $result['matricula'], $result['modelo'],$result['color'],
                                $result['ubicacion'],$result['intervencion'],$result['comentarios'],$result['solucionado']);
    
            return $placa;
        }

        //delete placa
        public static function deletePlaca($id){
            $db = new Database();
            $stmt = $db->getConnection()->prepare("DELETE FROM placas WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            header("Location: home.php");
        }

        //update placa
        public static function updatePlaca($id, $matricula, $modelo, $color, $ubicacion, $intervencion, $comentarios, $solucionado){
            $db = new Database();
            $stmt = $db->getConnection()->prepare("UPDATE placas SET matricula = :matricula, modelo = :modelo, color = :color, ubicacion = :ubicacion, intervencion = :intervencion, comentarios = :comentarios, solucionado = :solucionado WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":matricula", $matricula);
            $stmt->bindParam(":modelo", $modelo);
            $stmt->bindParam(":color", $color);
            $stmt->bindParam(":ubicacion", $ubicacion);
            $stmt->bindParam(":intervencion", $intervencion);
            $stmt->bindParam(":comentarios", $comentarios);
            $stmt->bindParam(":solucionado", $solucionado);
            $stmt->execute();
            header("Location: home.php");
        }
}

?>
