<?php
//asignación de variables de conexion a phpMyAdmin
//Raúl y Edgar, cambiar credenciales para conexión a db
	$server = "localhost";
	$user = "root";
	$password = "Orisuper18";
	$dbname = "bd_proyecto01";

//creación de la conexión con db
	$conn = new mysqli($server, $user, $password, $dbname) or die($conn -> connect_error);

?>
