<?php 
if(isset($_POST)){
    require_once'includes/conexion.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($conexion,$_POST['name']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conexion,$_POST['description']) : false;
    $idCategory = isset($_POST['category']) ? (int)$_POST['category'] : false;
    $user = $_SESSION['user']['id'];


    //validacion

    $errors = array();

    if(empty($name)){
        $errors['name']= 'El titulo no es váldio';
    }

    if(empty($description)){
        $errors['description']= 'No se ha ingresado el texto de la descripción';
    }

    if(empty($idCategory)&& !is_numeric($idCategory)){
        $errors['category']= 'No has seleccionado una categoria';
    }


    if(count($errors) == 0){
        $sql = "INSERT INTO entradas VALUES (NULL,'$user','$idCategory','$name','$description',CURDATE());";
        $saveTicket = mysqli_query($conexion, $sql);

        header('location:index.php');
        
    }else{
        $_SESSION["errors_into"] = $errors;
        header('location:create-tickets.php');
    }

}


?>