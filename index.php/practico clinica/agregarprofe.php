<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=doctores.css>
    <title>profesional</title>
 
</head>
<body>
<form action="" method="POST">
        <input name="nombre" placeholder="nombre" ><br>
        <input name="apellido" placeholder="apellido"><br>
        <input name="dni" placeholder="dni"><br>
        <input name="correo_electronico" placeholder="correo_electronico"><br>
        <input name="fecha_nacimiento" type="date" placeholder=" fecha_nacimiento"><br>
        <input name="operado" placeholder="operado"><br>
        <input name="direccion" placeholder="direccion"><br>
        <input name="profesion" placeholder="especialidades"><br>
        <button type="submit"> agregar doctor </button>
    </form>
 
    <?php

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {

            $conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
            echo "Doctor agregado<br>";
 
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $correo_electronico=$_POST['correo_electronico'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $profesion = $_POST['profesion'];
            $operado = $_POST['operado'];
            $direccion = $_POST['direccion'];
          

  
            if (!empty($nombre) && !empty($apellido) && !empty($dni) && !empty($fecha_nacimiento) && !empty($direccion) && !empty($correo_electronico) && !empty($profesion) && !empty($operado) ) {

                $conexion->query ("INSERT INTO doctores (`id`, `nombre`, `apellido`, `Dni`, `fecha_nacimiento`, `operado`, `direccion`, `profesion`, `correo_electronico`)
                VALUES (NULL, '$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$operado', '$direccion', '$profesion', '$correo_electronico')");
          
   } else {
    echo "Todos los datos son obligatorios.";
}
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
<p>volver al comienzo</p>
<a href=index.html>comienzo</a>