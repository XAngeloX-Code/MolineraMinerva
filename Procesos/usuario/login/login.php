<?php
session_start();
require_once "../../../Clases/usuario.php";

$usuario = $_POST['login'];
$password = sha1($_POST['password']);

$usuarioObj = new Usuario();
$resultado = $usuarioObj->login($usuario, $password);

echo $resultado;
?>
