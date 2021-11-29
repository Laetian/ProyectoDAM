<?php
//import model database
require_once './model/Database.php';
//database controller
class DatabaseController{
    //get all placas
    public function getPlacas(){
        $db = new Database();
        $db->query('SELECT * FROM placa');
        $placas = $db->resultSet();
        return $placas;
    }
    //get placa by id
    public function getPlaca($id){
        $db = new Database();
        $db->query('SELECT * FROM placa WHERE id = :id');
        $db->bind(':id', $id);
        $placa = $db->single();
        return $placa;
    }
    //add new placa
    public function addPlaca($matricula, $modelo, $color, $ubicacion){
        $db = new Database();
        $db->query('INSERT INTO placa (matricula, modelo, color, ubicacion) VALUES (:matricula, :modelo, :color, :ubicacion)');
        $db->bind(':matricula', $matricula);
        $db->bind(':modelo', $modelo);
        $db->bind(':color', $color);
        $db->bind(':ubicacion', $ubicacion);
        $db->execute();
        return $db->lastInsertId();
    }
    //update placa
    public function updatePlaca($id, $matricula, $modelo, $color, $ubicacion){
        $db = new Database();
        $db->query('UPDATE placa SET matricula = :matricula, modelo = :modelo, color = :color, ubicacion = :ubicacion WHERE id = :id');
        $db->bind(':id', $id);
        $db->bind(':matricula', $matricula);
        $db->bind(':modelo', $modelo);
        $db->bind(':color', $color);
        $db->bind(':ubicacion', $ubicacion);
        $db->execute();
    }
    //delete placa
    public function deletePlaca($id){
        $db = new Database();
        $db->query('DELETE FROM placa WHERE id = :id');
        $db->bind(':id', $id);
        $db->execute();
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

}
?>