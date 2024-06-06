<?php
        session_start();
        require_once "../../Clases/Categorias.php";
        $Categorias = new Categorias();
        echo $Categorias->eliminarCategoria($_POST['idCategoria']);

?>
