<!DOCTYPE html>
<html>
<head>
	<title>Página de disponibilidad</title>
	<link rel="stylesheet" type="text/css" href="\PRUEBA\PR01_v2\css\pagina.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400i&display=swap" rel="stylesheet">
	<meta charset="utf-8">
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

	<center><h1 style="	text-align:center;padding: 12px;color: #ED820A;">PÁGINA DE DISPONIBILIDAD</h1></center>
<div id="main-container">

		<table>
			<thead>
				<tr>
					<th>Salas</th><th>Teléfono</th><th>Edificio</th><th>Estado</th>
				</tr>
			</thead>
<?php  
include './connection/db_connection.php';

if (!isset($_GET['salas']) && !isset($_GET['recursos']) ) {
	$sala=$_REQUEST['salas'];
$query_fs1="SELECT * FROM tbl_salas WHERE nom_sala='$sala'";

$result_fs1=mysqli_query($conn,$query_fs1);

while ($row1 = mysqli_fetch_array($result_fs1)) {
		echo "<tr>
			<td>".$row1['nom_sala']."</td><td>".$row1['tlf_sala']."</td><td>".$row1['edificio_sala']."</td><td>".$row1['disponibilidad']."</td>
		</tr>";
		
}
echo "<table>
			<thead>
				<tr>
					<th>ID</th><th>Nombre</th><th>Tipo</th><th>Estado</th>
				</tr>
			</thead>";
$recurs=$_REQUEST['recursos'];
$query_fr1="SELECT * FROM tbl_recursos WHERE nom_recurs='$recurs'";
$result_fr1=mysqli_query($conn,$query_fr1);
while ($row2 = mysqli_fetch_array($result_fr1)) {
		echo "<tr>
			<td>".$row2['id_recurs']."</td><td>".$row2['nom_recurs']."</td><td>".$row2['tipo_recurs']."</td><td>".$row2['disponibilidad']."</td>
		</tr>";
		
}

		}
?>
		</table>
<br><br>
		
</div>		
<div id="cajafiltro">
<div id="filter">	
			<h2 style="background-color: #ED820A; color: white; width: 833%; margin-top: -700%;">Filtros</h2>
			
			<form action="filtrar.php" method="post">
				<a><select name="salas">
					<option value="">Salas</option>
					<?php 
					$query_s2="SELECT * FROM tbl_salas";
					$result_s2=mysqli_query($conn,$query_s2);
					while ($row= mysqli_fetch_array($result_s2)) {
						echo "<option value=".$row['nom_sala'].">".$row['nom_sala']."</option>";
					}
					
					?>
				</select>
				</a>
				<br><br>
				<a><select name="recursos">Recursos:
					<option value="">Recursos</option>
						<?php 
					$query_r2="SELECT * FROM tbl_recursos";
					$result_r2=mysqli_query($conn,$query_r2);
					while ($row= mysqli_fetch_array($result_r2)) {
						echo "<option value=".$row['nom_recurs'].">".$row['nom_recurs']."</option>";
					}
					
					?>
				</select>
				</a>
				
				<br><br>
				<input style="margin-left: 8px; width: 740%;" type="submit" value="Filtrar" /><br><br>
				<input style="margin-left: 8px; width: 740%;" type="reset" value="Borrar"/> 
			</form>
		<h2 style="background-color: #ED820A; color: white; width: 833%; margin-bottom: 10px;">Reservas</h2>
		<a href="mis_reservas.php" style="margin-left: 32px;"><button>MIS RESERVAS</button></a><br><br>
		<a href="reserva.php" style="margin-left: 32px;"><button>RESERVAR</button></a><br><br>

</div>	
</div>			
</body>
</html>