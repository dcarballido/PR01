<?php
include "./db_connection.php";

$user = $_REQUEST['user'];
$pass = $_REQUEST['password'];
$encript = md5($pass);

//Entra si está configurada la variable del formulario del login
if(isset($_REQUEST['user'])){

	$query = "SELECT * FROM usuarios WHERE name_usuario='$user' AND password_usuario='$encript'";

	$result = mysqli_query($conn,$query);
	//La variable $result debería de tener como mínimo un registro coincidente
	if(!empty($result) && mysqli_num_rows($result)==1){
		$row = mysqli_fetch_array($result);
		//Creo una nueva sesión y defino $_SESSION['nombre'] y $_SESSION['id_usuario']
		session_start();
		$_SESSION['nombre']=$user;
		$_SESSION['id_usuario']=$row['id_usuario'];
		//Voy a la intranet de la app
		header("Location: ./intranet.php");
	}else{
		//Ha fallado la autenticación vuelvo a index.php
		header("Location: ./index.php?error=1&loginuser=". $user);
	}
//Si no está configurada la variable del formulario del login vuelve al index.php
}else{
	header("Location: ./index.php");
}	
?>