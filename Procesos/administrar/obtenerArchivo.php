<?php

session_start();
require_once "../../Clases/administrar.php";
$Administrar = new Administrar();
$idArchivo = $_POST['idArchivo'];


echo $Administrar->obtenerRutaArchivo($idArchivo);


?>