<?php
//import database class from model folder
require_once 'Database.php';
//create model Placa with attributes id, matricula, modelo, color, ubicacion, intervencion
class Placa{
    private $id;
    private $matricula;
    private $modelo;
    private $color;
    private $ubicacion;
    private $intervencion;
    private $comentarios;
    private $solucionado;
    //create constructor
    public function __construct($id, $matricula, $modelo, $color, $ubicacion, $intervencion, $comentarios, $solucionado){
        $this->id = $id;
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->ubicacion = $ubicacion;
        $this->intervencion = $intervencion;
        $this->comentarios = $comentarios;
        $this->solucionado = $solucionado;
    }

    //getters and setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getMatricula(){
        return $this->matricula;
    }
    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function getUbicacion(){
        return $this->ubicacion;
    }
    public function setUbicacion($ubicacion){
        $this->ubicacion = $ubicacion;
    }
    public function getIntervencion(){
        return $this->intervencion;
    }
    public function setIntervencion($intervencion){
        $this->intervencion = $intervencion;
    }
    public function getComentarios(){
        return $this->comentarios;
    }
    public function setComentarios($comentarios){
        $this->comentarios = $comentarios;
    }
    public function getSolucionado(){
        return $this->solucionado;
    }
    public function setSolucionado($solucionado){
        $this->solucionado = $solucionado;
    }
}




?>