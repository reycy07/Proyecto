<?php require_once 'includes/header.php'?>

<?php
 $category= categoryPage($conexion, $_GET['id']);
 if(empty($category)){
     header("location:index.php");
 }
     ?>    
        <!-- side bar -->
        <?php require_once 'includes/sidebar.php' ?>
        
        <!-- main -->
        <main class="main">

            <h1>Entradas de <?= $category['nombre'] ?></h1>

            <?php
            $tickes = viewTickes($conexion, null, $_GET['id']);
            if(!empty($tickes)):
                while($insert = mysqli_fetch_assoc($tickes)):
            ?>

                        <article class="post">
                            <a href="">
                                <h2><?=$insert['titulo']?></h2>
                                <span class="date"><?= $insert['categoria'].' | '. $insert['fecha'] ?></span>
                                <p>
                                   <?= $insert['descripcion'] ?>
                                </p>
                            </a>
                        </article>   

             <?php 
                endwhile;
            endif;
            ?>

           

            <div class="details">
                <a href="all-tickets.php">Ver todas las entradas</a>
            </div>
        </main>
    


    <!-- footer -->

    <?php require_once 'includes/footer.php'?>
</body>

</html>