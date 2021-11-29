<?php
//require Admin.php
require_once 'controller/AdminController.php';
//create class loginController
class LoginController{
    
    //constructor
    public function __construct(){
        //call method to check if user is logged in
        $this->isLoggedIn();
    }
    
    //method to check if user is logged in
    public function isLoggedIn(){
        //if user is logged in
        if(isset($_SESSION['user_id'])){
            //redirect to dashboard
            header('Location: home.php');
        }
    }
    
    //method to log user in
    public function login(){
        //if user is not logged in
        echo "entra en el login";
        if(!isset($_SESSION['username'])){
            echo "no hay usuario";
            //if user submits form
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //get email and password from form
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $admin_controller = new AdminController();
                //get admin from database
                $admin = $admin_controller->getAdminByEmail($email);
                
                //if admin exists
                if($admin){
                    echo "hay admin";
                    //if password is correct
                    if ($pass == $admin->getPass()){
                        //set session variables
                        session_start();
                        $_SESSION['user_id'] = $admin->getId();
                        $_SESSION['email'] = $admin->getEmail();
                        $_SESSION['username'] = $admin->getUsuario();
                        //redirect to dashboard
                        header('Location: home.php');
                    }else{
                        //set error message
                        echo '<div class="alert alert-danger">Wrong password</div>';
                    }
                }else{
                    //set error message
                    echo '<div class="alert alert-danger">Admin does not exist</div>';
                }
            }
        }else{
            //redirect to dashboard
            header('Location: home.php');
        }
    }
    
    //method to log user out
    public function logout(){
        //unset session variables
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['username']);
        
        //redirect to login
        header('Location: login.php');;
    }
}


?>