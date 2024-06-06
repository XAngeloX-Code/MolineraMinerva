<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include "header.php";

?>

<div class="row">
    <div class="col-sm-12">
        <div class="jumbotron">
            <h1 class="display-4">Bienvenido al sistema de archivos</h1>
            <p class="lead">Este es un sistema de archivos en el que puedes subir, descargar y visualizar archivos.</p>
        </div>
    </div>
</div>
    <?php include "footer.php"; 
    } else {
        header("location:../index.php");
    }
    
    ?>