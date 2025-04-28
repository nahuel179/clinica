<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eliminar</title>
</head>
<body>

<h1>quieres eliminar un turno Doctor?</h1>

<h2>eliminar turno</h2>

<form action="" method="POST">
        <input placeholder="DNI" type="text" name="dni"><br>
        <input type="submit" name="turno" value="eliminar turno">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {

            $conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
            echo "El turno fue eliminado<br>";
  
           
            $dni = $_POST['dni'];
           
          
            if (!empty($dni)) {

               $conexion->query("DELETE FROM `turnos` WHERE dni='$dni'");                                                                                                  

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

 