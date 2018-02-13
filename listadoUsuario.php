<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prueba de conexion</title>
  </head>
  <body>

    <?php
    // conexion a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "juegosdb");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " .
        $mysqli->connect_error;
        }else {

          //Hacemos variabes para los $_POST
          $nombre=$_POST["nombre"];
          $apellidos=$_POST["apellidos"];
          $edad=$_POST["edad"];
          $curso=$_POST["curso"];
          $puntuacion=$_POST["puntuacion"];
          $correo=$_POST["correo"];


          //Hacemos las consulta y las guardamos en variables

          $consulta=$mysqli->query("INSERT INTO usuarios (nombre,apellidos,edad,curso,puntuacion,correo) VALUES ('$nombre','$apellidos',$edad,$curso,$puntuacion,'$correo')");
          $consulta2=$mysqli->query("SELECT * FROM usuarios");

          echo "El usuario que acabas de insertar es: ".$nombre."<br>";
          echo "Y su correo es: ".$correo."<br>";

          echo "<br>";
          echo "<br>";


//Hacemos un while para mostrar los ultimos usuarios insertados
          while($mostrarUsuario=$consulta2->fetch_assoc()){
          	  echo "Usuario: ".$mostrarUsuario['nombre']."<br>";
              echo "Apellidos: ".$mostrarUsuario['apellidos']."<br>";
              echo "Edad: ".$mostrarUsuario['edad']."<br>";
              echo "Edad: ".$mostrarUsuario['correo']."<br>";

               echo "<br>";
               echo "<hr>";
               echo "<br>";
        	}

    }
    ?>

    <form action="insertarUsuario.php">
      <input type="submit" value="Volver">
    </form>


  </body>
</html>
