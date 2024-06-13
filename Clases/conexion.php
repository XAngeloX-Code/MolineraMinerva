<?php

class Conectar
{
    private const SERVIDOR = 'localhost';
    private const NOMBRE_BD = 'molinera_gestionarchivos';
    private const USUARIO = 'root';
    private const PASSWORD = '';

    public static function conexion()
    {
        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        );

        try {
            $conexion = new PDO(
                "mysql:host=" . self::SERVIDOR . ";dbname=" . self::NOMBRE_BD,
                self::USUARIO,
                self::PASSWORD,
                $opciones
            );
            return $conexion;
        } catch (PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage());
            return null; // Retornar null en lugar de terminar el script con die()
        }
    }
}
