<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="estila.css">
    <title>Clinica</title>
</head>
<body>

<h1>Clinica</h1>
    <form action="" method="POST">
        <input placeholder="Nombre" type="text" name="nombre"><br>
        <input placeholder="Apellido" type="text" name="apellido"><br>
        <input placeholder="DNI" type="text" name="dni"><br>
        <input placeholder="Fecha de nacimiento" type="date" name="fecha_nacimiento"> <br>
        <input placeholder="numero de contacto" type="text" name="numero_contacto"> <br>
        <input placeholder="obra social" type="text" name="obra_social"> <br>
        <input type="submit" name="turno" value="Guardar paciente">
    </form>

    <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       try {
           $conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
           echo "Paciente guardado<br>";
   
           $nombre = $_POST['nombre'];
           $apellido = $_POST['apellido'];
           $dni = $_POST['dni'];
           $fecha_nacimiento = $_POST['fecha_nacimiento'];
           $obra_social = $_POST['obra_social'];
           $numero_contacto = $_POST['numero_contacto'];
   
           if (!empty($nombre) && !empty($apellido) && !empty($dni) && !empty($fecha_nacimiento)) {
               $conexion->query("INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `Dni`, `fecha_nacimiento`, `obra_social`, `numero_contacto`)
               VALUES (NULL, '$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$obra_social', '$numero_contacto')");
           } else {
               echo "Todos los datos son obligatorios.";
           }
           
       } catch (PDOException $e) {
           echo "Error en la conexión: " . $e->getMessage();
       }
   }
   ?>
   

<p>volver al comienzo</p>
<a href=index.html>comienzo</a>

</body>
</html>
