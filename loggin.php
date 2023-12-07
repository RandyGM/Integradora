<html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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
                    <li><a href="registro.php">Registro</a></li>
                    <li><a href="indexacercade.html">Acerca De</a></li>
                    <label for="check" class="close-menu"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></label>
                </span>
                <label for="check" class="open-menu"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></label>
            </ul>
        </nav>
    </header>
    
    <div id="loggin">
        <form id="terminoform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>Iniciar Sesión</h2>
            <hr>
            <label for="username">Usuario</label>
            <br>
            <input type="text" id="username" name="username" placeholder="Ingresa el Usuario" required>
            <br>
            <label for="password">Contraseña</label>
            <br>
            <input type="password" id="password" name="passwordform" placeholder="Ingresa la Constraseña" required>
            <br>
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrarse</a></p>
            <br>
            <input type="submit" name="terminoform" value="Continuar">
        </form>
    </div>
    



</body>
</html>

<?php

if (isset ($_POST ['terminoform'])) {
    session_start();
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Asegurarse de que no hay espacios en blanco adicionales y escapar datos
        $nombre = mysqli_real_escape_string($cone, trim($_POST['username']));
        $contra = mysqli_real_escape_string($cone, trim($_POST['passwordform']));
    
        // Verificar datos para depuración
        echo "nombre: $nombre<br>";
        echo "Contraseña: $contra<br>";
    
        $sql = "SELECT * FROM registro WHERE nombre='$nombre' AND contraseña='$contra'";
        $result = mysqli_query($cone, $sql);
    
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                // Inicio de sesión exitoso
                $row = mysqli_fetch_assoc($result);
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['nombre'] = $row['nombre'];
                echo "Inicio de sesión exitoso"; // Mensaje de depuración
                var_dump($row); // Verificar datos obtenidos
                header("location:inicio.html");
                exit;
            } else {
                echo "Correo o contraseña incorrectos";
            }
        } else {
            echo "Error en la consulta: " . mysqli_error($cone);
        }
    
        mysqli_free_result($result);
    }
    
    mysqli_close($cone);
}
?>