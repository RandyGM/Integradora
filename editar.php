<?php
echo "<a href='inicio.html'>Registro</a>";
echo "<a href='consulta.php'>Consulta</a>";
//llamar archivo conexion.php
include("conexion.php");
$id=@$_GET['ideditar'];
$sql="SELECT * FROM registro WHERE ID='$id'";
$result = mysqli_query($cone,$sql);
$row=mysqli_fetch_assoc($result);
$nombre=$row['nombre'];
$correo=$row['correo'];
if(isset($_POST['update'])){
$nombreNUEVO=$_POST['nombrenuevo'];
$correoNUEVO=$_POST['emailnuevo'];
$sql = "UPDATE registro SET nombre='$nombreNUEVO',email='$correoNUEVO' WHERE ID='$id'";//comillasmen id
$result = mysqli_query($cone,$sql);
if($result){
mysqli_close($cone);
//echo "Registro actualizado exitosamente";
header('location:consulta.php');
}else{
echo "Error en la conexion";
}
}else{
echo "Error en la actualizacion";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <link rel="stylesheet" href="editstyle.css">
</head>
<body>
    <a href='loggin.html'>Home</a>
    <a href='consulta.php'>Consulta</a>
    <div class="central">
        <form method="post">
            <fieldset>
                <legend>
                    <h1>Actualizar Registro de Usuario</h1>
                    <h1>Data</h1>
                </legend>
                <label for="formvalue1">Name:</label>
                <input type="text" name="nombrenuevo" value="<?php echo $nombre; ?>">
                <br>
                <label for="formvalue2">Email:</label>
                <input type="text" name="emailnuevo" value="<?php echo $correo; ?>">
                <br>
            </fieldset>
            <p class="container">
                <input type="submit" name="update" value="Update" onclick="mensaje()">
                <input type="reset" value="Reset">
            </p>
            <script type='text/javascript'>function mensaje() {alert('Registro actualizado exitosamente');}
            </script>
        </form>
    </div>
</body>
</html>