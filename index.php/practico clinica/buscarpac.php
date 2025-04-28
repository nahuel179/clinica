<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Pacientes</title>
</head>
<body>
    <h1>Búsqueda de Pacientes</h1>
    <form method="POST" action="">
        <label for="dni">Ingrese el DNI del paciente:</label><br>
        <input type="text" id="dni" name="dni" required>
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
            echo "Resultado de la búsqueda:<br>";

            $dni = $_POST['dni']; 

            if (!empty($dni)) {
              
                $consulta = "SELECT * FROM pacientes WHERE Dni = '$dni'";
                $tabla = $conexion->query($consulta);
 
            
                foreach ($tabla as $date) {
                     
                    echo "<p>Nombre: " . $date['nombre'] . "</p>";
                    echo "<p>Apellido: " . $date['apellido'] . "</p>";
                    echo "<p>DNI: " . $date['dni'] . "</p>";
                    echo "<p>Fecha de nacimiento: " . $date['fecha_nacimiento'] . "</p>";
                    echo "<p>Número de contacto: " . $date['numero_contacto'] . "</p>";
                    echo "<p>Obra social: " . $date['obra_social'] . "</p>";
                    echo "<hr>";
                }

                if (!$consulta) {
                    echo "No es un paciente registrado.";
                }
            } else {
                echo "Por favor, ingrese un DNI válido.";
            }

            echo "</div>";
        } catch (PDOException $e) {
            echo "<p class='sin-resultado'>Error en la conexión: " . $e->getMessage() . "</p>";
        }
    }
    ?>

<p>volver al comienzo</p>
<a href=index.html>comienzo</a>

<p>ir a sacar turno</p>
<a href=turnos.php>turnos</a>
</body>
</html>
