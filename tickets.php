<?php require_once 'includes/header.php'?>

<?php
 $ticket_current= ticketPage($conexion, $_GET['id']);

 if(empty($ticket_current)){
     header("location:index.php");
     }
     ?>    
        <!-- side bar -->
        <?php require_once 'includes/sidebar.php' ?>
        
        <!-- main -->
        <main class="main">

            <h1>Entradas de <?= $ticket_current['titulo'] ?></h1>
            <h2><?= $ticket_current['categoria'] ?></h2>
            <h4><?= $ticket_current['fecha'] ?></h4>
            <p>
                <?= $ticket_current['descripcion'] ?>
            </p>

            
        </main>
    


    <!-- footer -->

    <?php require_once 'includes/footer.php'?>
</body>

</html>