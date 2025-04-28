<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profesional</title>
    <link rel="stylesheet" href="profe.css">
</head>

<body>
    <h1>Bienvenido Doctor</h1>
    <h2>historial clinica</h2>

    <h3> buscar turno con su DNI
    <form action="" method="POST">
        <input placeholder="dni" type="text" name="dni"><br>
        <button type="submit">mostrar turnos</button>
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
        echo "aca esta su paciente:";

        $dni = $_POST['dni']; 

        if (!empty($dni)) {
            $tabla = $conexion->query("SELECT * FROM turnos WHERE Dni='$dni'");

            foreach ($tabla as $date) {
                echo "Nombre: " . $date['nombre'] . "<br>";
                echo "Apellido: " . $date['apellido'] . "<br>";
                echo "dni: " . $date['dni'] . "<br>";
                echo "Fecha  turno: " . $date['fecha_de_turno'] . "<br>";
                echo "Correo Electrónico: " . $date['correo_electronico'] . "<br>";
                echo "Hora: " . $date['hora'] . "<br>";
                echo "profesion: " . $date['profesion'] . "<br>";
                echo "<br>";
            }
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


    
