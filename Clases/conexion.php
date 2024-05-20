<?php

class Conectar
{

    public static function conexion()
{
    if (!defined('servidor')) {
        define('servidor', 'localhost');
    }
    if (!defined('nombre_bd')) {
        define('nombre_bd', 'molinera_gestionarchivos');
    }
    if (!defined('usuario')) {
        define('usuario', 'root');
    }
    if (!defined('password')) {
        define('password', '');
    }

        $conexion = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $conexion);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $conexion;
        } catch (Exception $e) {
            die("El error de conexión es: " . $e->getMessage());
        }
    }
}