<?php

    require_once "../../Clases/Categorias.php";
    $Categorias = new Categorias();

    $datos = array(
        "idCategoria" => $_POST['idCategoria'],
        "nombre" => $_POST['categoriaU']);

    echo $Categorias->actualizaCategoria($_POST);

?>