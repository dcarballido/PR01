<?php

session_start();
$iduser = $_SESSION['id_user'];
$name = $_SESSION['nom_us']." ".$_SESSION['cognom_us'];


include "../connection/db_connection.php";

// LAS FECHAS RECOGIDAS SERVIRÁN PARA TODAS LAS RESERVAS

$fecha_ini_res = $_REQUEST['fecha_ini_res'];
$fecha_fin_res = $_REQUEST['fecha_fin_res'];

// PARA HACER EL INSERT DE LAS RESERVAS DE SALAS Y RECURSOS
// para recoger los id de los recursos
$recurso = $_REQUEST['recursos'];
$idrecurs = "SELECT id_recurs FROM tbl_recursos WHERE nom_recurs = '$recurso'";
$qryidrecurs = mysqli_query($conn, $idrecurs);

echo $idrecurs."<br>";

if (!empty($qryidrecurs) && mysqli_num_rows($qryidrecurs)>0) {

	while ($row = mysqli_fetch_array($qryidrecurs)) {
		$outputidrecurs = $row['id_recurs'];
		echo $outputidrecurs."<br>";
		}	
}else{echo "error";}


// para recoger los id de las salas
$sala = $_REQUEST['salas'];
$idsala = "SELECT id_sala FROM tbl_salas WHERE nom_sala = '$sala'";
$qryidsala = mysqli_query($conn, $idsala);

echo $idsala."<br>";

if (!empty($qryidsala) && mysqli_num_rows($qryidsala)>0) {

	while ($row = mysqli_fetch_array($qryidsala)) {
		$outputidsala = $row['id_sala'];
		echo $outputidsala."<br>";
		}	
}else{echo "error";}


$qry_reserva = "INSERT INTO tbl_reserva (fecha_ini_res, fecha_fin_res, id_recurs, id_user, id_sala) VALUES ('$fecha_ini_res','$fecha_fin_res',$outputidrecurs,$iduser,$outputidsala)";
echo $qry_reserva;

$insercion = mysqli_query($conn, $qry_reserva);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<br><br>
	<button><a href="../mis_reservas.php" style="text-decoration: none; color: black;">IR A MIS RESERVAS</a></button>
</body>
</html>