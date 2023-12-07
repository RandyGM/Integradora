<html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="icon" href="img/Logo.png" type="image/png">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/style2.css">
    <link rel="stylesheet" href="Styles/generalstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto+Condensed:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <?php session_start(); ?>
    <header>
        <nav>
            <ul class="nav-bar">
                <li class="logo"><a href="#"><img src="img/Logo.png" alt="Logo"></a></li>
                <input type="checkbox" id="check">
                <span class="menu">
                    <li><a href="inicio.html">Inicio</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="actividades.html">Actividades</a></li>
                    <li><a href="acercade.html">Acerca De</a></li>
                    <label for="check" class="close-menu"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></label>
                </span>
                <label for="check" class="open-menu"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></label>
            </ul>
        </nav>
    </header>

    <div id="perfil">
        <form id="cerrar" action="cerrar_sesion.php" method="post">
            <h2>Perfil</h2>
            <hr>
            <img src="img/images.jpg" alt="Perfil">
            <br>
            <label for="username">Usuario</label>
            <p><?php echo $_SESSION['nombre']; ?></p>
            <br>
            <label for="email">Email</label>
            <p><?php echo $_SESSION['correo']; ?></p>
            <br>
            <input type="submit" name="cerrar" value="Cerrar Sesión">
        </form>
    </div>

</body>
</html>