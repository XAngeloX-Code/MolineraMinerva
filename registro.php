<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="Librerias/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Librerias/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="Librerias/datatable/dataTables.bootstrap5.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Registro de usuarios</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()">
                    <label>Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="">
                    <label>Email o Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control" required="">
                    <label>Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required="">
                    <label>Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required="">
                    <br>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-primary">Registrar</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="index.php" class="btn btn-success">Iniciar Sesión</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="Librerias/jquery-3.7.1.js"></script>
    <script type="text/javascript">
        function agregarUsuarioNuevo() {
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(),
                url: "Procesos/usuario/registro/agregarUsuario.php",
                success: function(respuesta) {
                    respuesta = JSON.parse(respuesta.trim());
                    if (respuesta.success == 1) {
                        $("#frmRegistro")[0].reset();
                        alert("Usuario agregado con éxito.");
                    } else if (respuesta.success == 2) {
                        alert("Este usuario ya existe, porfavor escriba otro!!");
                    } else {
                        alert("Error al agregar usuario.");
                    }
                }
            });
            return false;
        }
    </script>


</body>

</html>