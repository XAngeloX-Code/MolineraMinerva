<?php
require_once "conexion.php";

class Categorias extends Conectar
{
    public function agregarCategoria($datos)
    {
        $conexion = Conectar::conexion();

        $sql = "INSERT INTO categorias (id_usuario, nombre) VALUES (:idUsuario, :categoria)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':idUsuario', $datos['idUsuario'], PDO::PARAM_INT);
        $stmt->bindValue(':categoria', $datos['categoria'], PDO::PARAM_STR);
        $respuesta = $stmt->execute();
        return $respuesta;
    }

    public function eliminarCategoria($idCategoria)
    {
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM categorias WHERE id_categoria = :idCategoria";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $respuesta = $stmt->execute();
        return $respuesta;
    }

    public function obtenerCategoria($idCategoria)
    {
        $conexion = Conectar::conexion();
        $sql = "SELECT id_categoria, nombre FROM categorias WHERE id_categoria = :idCategoria";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizaCategoria($datos)
    {
        $conexion = Conectar::conexion();
        $sql = "UPDATE categorias SET nombre = :nombre WHERE id_categoria = :idCategoria";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':idCategoria', $datos['idCategoria'], PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $datos['categoriaU'], PDO::PARAM_STR);
        $respuesta = $stmt->execute();
        return $respuesta;
    }
}
