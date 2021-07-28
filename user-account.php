<?php require_once 'includes/redirect.php' ?>
<!-- header -->
<?php require_once 'includes/header.php'?>
<!-- side bar -->
<?php require_once 'includes/sidebar.php'?>

<main class="main">
    <h2>Mis datos</h2>
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
                <form action="update-user.php" method="POST">

                    <label for="name">Nombre</label>
                    <input type="text" name="name" value="<?= $_SESSION['user']['nombres']; ?>" />

                    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : ''; ?>

                    <label for="lastname">Apellido</label>
                    <input type="text" name="lastname" value="<?= $_SESSION['user']['apellidos']; ?>" />

                    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : ''; ?>
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?= $_SESSION['user']['email']; ?>" />
                    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ''; ?>

                    <input type="submit" value="Actulizar" name="submit" />
                </form>
        <?php deleteError()?>
    <form action=""></form>

</main>
<!-- footer -->
<?php require_once 'includes/footer.php'?>