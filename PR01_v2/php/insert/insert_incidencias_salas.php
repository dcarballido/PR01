<?php
session_start();
$iduser = $_SESSION['id_user'];
$name = $_SESSION['nom_us']." ".$_SESSION['cognom_us'];

$sala = $_REQUEST['salas'];
$desc = $_REQUEST['desc_incidencia_sala'];

include "./db_connection.php";

$qry = "INSERT INTO tbl_incidencias (desc_in, fecha_in) VALUES (".$desc.", SYSDATE())";

mysqli_query($conn,$qry);

?>