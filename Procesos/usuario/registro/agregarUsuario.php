<?php

require_once "../../../Clases/usuario.php";

// Verificar si se reciben los datos necesarios del formulario
if (isset($_POST['nombre'], $_POST['fechaNacimiento'], $_POST['correo'], $_POST['usuario'], $_POST['password'])) {
    // Cifrar la contraseña de manera segura
    $password = sha1($_POST['password']);

    // Datos del usuario a insertar en la base de datos
    $datos = array(
        "nombre" => $_POST['nombre'],
        "fechaNacimiento" => $_POST['fechaNacimiento'],
        "correo" => $_POST['correo'],
        "usuario" => $_POST['usuario'],
        "password" => $password
    );

    // Crear una instancia de la clase Usuario
    $usuario = new Usuario();

    // Intentar agregar el usuario y obtener el resultado
    $exito = $usuario->agregarUsuario($datos);

    // Devolver un mensaje en formato JSON indicando el resultado de la inserción
    echo json_encode(array("success" => $exito));
} else {
    // Si no se reciben todos los datos necesarios, devolver un mensaje de error en formato JSON
    echo json_encode(array("error" => "No se recibieron todos los datos necesarios"));
}

?>
