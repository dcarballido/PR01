<?php

session_start();
$iduser = $_SESSION['id_user'];
$name = $_SESSION['nom_us']." ".$_SESSION['cognom_us'];



?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title></title>
</head>
<body>
<!-- BOTON DE CERRAR SESION DE USUARIO -->
<div style="text-align: right;">
		<?php
		//Mantengo la sesión. Por ende puedo utilizar la variable $_SESSION anteriormente configurada

		if(isset($_SESSION['id_user'])){
			echo "<a href='./proc/logout.proc.php'>Cerrar sesión de ".$_SESSION['nom_us']."</a>&nbsp;&nbsp;";
		}else{
			header("Location: ./index.php");
		}

		?>
	</div> 
<!-- ------------------ -->
<H1>MIS RESERVAS:</H1>

<!-- PARA MOSTRAR LAS RESERVAS DEL USUARIO -->
<?php
include "./connection/db_connection.php";

echo "<H2>El nombre del usuario en DB es: ". strtoupper($name) . "</H2>";
$qry = "SELECT * FROM tbl_reserva left JOIN tbl_salas ON tbl_reserva.id_sala = tbl_salas.id_sala left join tbl_recursos on tbl_reserva.id_recurs = tbl_recursos.id_recurs
WHERE tbl_reserva.id_user = $iduser ORDER BY tbl_reserva.id_reserva DESC";
$result = mysqli_query($conn,$qry);



// muestra la informacion seleccionada
if (!empty($result) && mysqli_num_rows($result)>0) {

	while ($row = mysqli_fetch_array($result)) {
			echo "<br>";
			echo "<form><div style='background-color:#ED820A;</form>;'>";
			echo "<br> EL ID DE LA RESERVA ES: " .$row['id_reserva'] . "<br>";
			echo "LA FECHA DE INICIO ES: ".$row['fecha_ini_res'] . "<br>";
			echo "LA FECHA DE FIN ES: ".$row['fecha_fin_res'] . "<br>";
			echo "EL NOMBRE DEL RECURSO ES: ".strtoupper($row['nom_recurs']) . "<br>";
			echo "EL NOMBRE DEL USUARIO QUE HA RESERVADO ES: ".strtoupper($name) . "<br>";
			echo "EL NOMBRE DE LA SALA ES: ".strtoupper($row['nom_sala']) . "<br>";
			echo "</div>";
			echo "<a href='./incidencias.php'><p>ABRIR INCIDENCIA</p></a>";
			echo "<a href='./borrar_reservas.php'><p>BORRAR RESERVA</p></a>";
		}	

}else{echo "error";}

?>

<!-- BOTON DE ABRIR INCIDENCIA -->

<!-- ------------------ -->


</body>
</html>