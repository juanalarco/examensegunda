<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <a href="muestraUsuario.php?id=">Buscar Usuarios por ID</a>

    <br>
    <br>
    Saltara un error porque no hay ningun ID puesto en la URL
    <br><br>
  

    <?php
//Realizamos conexion a la BD
    $conector = new mysqli("localhost", "root", "", "juegosdb");
    if ($conector->connect_errno) {
        echo "Fallo al conectar a MySQL: " .
         $conector->connect_error;
    }else {
      //Creamos valores mas sencillos para luego usarlos en la consulta
      $id=$_GET["id"];
      //Creamos una consulta
      $consulta="SELECT * FROM usuarios WHERE id='".$id."'";


        echo "Inserta un ID en la URL al final";
        echo "<br>";
        echo "<br>";
        echo "<br>";




//Mostramos por pantalla
      	$resultado = $conector->query($consulta);
        foreach ($resultado as $fila) {
        echo "El id buscado es : ".$fila["id"]; echo "<br>";
        echo "Su nombre es  : ".$fila["nombre"]; echo "<br>";
        echo "Su apellido es  : ".$fila["apellidos"]; echo "<br>";
        echo "La edad que tiene es : ".$fila["edad"]; echo "<br>";
        echo "Esta en el : ".$fila["curso"]; echo "<br>";
        echo "Su puntuacion es : ".$fila["puntuacion"]; echo "<br>";
        echo "Su correo es : ".$fila["correo"]; echo "<br>";

        }
    }
