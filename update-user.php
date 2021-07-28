<?php 

if(isset($_POST)){

    require_once "includes/conexion.php";


    // guardamos los datos en varibales
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conexion,$_POST['name']) : false ;

    $lastname =isset($_POST['lastname']) ? mysqli_real_escape_string($conexion, $_POST['lastname']) : false ;
    
    $email =isset($_POST['email']) ? mysqli_real_escape_string($conexion,$_POST['email']) : false;
     
    $password =isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : false;


    //Array con los Errores
    $errors = array();

    //validacion de los datos
    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $name_validated = true;
    }else{
        $name_validated = false;
        $errors['name'] = 'El Nombre no es valido' ;
    }

    if(!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)){
        $lastname_validated = true;
    }else{
        $lastname_validated = false;
        $errors['lastname'] = 'El Apellido no es valido' ;
    }

    if(!empty($email) && filter_var($email , FILTER_VALIDATE_EMAIL)){
        $emial_validated = true;
    }else{
        $emial_validated = false;
        $errors['emial'] = 'El Email no es valido' ;
    }


    $save_user = false;
    if(count($errors) == 0){
        $user = $_SESSION['user']['id'];
        $save_user = true;

        $sql= "SELECT id, email FROM usuarios WHERE email = '$email' AND id != '$user'";
        $isset_email = mysqli_query($conexion, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if($isset_user == $user || empty($isset_user)){
            
            $sql ="UPDATE usuarios SET ".
                  "nombres = '$name', ".
                  "apellidos ='$lastname', ".
                  "email = '$email' ".
                  "WHERE id = '$user'";
            $save = mysqli_query($conexion ,$sql);

            if($save_user){
                $_SESSION['user']['nombres'] = $name;
                $_SESSION['user']['apellidos'] = $lastname;
                $_SESSION['user']['email'] = $email;
                $_SESSION['completed'] = "Tus datos Se ha actulizado con exito";
            }else{
                $_SESSION['errors']['general'] = "Fallo al Actulizar Tu datos ";
            }
        }else{
            $_SESSION['errors']['general'] = "El usuario ya existe";  
        }
    }else{
        $_SESSION['errors'] = $errors;
    }
    
    
    
}
header('location: user-account.php');
 ?>