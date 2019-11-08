<?php
// linkeamos con db_connection para conectar a la base de datos
include "./connection/db_connection.php"; 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <script src="./js/login.js"></script>
</head>
<body>
  <div style="text-align: center; margin-top: 5%"><h1>PR01</h1></div>
  <div style="text-align: center; margin-top: 10%;">

    <!-- formulario de inicio de sesión -->
  <h1>Iniciar sesión</h1>
  <form method="POST" action="./proc/login.proc.php" onsubmit="first()">
    <?php
    echo "<input pattern='[A-Za-z0-9_-]{1,15}' type='text' name='user' placeholder='Inserta el usuario' id='user'><br/>
";
    ?>
    <input type="password" name="password" placeholder="Inserta el password" id="password" ><br/><br/>
    <input type="submit" name="Enviar" value="Iniciar sesión" >
  </form>

  <!--  -->

  <!-- formulario de registro -->
  <h1>Registrarse</h1>
  <form method="POST" action="./proc/signin.proc.php" onsubmit="second()">
    <?php
    echo "<input pattern='[A-Za-z0-9_-]{1,15}' type='text' name='user' placeholder='Inserta el usuario' id='user''><br/>
";
        ?>
    <input pattern='[A-Za-z0-9_-]{1,15}' type="password" name="password" placeholder="Inserta el nuevo password" id="password" required><br/><br/>
    <input pattern='[A-Za-z0-9_-]{1,15}' type="submit" name="Enviar" value="Registrarse" >
  </form>
  <!--  -->

  </div>
</body>
</html>