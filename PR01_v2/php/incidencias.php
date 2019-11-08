<?php

session_start();
$iduser = $_SESSION['id_user'];
$name = $_SESSION['nom_us']." ".$_SESSION['cognom_us'];



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
</head>

<body>
<div style="margin-top: 10%">
<div style="text-align: center;">

<!-- MENSAJE BETA -->
<h1 style="color: red">¡¡¡¡ESTA PÁGINA NO SERÁ FUNCIONAL HASTA LA SIGUIENTE ACTUALIZACIÓN!!!!</h1>
<!-- ------------ -->
<!-- SALAS -->

<h3>CREAR INCIDENCIA PARA SALAS</h3>

<form action="./insert_incidencias_salas.php" method="POST">
	ELIGE LA SALA:<br><select name="salas">
<!-- input donde se muestran las salas desde bbdd -->		
<?php
include "./db_connection.php";
$qry = "SELECT * FROM tbl_salas";
$result = mysqli_query($conn,$qry);

if (!empty($result) && mysqli_num_rows($result)>0) {

	while ($row = mysqli_fetch_array($result)) {
			echo "<br>";
			echo "<option>".$row['nom_sala']."</option>";
		}	
}else{echo "error";}
?>
	</select>
	<br><br> 
	DESCRIBE LA INCIDENCIA:<br> <input type="text" name="desc_incidencia_sala" placeholder="Cuéntanos que pasa"><br><br>
	<input type="submit" name="submit" value="ENVIAR">
</form>
</div>

<!--  -->

<!-- RECURSOS -->

<div style="text-align: center;">
<h3>CREAR INCIDENCIA PARA RECURSOS</h3>
<form>
	ELIGE EL RECURSO:<br><select name="recursos">
<!-- input donde se muestran los recursos desde bbdd -->
<?php
include "./db_connection.php";
$qry = "SELECT * FROM tbl_recursos";
$result = mysqli_query($conn,$qry);

if (!empty($result) && mysqli_num_rows($result)>0) {

	while ($row = mysqli_fetch_array($result)) {
			echo "<br>";
			echo "<option>".$row['nom_recurs']."</option>";
		}	
}else{echo "error";}
?>
	</select><br><br> 
	DESCRIBE LA INCIDENCIA:<br> <input type="text" name="desc_incidencia_recurso" placeholder="Cuéntanos que pasa"><br><br>
	<input type="submit" name="submit" value="ENVIAR">
</form>
</div>

<!--  -->

</div>
</body>
</html>