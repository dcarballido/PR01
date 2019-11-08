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
<!-- BOTON DE CERRAR SESION DE USUARIO -->
<div style="text-align: right;">
		<?php
		//Mantengo la sesión. Por ende puedo utilizar la variable $_SESSION anteriormente configurada
		session_start();
		if(isset($_SESSION['id_user'])){
			echo "<a href='./proc/logout.proc.php'>Cerrar sesión de ".$_SESSION['nom_us']."</a>&nbsp;&nbsp;";
		}else{
			header("Location: ../index.php");
		}

		?>
	</div> 
<!-- ------------------ -->
<div>
	<!-- FORMULARIO PARA INSERTAR LAS RESERVAS DE LOS USUARIOS -->
	<form action="./insert/insert_reserva.php" method="POST">
		ELIGE LA SALA:<br><select name="salas">
		<!-- input donde se muestran las salas desde bbdd -->		
			<option value="">Salas</option>
			<?php
			include "./connection/db_connection.php";
			$qry = "SELECT * FROM tbl_salas";
			$result = mysqli_query($conn,$qry);

			if (!empty($result) && mysqli_num_rows($result)>0) {

				while ($row = mysqli_fetch_array($result)) {
						echo "<br>";
						echo "<option>".$row['nom_sala']."</option>";
					}	
			}else{echo "error";}
			?>
		</select><br><br> 
		ELIGE EL RECURSO:<br><select name="recursos">
		<!-- input donde se muestran los recursos desde bbdd -->
			<option value="">Recursos</option>
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
		ELIGE FECHA DE INICIO DE RESERVA: <input type="date" name="fecha_ini_res"><br><br> 
		ELIGE FECHA DE FINAL DE RESERVA: <input type="date" name="fecha_fin_res"><br><br> 
		<input type="submit" name="submit" value="Reservar"><br><br> 
	</form>
</div>

</body>
</html>