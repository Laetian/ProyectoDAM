<?php
//require model/Database.php
require_once 'model/Database.php';
require_once 'model/Admin.php';
//create AdminController class
class AdminController{

    //constructor
    public function __construct(){

    }

    //create getAdminByEmail function using PDO
    public function getAdminByEmail($email){
        //create new instance of Database class
        $db = new Database();
        //create query to select admin by email
        $stmt = $db->getConnection()->prepare("SELECT * FROM administrador WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $admin = new Admin($result['id'], $result['email'], $result['usuario'], $result['pass']);
        return $admin;
    }


}

?>