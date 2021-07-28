<?php 

$sever      = 'localhost';
$username   = 'root';
$password   = 'SINdB.oyo[qv!uEI';
$database   = 'blog_master';
$conexion   = mysqli_connect($sever, $username,$password, $database);

mysqli_query($conexion,"SET NAMES 'utf8'");

if(mysqli_connect_errno()){
    echo "la conexion a la base de datos SQL ha falldo".mysqli_connect_error();
}
// iniciar la sesion
if(!isset($_SESSION)){
    session_start();
}

?>