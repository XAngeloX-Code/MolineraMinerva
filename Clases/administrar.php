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

    public function obtenerNombreArchivo($idArchivo){
        try {
            $conexion = Conectar::conexion();
            $sql = "SELECT nombre FROM archivos WHERE id_archivo = :idArchivo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':idArchivo', $idArchivo);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error al obtener nombre de archivo: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarRegistroArchivo($idArchivo){
        try {
            $conexion = Conectar::conexion();
            $sql = "DELETE FROM archivos WHERE id_archivo = :idArchivo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':idArchivo', $idArchivo);
            $respuesta = $stmt->execute();
            return $respuesta;
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error al eliminar archivo: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerRutaArchivo($idArchivo){
        try {
            $conexion = Conectar::conexion();
            $sql = "SELECT nombre, tipo FROM archivos WHERE id_archivo = :idArchivo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':idArchivo', $idArchivo, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombreArchivo = $resultado['nombre'];
            $tipoArchivo = $resultado['tipo'];
            return self::tipoArchivo($nombreArchivo, $tipoArchivo);
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error al obtener ruta de archivo: " . $e->getMessage());
            return false;
        }
    }

    private function PDF($ruta) {
        return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px"/>';
    }
    
    private function Document($ruta) {
        return '<iframe src="' . $ruta . '" width="100%" height="600px"></iframe>';
    }
    
    private function Image($ruta) {
        return '<img src="' . $ruta . '" width="100%">';
    }

    public function tipoArchivo($nombre, $tipo) {
        $idUsuario = $_SESSION['id_usuario'];
        $ruta = "../archivos/" . $idUsuario . "/" . $nombre;
    
        switch ($tipo) {
            case 'pdf':
                return $this->PDF($ruta);
            case 'docx':
            case 'pptx':
            case 'xlsx':
                return $this->Document($ruta);
            case 'jpg':
            case 'png':
                return $this->Image($ruta);
            default:
                return 'Formato no válido';
        }
    } 
}
?>
