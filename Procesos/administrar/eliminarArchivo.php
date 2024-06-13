<?php

session_start();
require_once "../../Clases/administrar.php";
$Administrar = new Administrar();
$idArchivo = $_POST['idArchivo'];
$idUsuario = $_SESSION['id_usuario'];

$nombreArchivo = $Administrar->obtenerNombreArchivo($idArchivo);

$rutaEliminar = "../../archivos/".$idUsuario."/".$nombreArchivo['nombre'];
    if(unlink($rutaEliminar)){
        echo $Administrar->eliminarRegistroArchivo($_POST['idArchivo']);
    }else{
        echo 0;
    }

?>