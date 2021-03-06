<?php require_once 'includes/header.php'?>

    
        <!-- side bar -->
        <?php require_once 'includes/sidebar.php' ?>

        <!-- main -->
        <main class="main">
            <h1>Ultimas Entradas</h1>

            <?php
            $tickes = viewTickes($conexion, true);
            if(!empty($tickes)):
                while($insert = mysqli_fetch_assoc($tickes)):
            ?>

                        <article class="post">
                            <a href="tickets.php?id=<?= $insert['id'] ?>">
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