<!DOCTYPE html>
<html>
<head>
	<title>Página de disponibilidad</title>
	<link rel="stylesheet" type="text/css" href="\PROYECTOS-DAW2\PR01\css\pagina.css">
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

	<center><h1 style="color: white; background-color: #ED820A; width: 41%; border-radius: 10px;">PÁGINA DE DISPONIBILIDAD</h1></center>
<div id="main-container">

		<table>
			<thead>
				<tr>
					<th>Salas</th><th>Teléfono</th><th>Edificio</th><th>Estado</th>
				</tr>
			</thead>
<?php  
include './connection/db_connection.php';

$query_s="SELECT * FROM tbl_salas ORDER BY nom_sala DESC";

$result_s=mysqli_query($conn,$query_s);

while ($row = mysqli_fetch_array($result_s)) {
		echo "<tr>
			<td>".$row['nom_sala']."</td><td>".$row['tlf_sala']."</td><td>".$row['edificio_sala']."</td><td>".$row['disponibilidad']."</td>
		</tr>";
		
}
		
?>
		</table>
<br><br>
		<table>
			<thead>
				<tr>
					<th>ID</th><th>Nombre</th><th>Tipo</th><th>Estado</th>
				</tr>
			</thead>

			<?php  

$query_r="SELECT * FROM tbl_recursos ORDER BY id_recurs ASC";

$result_r=mysqli_query($conn,$query_r);

while ($row = mysqli_fetch_array($result_r)) {
		echo "<tr>
			<td>".$row['id_recurs']."</td><td>".$row['nom_recurs']."</td><td>".$row['tipo_recurs']."</td><td>".$row['disponibilidad']."</td>
		</tr>";
		
}
		
?>
		</table>
		
</div>		
<div id="cajafiltro">
<div id="filtro">	
			<h2 style="background-color: #ED820A; color: white; width: 833%; margin-bottom: 10px;">Filtros</h2>
			
			<form action="filtrar.php" method="post">
				<a><select name="salas">
					<option value="">Salas</option>
					<option value="sala polivalent">Sala Polivalent</option>
					<option value="sala de yoga">Sala de yoga</option>
					<option value="sala de reforç">Sala de reforç</option>
				</select>
				</a>
				<br><br>
				<a><select name="recursos">Recursos:
					<option value="">Recursos</option>
					<option value="portatil_01">portatil_01</option>
					<option value="portatil_02">portatil_02</option>
					<option value="proyector_01">proyector_01</option>
					<option value="proyector_02">proyector_02</option>
				</select>
				</a>
				
				<br><br>
				<input style="margin-left: 8px; width: 740%;" type="submit" value="Filtrar" /><br><br>
				<input style="margin-left: 8px; width: 740%;" type="reset" value="Borrar"/> 
			</form>
		<h2 style="background-color: #ED820A; color: white; width: 833%; margin-bottom: 10px;">Reservas</h2>
		<a href="mis_reservas.php" style="margin-left: 40px;"><button>MIS RESERVAS</button></a><br><br>
		<a href="reserva.php" style="margin-left: 40px;"><button>RESERVAR</button></a><br><br>
</div>	
</div>			
</body>
</html>