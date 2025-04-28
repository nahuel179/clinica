
<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
    echo "conexion ok<br>";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $numero_telefono = $_POST['numero_telefono'];
        $correo_electronico = $_POST['correo_electronico'];
        $Fecha_de_turno = $_POST['Fecha_de_turno'];
        $hora = $_POST['hora'];
        $profesion = $_POST['profesion'];
        
        if (!empty($nombre) && !empty($apellido) && !empty($dni) && !empty($Fecha_de_turno) && 
        !empty($numero_telefono) && !empty($correo_electronico)  && !empty($hora) && !empty($profesion)) {

           $conexion->query("INSERT INTO `turnos` (`id`, `nombre`, `apellido`,
            `Dni`, `correo_electronico`, `numero_telefono`, `Fecha_de_turno`, `hora`,`profesion`) 

        VALUES (NULL, '$nombre', '$apellido', '$dni', '$correo_electronico', 
        '$numero_telefono', '$Fecha_de_turno', '$hora','$profesion')");

            echo "Turno guardado correctamente.";
        } else {
            echo "Todos los datos son obligatorios.";
        }
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="turnos.css">
    <title>Turnos</title>
</head>
<body>
    
    <h1>Turnos</h1>
    <h2>¿Quieres guardar un turno?</h2>
    <h3>"Tienes que llenar estos datos para guardar su turno"</h3>
    
    <form action="" method="POST">
        <input placeholder="Nombre" type="text" name="nombre"><br>
        <input placeholder="Apellido" type="text" name="apellido"><br>
        <input placeholder="DNI" type="text" name="dni"><br>
        <input placeholder="Correo electrónico" type="text" name="correo_electronico"><br>
        <input placeholder="Número de teléfono" type="text" name="numero_telefono"><br>
        <input placeholder="Fecha_de_turno" type="date" name="Fecha_de_turno"><br>
        <input placeholder="Hora" type="time" name="hora">

        <select name="profesion" id="profesion">
            
            
            <?php
           if ($conexion) {
            $from = $conexion->query("SELECT * FROM `doctores`");
            foreach ($from as $dato) {
                echo "<option value='" . $dato['profesion'] . "'>" . $dato['profesion'] . "</option>";
            }
        }  
            ?>
        </select>

        <input type="submit" name="turno" value="Guardar turno">
    </form>

    <p>volver al comienzo</p>
    <a href=index.html>comienzo</a>

    <p>buscar doctor</p>
<a href=buscar.php>doctor</a>
 
 