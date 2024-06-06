<?php

    require_once "../../Clases/Categorias.php";
    $Categorias = new Categorias();

    echo json_encode($Categorias->obtenerCategoria($_POST['idCategoria']));
?>