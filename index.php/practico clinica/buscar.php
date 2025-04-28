
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>buscador de doctores</title>
<link rel="stylesheet" href="">
</head>

<body>
<h1>Buscar Doctor</h1>
<h3> buscar turno con su nombre
<form action="" method="POST">
  <input placeholder="nombre" type="text" name="nombre"><br>
  <button type="submit">buscar Doctor</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try {
  $conexion = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
  echo "este es el doctor:";

  $nombre = $_POST['nombre']; 

  if (!empty($nombre)) {
      $tabla = $conexion->query("SELECT * FROM doctores WHERE nombre='$nombre'");

      foreach ($tabla as $date) {
          echo "Nombre: " . $date['nombre'] . "<br>";
          echo "Apellido: " . $date['apellido'] . "<br>";
          echo "dni: " . $date['dni'] . "<br>";
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

<p>volver a sacar turnos</p>
<a href=turnos.php>turnos</a>

 