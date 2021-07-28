<?php require_once 'includes/redirect.php' ?>
<?php require_once 'includes/header.php'?>

    
        <!-- side bar -->
        <?php require_once 'includes/sidebar.php' ?>

        <main class="main">
            <h1>Crear Categorias</h1>

            <p>Añade nuevas categorias para nuevos blogs</p>

            <form action="save-category.php" method="POST">
                <label for="name">Nombre de la Categoria</label>
                <input type="text" name="name">

                <input type="submit" value="Guardar">
            </form>

        </main>

    <?php require_once 'includes/footer.php'?>

    </body>

</html>
