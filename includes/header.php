<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Blog de Video Juegos</title>
</head>

<body>
    <!-- header -->

    <header class="header">
        <div class="logo">
            <a href="index.php">
                Blog de Video Juegos
            </a>
        </div>

        <!-- menu -->
        
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <?php
                    $categorys = categoryList($conexion);
                    if(!empty($categorys)):
                        while($category = mysqli_fetch_assoc($categorys)): 
                ?>
                            <li><a href="category.php?id=<?= $category['id'] ?>"><?= $category['nombre'] ?></a></li>
                <?php
                        endwhile;
                    endif; 
                ?>
                <li><a href="">Sobre Mi</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">