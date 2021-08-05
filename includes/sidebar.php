<aside class="sidebar">

    <?php if(isset($_SESSION['user'])) :?>
        <div id="user" class="block">
            <h3>Bienvenido <?= $_SESSION['user']['nombres'].' '.$_SESSION['user']['apellidos'] ?></h3>
                <a href="create-tickets.php" class="button button-green">Crear entradas</a>
                <a href="create-category.php" class="button button-green">Crear Categoria</a>
                <a href="user-account.php" class="button button-orange">Mis Datos</a>
                <a href="logout.php" class="button">Cerrar Sesión</a>
        </div>
        <?php elseif(isset($_SESSION['errors_login'])) :?>

            <div id="user" class="block alert-error">
                <h3><?= $_SESSION['errors_login'] ?></h3>
            </div>
            <?php endif ;?>


    <div class="block" id='search'>
    <h3>Buscar</h3>
        <form action="search.php" method="POST">
            
            <input type="text" name="searching">
            
            <input type="submit" value="Buscar" id= />
        </form>
    </div>        
    <?php if(!isset($_SESSION['user'])) :?>
    <div id="login" class="block">
        <h3>Indentificate</h3>
        <form action="login.php" method="POST">
            
            <label for="email">Email</label>
            <input type="email" name="email" id="" />
            
            <label for="password">Contraseña</label>
            <input type="password" name="password" id= />
            
            <input type="submit" value="Entrar" id= />
        </form>
    </div>
    
    
    <div id="register" class="block">

    
            
                <?php if(isset($_SESSION['completed'])) :?>
                    <div class="alert alert-success">
                        <?= $_SESSION['completed']; ?>
                    </div>
                <?php elseif(isset($_SESSION['errors']['general'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['errors']['general']; ?>
                    </div>
                <?php endif; ?>
        
                <h3>Registrate</h3>
                <form action="register.php" method="POST">

                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="" />

                    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : ''; ?>

                    <label for="lastname">Apellido</label>
                    <input type="text" name="lastname" id="" />

                    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : ''; ?>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="" />

                    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ''; ?>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password"  />

                    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : ''; ?>

                    <input type="submit" value="Registrar" name="submit" />
                </form>
        <?php deleteError()?>
        
        
    </div>
    <?php endif; ?>
            
</aside>