<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Librerias/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Librerias/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="Librerias/datatable/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="Css/login.css">
</head>

<body>
    <form method="post" id="frmLogin" onsubmit="return logear()">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group mb-0">
                        <div class="card p-4">
                            <div class="card-body">
                                <h1>Inicio Sesión</h1>
                                <p class="text-muted">Inicia session con tu cuenta</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Usuario" required="">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Contraseña" required="">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="submit" class="fadeIn fourth" value="Entrar">
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-link px-0">Te olvidaste tu contraseña?</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Registrate</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <a href="registro.php" class="btn btn-primary">Registrate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="Librerias/jquery-3.7.1.js"></script>
    <script type="text/javascript">
        function logear(){
            $.ajax({
                method: "POST",
                data: $('#frmLogin').serialize(),
                url: "Procesos/usuario/login/login.php",
                success: function(respuesta) {
                    respuesta = JSON.parse(respuesta.trim());
                    if (respuesta.success == 1) {
                        window.location = "Vistas/inicio.php";
                    } else {
                        alert("Error al iniciar sesión.");
                    }
                }
            });
        }
    </script>
</body>

</html>