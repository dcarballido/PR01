<?php
// linkeamos con db_connection para conectar a la base de datos
include "./db_connection.php"; 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script src="../js/login.js"></script>
</head>
<body>
  <div style="text-align: center; margin-top: 5%"><h1>Social Gallery</h1></div>
  <div style="text-align: center; margin-top: 10%;">
    <!-- formulario de inicio de sesión -->
  <h1>Iniciar sesión</h1>
  <form method="post" action="./19-10-21_projecte_1_social_gallery_m07_login.proc.php" onsubmit="first()">
  <p>Recuerda, este formulario no acepta caracteres especiales!</p>
    <?php
    echo "<input pattern='[A-Za-z0-9_-]{1,15}' type='text' name='user' placeholder='Inserta el usuario' id='user' value='".$_REQUEST['loginuser']."'><br/>
";
    ?>
    <input type="password" name="password" placeholder="Inserta el password" id="password" ><br/><br/>
    <input type="submit" name="Enviar" value="Iniciar sesión" >
  </form>

  <?php
    if ($_REQUEST['error'] == 1) {
      echo "<p style = 'color: red;'>Usuario y/o contraseña incorrecto</p>";
    }else{
      echo "";
    }
  ?>
  <!--  -->

  <!-- formulario de registro -->
  <h1>Registrarse</h1>
  <form method="post" action="./19-10-21_projecte_1_social_gallery_m07_signin.proc.php" onsubmit="second()">
  <p>Recuerda, este formulario no acepta caracteres especiales!</p>
    <?php
    echo "<input pattern='[A-Za-z0-9_-]{1,15}' type='text' name='user' placeholder='Inserta el usuario' id='user' value='".$_REQUEST['signinuser']."'><br/>
";
        ?>
    <input pattern='[A-Za-z0-9_-]{1,15}' type="password" name="password" placeholder="Inserta el nuevo password" required><br/><br/>
    <input pattern='[A-Za-z0-9_-]{1,15}' type="submit" name="Enviar" value="Registrarse" >
  </form>
  <!--  -->

  </div>
</body>
</html>