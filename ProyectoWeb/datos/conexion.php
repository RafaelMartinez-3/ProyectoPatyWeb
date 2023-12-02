<?php
/**
 * Clase que manejará la conexión a la BD
 */
class Conexion
{
    private $conexion;

    /**
     * Constructor de la clase que permite la conexión a la base de datos
     */
    public function __construct($server, $puerto, $usuario, $contrasenia)
    {
        try {
            $this->conexion = new PDO("pgsql:host=" . $server . ";port=" . $puerto, $usuario, $contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "¡Conexión exitosa!";
        } catch (PDOException $e) {
            exit($e->getMessage());
            return false;
        }
    }
    /**
     * Método que permite cerrar la conexión a la base de datos
     */
    public function desconectar()
    {
        $this->conexion = null;
    }
    
    /**
     * Método que devuelve la conexión actual (para realizar operaciones directas si es necesario)
     */
    public function obtenerConexion()
    {
        return $this->conexion;
    }
}
?>
