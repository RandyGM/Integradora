<html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" href="img/Logo.png" type="image/png">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto+Condensed:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-bar">
                <li class="logo"><a href="#"><img src="img/Logo.png" alt="Logo"></a></li>
                <input type="checkbox" id="check">
                <span class="menu">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="loggin.php">Iniciar Sesión</a></li>
                    <li><a href="registro.html">Registro</a></li>
                    <li><a href="indexacercade.html">Acerca De</a></li>
                    <label for="check" class="close-menu"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                    <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></label>
                </span>
                <label for="check" class="open-menu"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></label>
            </ul>
        </nav>
    </header>
        
        <div id="registro">
            <form id="terminoform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h2>Registro</h2>
                <hr>
                <label for="username">Usuario</label>
                <br>
                <input type="text" id="username" name="username" placeholder="Ingresa el Usuario" required>
                <br>
                <label for="email">Email</label>
                <br>
                <input type="email" id="email" name="email" placeholder="Ingresa el Email" required>
                <br>
                <label for="password">Contraseña</label>
                <br>
                <input type="password" id="password" name="passwordform" placeholder="Ingresa la Constraseña" required>
                <br>
                <p>¿Ya tienes una cuenta? <a href="loggin.php">Iniciar Sesión</a></p>
                <div id="checkboxtermi">
                    <input type="checkbox" id="acepto" name="checkbox" required><p>Acepto los Terminos y Codiciones</p>
                </div>
                <br>
                <input type="submit" name="terminoform" value="Continuar">
            </form>
        </div>

    


    </body>
</html>

        <?php

        if (isset ($_POST ['terminoform'])) 
        {
            include ("conexion.php");
            $nombre =$_POST['username'];
            $correo =$_POST['email'];
            $contra =$_POST['passwordform'];
            $sql = "INSERT INTO registro (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contra')";
            header("location:loggin.php");
            ob_end_flush();
            $resultado = mysqli_query($cone, $sql);
            if ($resultado) {
                echo "Registro exitoso";
            } else {
                echo "Fallido";
            }
            mysqli_close($cone);
        }
        
        ?>