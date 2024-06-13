<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Librerias/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Librerias/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../Librerias/datatable/dataTables.bootstrap5.css">
    <title>Molinera</title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio.php"><span class="fa-solid fa-house"></span>Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php"><i class="fas fa-chart-bar"></i> Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrar.php"><i class="fas fa-folder"></i> Administrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reportes.php"><i class="fas fa-  "></i> Reportes</a>
                    </li>
                    <li class="nav-item" style="color: red">
                        <a class="nav-link" href="../Procesos/usuario/salir.php" style="color: red;">
                            <span class="fas fa-power-off"></span> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>