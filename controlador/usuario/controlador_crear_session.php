<?php
/*$IDUSUARIO = $_POST['idusuario'];
$USER = $_POST['user']; 
$ROL = $_POST['rol'];

session_start();
$_SESSION['S_IDUSUARIO']=$IDUSUARIO;
$_SESSION['S_USER']=$USER;
$_SESSION['S_ROL']=$ROL;
//echo $IDUSUARIO ;*/

$IDUSUARIO = $_POST['idusuario'];
$USER = $_POST['usuario'];
$NOMBRE_USER = $_POST['nombre']; 
$ROL = $_POST['rol'];
$TOKEN = $_POST['token'];

session_start();
$_SESSION['S_IDUSUARIO']=$IDUSUARIO;
$_SESSION['S_USER']=$USER;
$_SESSION['S_GRADO']=$NOMBRE_USER;
$_SESSION['S_ROL']=$ROL;
$_SESSION['S_TOKEN']=$TOKEN;
//echo $IDUSUARIO ;

?>