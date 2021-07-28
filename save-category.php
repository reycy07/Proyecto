<?php 

if(isset($_POST)){
    require_once 'includes/conexion.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($conexion,$_POST['name']) : false;

    $errors = array();

    if(!empty($name) && !is_numeric($name)){
        $name_validated = true;
    }else{
        $name_validated = false;
        $errors['name'] = 'El Nombre no es valido' ;
    }

    if(count($errors)== 0){
        $sql= "INSERT INTO categorias VALUES(NULL,'$name');";
        $saveCategory = mysqli_query($conexion,$sql);
    }
    
}

header('location:index.php');
?>