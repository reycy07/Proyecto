<?php 
//iniciar secion y conectar a la base de datos 
require_once "includes/conexion.php";
// session_start();

if($_POST){
    if(isset($_SESSION['error_login'])){
        session_unset();
    }

    $email_login = isset($_POST['email']) ? trim($_POST['email']): false;
    $password_login = isset($_POST['password']) ? $_POST['password']: false;
    
    
    $errors = array();

    $sql = "SELECT * FROM usuarios WHERE email = '$email_login';";

    $query = mysqli_query($conexion, $sql);


    if($query && mysqli_num_rows($query) == 1){

        $user = mysqli_fetch_assoc($query);
        $verify = password_verify($password_login, $user['pass']);
        
        if($verify){
            $_SESSION['user'] = $user;
            var_dump($_SESSION['user']);
            
        }else{
            $_SESSION['errors_login'] = 'login incorrecto';
        }
        
    }else{
        $_SESSION['errors_login'] = 'login incorrecto';
    }

}
header('location:index.php');

?>