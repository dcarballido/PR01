<?php
session_start();
//Destruimos la sesión
session_destroy();
header("Location: ./19-10-21_projecte_1_social_gallery_m07_login.php");
?>