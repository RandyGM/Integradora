<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Registros</title>
</head>
<body>

<?php
include("conexion.php");

$acceso_db = mysqli_select_db($cone, $bd);
if ($acceso_db) {
    echo "Acceso a la base de datos realizado exitosamente ";
} else {
    echo "Error en el acceso a la base de datos ";
}

//Consulta 
$sql = "SELECT * FROM registro";
$result = mysqli_query($cone, $sql);
?>

<table>
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>correo</th>
        <th>contraseña</th>
        <th>Acciones</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['correo'] . "</td>";
        echo "<td>" . $row['contraseña'] . "</td>";
        echo "<td> <a href='editar.php?ideditar=" . $row['id'] . "'>Editar</a> - ";
        echo "<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='eliminar.php?ideliminar=" . $row['id'] . "'>Eliminar</a> </td>";
        echo "</tr>";
    }

    $cone->close();
    ?>
</table>

</body>
</html>
