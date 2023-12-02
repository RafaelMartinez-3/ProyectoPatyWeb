<?php
/**
 * Clase que manejar� la conexi�n a la BD
 */
class Conexion
{
    private $conexion;

    /**
     * Constructor de la clase que permite la conexi�n a la base de datos
     */
    public function __construct($server, $puerto, $usuario, $contrasenia)
    {
        try {
            $this->conexion = new PDO("pgsql:host=" . $server . ";port=" . $puerto, $usuario, $contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "�Conexi�n exitosa!";
        } catch (PDOException $e) {
            exit($e->getMessage());
            return false;
        }
    }
    /**
     * M�todo que permite cerrar la conexi�n a la base de datos
     */
    public function desconectar()
    {
        $this->conexion = null;
    }
    
    /**
     * M�todo que devuelve la conexi�n actual (para realizar operaciones directas si es necesario)
     */
    public function obtenerConexion()
    {
        return $this->conexion;
    }
}
?>
