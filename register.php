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

    if(!empty($password)){
        $password_validated = true;
    }else{
        $password_validated =false;
        $errors['password'] = 'La contraseña no es correcta';
    }

    $save_user = false;
    if(count($errors) == 0){
        $save_user = true;

        //Cifrar contraseña
        $password_security = password_hash($password, PASSWORD_BCRYPT,['cost=>4']);
        
        $sql = "INSERT INTO usuarios VALUES(null,'$name','$lastname','$email', '$password_security', CURDATE());";
        $save = mysqli_query($conexion ,$sql);

        if($save_user){
            $_SESSION['completed'] = "El registro Se ha completado con exito";
        }else{
            $_SESSION['errors']['general'] = "Fallo al guardar el usuario!";
        }
    }else{
        $_SESSION['errors'] = $errors;
    }
    
    
    
}
header('location: index.php');
?>