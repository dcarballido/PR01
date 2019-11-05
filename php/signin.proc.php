<?php
include "./db_connection.php";

$user = $_REQUEST['user'];
$pass = $_REQUEST['password'];
$encript = md5($pass);

//Entra si está configurada la variable del formulario del login
if(isset($_REQUEST['user'])){
	// crea INSERT
	$query1 = "INSERT INTO usuarios (name_usuario, password_usuario) VALUES ('$user', '$encript')";
	echo $query1;
	mysqli_query($conn,$query1);



	$query2 = "SELECT * FROM usuarios WHERE name_usuario='$user' AND password_usuario='$encript'";
	echo $query2;
	// ejecuta la query
	$result = mysqli_query($conn,$query2);
	//La variable $result debería de tener como mínimo un registro coincidente
	if(!empty($result) && mysqli_num_rows($result)==1){
		echo "string1";
		$row = mysqli_fetch_array($result);
		//Creo una nueva sesión y defino $_SESSION['nombre'] y $_SESSION['id_usuario']
		session_start();
		$_SESSION['nombre']=$user;
		$_SESSION['id_usuario']=$row['id_usuario'];
		//Voy a mi sitio personal
		header("Location: ./intranet.php");
	}else{
		echo "string2";
		//Ha fallado la autenticación vuelvo a index.php
		//header("Location: ./19-10-21_projecte_1_social_gallery_m07_login.php?error=2&signinuser=" . $user);
	}
//Si no está configurada la variable del formulario del login vuelve al index.php
}else{
	header("Location: ./login.php");
}	
?>