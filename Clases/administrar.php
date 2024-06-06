<?php
require_once "conexion.php";

class Administrar extends Conectar
{
    public function agregarArchivos($datos)
    {
        try {
            $conexion = Conectar::conexion();
            
            // Preparamos la consulta SQL con marcadores de posición
            $sql = "INSERT INTO archivos (id_usuario, id_categoria, nombre, tipo, ruta)
                    VALUES (:idUsuario, :idCategoria, :nombre, :tipo, :ruta)";
            $stmt = $conexion->prepare($sql);

            // Vinculamos los parámetros a los marcadores de posición
            $stmt->bindParam(':idUsuario', $datos['idUsuario']);
            $stmt->bindParam(':idCategoria', $datos['idCategoria']);
            $stmt->bindParam(':nombre', $datos['nombre']);
            $stmt->bindParam(':tipo', $datos['tipo']);
            $stmt->bindParam(':ruta', $datos['ruta']);

            // Ejecutamos la consulta
            $respuesta = $stmt->execute();

            // Cerramos la conexión
            $stmt = null;
            $conexion = null;

            return $respuesta;
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error al agregar archivos: " . $e->getMessage());
            return false;
        }
    }
}
?>
