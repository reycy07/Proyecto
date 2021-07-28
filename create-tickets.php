<?php require_once 'includes/redirect.php' ?>
<?php require_once 'includes/header.php'?>

    
        <!-- side bar -->
        <?php require_once 'includes/sidebar.php' ?>

        <main class="main">
            <h1>Crear Articulos</h1>

            <p>Añade nuevas entradas de juegos para este blogs</p>

            <form action="save-tickets.php" method="POST">
                <label for="name">Titulo:</label>
                <input type="text" name="name">
                <?php echo isset($_SESSION['errors_into']) ? showErrors($_SESSION['errors_into'], 'name') : ''; ?>
                
                <label for="description">Descripción:</label>
                <textarea name="description">
                </textarea>
                    
                <?php echo isset($_SESSION['errors_into']) ? showErrors($_SESSION['errors_into'], 'description') : ''; ?>
                
                <label for="category">Categoria</label>
                
                <select name="category" id="">
                    <?php 
                        $categorys = categoryList($conexion);
                        if(!empty($categorys)):
                            while($category = mysqli_fetch_assoc($categorys)):
                                ?>
                                <option value="<?= $category['id']?>">
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


        <?php require_once 'includes/footer.php'?>

        </body>

</html>
