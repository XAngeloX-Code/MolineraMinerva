<?php
session_start();
require_once "../../Clases/Categorias.php";

$Categorias = new Categorias();
$idUsuario = $_SESSION['id_usuario'];
$categoria = $_POST['categoria'];

$datos = array(
    'idUsuario' => $idUsuario,
    'categoria' => $categoria
);

echo $Categorias->agregarCategoria($datos);
