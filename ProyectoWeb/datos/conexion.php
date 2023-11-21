<?php
/**
 * Clase que manejará la conexión a la BD
 */
class Conexion
{
      private       $servidor= trim($_POST["ipServidor"]);
      private       $puerto= trim($_POST["puerto"]);
      private       $usuario= trim($_POST["usuario"]);
      private       $password= trim($_POST["contrasena"]);
    
    //Referencia de la conexión a la BD para que 
    //si ocupamos transacciones podamos usar siempre la misma
    //conexion
    private static $conexion  = null;

    /**
     * No se permite realizar instancias de la clase
     */
    
    
    /**
     * Funcion que permite abrir una nueva conexion a la base de datos 
     */
    public static function conectar()
    {
        //self permite hacer una referencia al elemento estático
        //this permite hacer una referencia a un elemento de instancia
        //Se verifica si ya hay una conexión abierta
        if ($conexion==null)
        {     
            try
            {
                
                $conexion =  new PDO( "pgsql:host=".$servidor.";port=".$puerto,$usuario, $password); 
                //self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                console.log("Si Sirve");
            }
            catch(PDOException $e)
            {
                exit($e->getMessage()); 
            }
        }
        return $conexion;
    }
    
    /**
     * Funcion que permite cerrar la conexion a la base de datos 
     */
    public static function desconectar()
    {
        self::$conexion = null;
    }
}
?>