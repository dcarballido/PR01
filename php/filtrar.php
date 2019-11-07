<!DOCTYPE html>
<html>
<head>
	<title>Página de disponibilidad</title>
	<link rel="stylesheet" type="text/css" href="\PROYECTOS-DAW2\PR01\css\pagina.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400i&display=swap" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>
	<center><h1 style="color: white; background-color: #ED820A; width: 41%; border-radius: 10px;">PÁGINA DE DISPONIBILIDAD</h1></center>
<div id="main-container">

		<table>
			<thead>
				<tr>
					<th>Salas</th><th>Teléfono</th><th>Edificio</th>
				</tr>
			</thead>
<?php  
include 'db_connection.php';

if (!isset($_GET['salas']) && !isset($_GET['recursos']) ) {
	$sala=$_REQUEST['salas'];
$query_fs1="SELECT * FROM tbl_salas WHERE nom_sala='$sala'";

$result_fs1=mysqli_query($conn,$query_fs1);

while ($row1 = mysqli_fetch_array($result_fs1)) {
		echo "<tr>
			<td>".$row1['nom_sala']."</td><td>".$row1['tlf_sala']."</td><td>".$row1['edificio_sala']."</td>
		</tr>";
		
}
echo "<table>
			<thead>
				<tr>
					<th>ID</th><th>Nombre</th><th>Tipo</th>
				</tr>
			</thead>";
$recurs=$_REQUEST['recursos'];
$query_fr1="SELECT * FROM tbl_recursos WHERE nom_recurs='$recurs'";
$result_fr1=mysqli_query($conn,$query_fr1);
while ($row2 = mysqli_fetch_array($result_fr1)) {
		echo "<tr>
			<td>".$row2['id_recurs']."</td><td>".$row2['nom_recurs']."</td><td>".$row2['tipo_recurs']."</td>
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
		<a href="mis_reservas.php" style="margin-left: 32px;"><button>MIS RESERVAS</button></a><br><br>
</div>	
</div>			
</body>
</html>