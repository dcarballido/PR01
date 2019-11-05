<!DOCTYPE html>
<html>
<head>
	<title>Página de disponibilidad</title>
	<link rel="stylesheet" type="text/css" href="\PROYECTOS-DAW2\PR01\front-end\css\pagina.css">
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

$query_s="SELECT * FROM tbl_salas ORDER BY nom_sala DESC";

$result_s=mysqli_query($conn,$query_s);

while ($row = mysqli_fetch_array($result_s)) {
		echo "<tr>
			<td>".$row['nom_sala']."</td><td>".$row['tlf_sala']."</td><td>".$row['edificio_sala']."</td>
		</tr>";
		
}
		
?>
		</table>
<br><br>
		<table>
			<thead>
				<tr>
					<th>ID</th><th>Nombre</th><th>Tipo</th>
				</tr>
			</thead>

			<?php  

$query_r="SELECT * FROM tbl_recursos ORDER BY id_recurs ASC";

$result_r=mysqli_query($conn,$query_r);

while ($row = mysqli_fetch_array($result_r)) {
		echo "<tr>
			<td>".$row['id_recurs']."</td><td>".$row['nom_recurs']."</td><td>".$row['tipo_recurs']."</td>
		</tr>";
		
}
		
?>
		</table>
	</div>
</body>
</html>