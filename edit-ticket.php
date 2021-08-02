<?php require_once 'includes/header.php'?>
<?php require_once 'includes/redirect.php'?>

<?php

$ticket_current= ticketPage($conexion, $_GET['id']);

//  if(empty($ticket_current)){
//      header("location:index.php");
//      }
     ?>    
        <!-- side bar -->
        <?php require_once 'includes/sidebar.php' ?>
        
        <!-- main -->
        <main class="main">
             <h1>Editar articulo Articulos</h1>

            <p>Edita tu entrada <?= $ticket_current['titulo'] ?></p>

            <form action="save-tickets.php" method="POST">
                <label for="name">Titulo:</label>
                <input type="text" name="name" value="<?= $ticket_current['titulo'] ?>"
                <?php echo isset($_SESSION['errors_into']) ? showErrors($_SESSION['errors_into'], 'name') : ''; ?>
                
                <label for="description">Descripción:</label>
                <textarea name="description">
                    <?= $ticket_current['descripcion'] ?>
                </textarea>
                    
                <?php echo isset($_SESSION['errors_into']) ? showErrors($_SESSION['errors_into'], 'description') : ''; ?>
                
                <label for="category">Categoria</label>
                
                <select name="category" id="">
                    <?php 
                        $categorys = categoryList($conexion);
                        if(!empty($categorys)):
                            while($category = mysqli_fetch_assoc($categorys)):
                                ?>
                                <option value="<?= $category['id']?>" <?= ($category['id'] == $ticket_current['categoria_id']) ? 'selected = "selected"' : '' ?>">
                                    <?= $category['nombre'] ?>
                                </option>
                                
                                <?php 
                            endwhile;
                        endif;
                        ?>
                </select>
                <?php echo isset($_SESSION['errors_into']) ? showErrors($_SESSION['errors_into'], 'category') : ''; ?>

                <input type="submit" value="Guardar">
            </form>
            <?php deleteError(); ?>
          
        </main>
    


    <!-- footer -->

    <?php require_once 'includes/footer.php'?>
</body>

</html> ?>