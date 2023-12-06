<?php
/**
 * Clase que manejar� la conexi�n a la BD
 */
class Conexion
{
   
    /**
     * Constructor de la clase que permite la conexi�n a la base de datos
     */
   
    private static $conexion  = null; 

    public function __construct($usuario, $contrasenia)
    {
        try {
            if (session_status() === PHP_SESSION_ACTIVE) {
              
            } else {
                session_start();
                //echo "La sesión no está activa.";
            }
            $_SESSION['usuario'] = $usuario;
            $_SESSION['contrasenia'] = $contrasenia;
            self::$conexion = new PDO("pgsql:host=localhost" . ";port=5432" . ";dbname=bd",$usuario,$contrasenia);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Conexion exitosa!";
        } catch (PDOException $e) {
           // exit($e->getMessage());
            return false;
        }
        return self::$conexion;
    }
    /**
     * M�todo que permite cerrar la conexi�n a la base de datos
     */
    public function desconectar()
    {
        self::$conexion=null;
        session_destroy();
    }
    
    /**
     * M�todo que devuelve la conexi�n actual (para realizar operaciones directas si es necesario)
     */
    public static function obtenerConexion()
    {
        return self::$conexion;
    }
}
?>
