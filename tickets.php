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
            <a href="category.php?id=<?= $ticket_current['categoria_id'] ?>">
                <h2><?= $ticket_current['categoria'] ?></h2>
            </a>
            <h4><?= $ticket_current['fecha'] ?> | <?= $ticket_current['usuario'] ?> </h4>
            <p>
                <?= $ticket_current['descripcion'] ?>
            </p>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['id']== $ticket_current['usuario_id']): ?>
            <div class="box-buttom size-buttom">
                <a href="edit-ticket.php" class="button">Editar ticket</a>
                <a href="delete-ticket.php" class="button">Borrar Ticket</a>
            </div>
            <?php endif; ?>
            
        </main>
    


    <!-- footer -->

    <?php require_once 'includes/footer.php'?>
</body>

</html>