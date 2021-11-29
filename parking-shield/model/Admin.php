<?php
//require Database
require_once 'model/Database.php';
//create admin model with attributes id, email, usuario, pass
class Admin{
    private $id;
    private $email;
    private $usuario;
    private $pass;
    
    //constructor   
    public function __construct($id, $email, $usuario, $pass){
        $this->id = $id;
        $this->email = $email;
        $this->usuario = $usuario;
        $this->pass = $pass;
    }
    
    //getters
    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getPass(){
        return $this->pass;
    }
    
    //setters
    public function setId($id){
        $this->id = $id;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function setPass($pass){
        $this->pass = $pass;
    }

    //get Admin by email
    public static function getAdminByEmail($email){
        $db = new Database();
        $req = $db->prepare('SELECT * FROM admin WHERE email = :email');
        $req->execute(array('email' => $email));
        $admin = $req->fetch();
        return new Admin($admin['id'], $admin['email'], $admin['usuario'], $admin['pass']);
    }
}

?>