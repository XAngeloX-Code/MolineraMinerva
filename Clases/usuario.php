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
}

?>
