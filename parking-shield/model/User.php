<?php
//create user model with attributes id, usuario, clave, level
class User{
    private $id;
    private $usuario;
    private $clave;
    private $level;
    
    //constructor   
    public function __construct($id, $usuario, $clave, $level){
        $this->id = $id;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->level = $level;
    }
    //getters and setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getClave(){
        return $this->clave;
    }
    public function setClave($clave){
        $this->clave = $clave;
    }
    public function getLevel(){
        return $this->level;
    }
    public function setLevel($level){
        $this->level = $level;
    }
}

?>