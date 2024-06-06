<?php
    require_once "conexion.php";
class Usuario extends Conectar
{
    public function agregarUsuario($datos){
        $conexion = Conectar::conexion();

        if (self::buscarUsuarioRepetido($datos['usuario'])){
            return 2;
        } else {
            $sql = "INSERT INTO usuarios(nombre, fecha_nacimiento, email, usuario, password) 
            VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bindParam(1, $datos['nombre']);
            $query->bindParam(2, $datos['fechaNacimiento']);
            $query->bindParam(3, $datos['correo']);
            $query->bindParam(4, $datos['usuario']);
            $query->bindParam(5, $datos['password']);

            $exito = $query->execute();
            return $exito;
        }
    }
    public function buscarUsuarioRepetido($usuario)
    {
        $conexion = Conectar::conexion();
        $sql = "SELECT usuario FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $usuario);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($datos !== false && ($datos['usuario'] != "" || $datos['usuario'] == $usuario)) {
            return 1;
        } else {
            return 0;
        }
    }


    public function login($usuario, $password)
{
    // Establecer la conexión con la base de datos
    try {
        $conexion = Conectar::conexion();
    } catch (PDOException $e) {
        // Manejar errores de conexión
        error_log("Error de conexión a la base de datos: " . $e->getMessage());
        return -1; // Devolver un código de error especial
    }

    // Preparar la consulta SQL para verificar si el usuario y la contraseña son correctos
    $sql = "SELECT count(*) as existeUsuario FROM usuarios WHERE usuario = ? AND password = ?";
    try {
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $respuesta = $stmt->fetch(PDO::FETCH_ASSOC)['existeUsuario'];
    } catch (PDOException $e) {
        // Manejar errores de consulta
        error_log("Error al ejecutar la consulta SQL: " . $e->getMessage());
        return -1; // Devolver un código de error especial
    }

    if ($respuesta > 0) {
        // Si el usuario existe, iniciar sesión
        $_SESSION['usuario'] = $usuario;
        
        // Preparar la consulta SQL para obtener el ID del usuario
        $sql = "SELECT id_usuario FROM usuarios WHERE usuario = ? AND password = ?";
        try {
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $usuario);
            $stmt->bindParam(2, $password);
            $stmt->execute();
            $idUsuario = $stmt->fetch(PDO::FETCH_ASSOC)['id_usuario'];
            $_SESSION['id_usuario'] = $idUsuario;
        } catch (PDOException $e) {
            // Manejar errores de consulta
            error_log("Error al ejecutar la consulta SQL: " . $e->getMessage());
            return -1; // Devolver un código de error especial
        }
        
        return 1; // Inicio de sesión exitoso
    } else {
        return 0; // Usuario o contraseña incorrectos
    }
}

}

?>
