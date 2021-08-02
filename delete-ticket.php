<?php 
require_once 'includes/conexion.php';
session_start();

if(isset($_SESSION['user']) && isset($_GET['id']) ){
    $input_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];

    $sql = "DELETE FROM entradas WHERE usuario_id = '$user_id' AND id = '$input_id'";

    $delete = mysqli_query($conexion, $sql);
}

header("location:index.php");

?>