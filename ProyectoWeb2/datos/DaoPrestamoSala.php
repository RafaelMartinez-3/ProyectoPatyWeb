<?php
require_once("../datos/conexion.php");
if (session_status() === PHP_SESSION_ACTIVE) {
    // La sesión está activa
    echo "La sesión está activa.";
} else {
    // La sesión no está activa
    session_start();
}
class DaoPrestamoSala{
    private $ConL;
    
    function conectar()
    {
        $Con = new Conexion($_SESSION["usuario"], $_SESSION["contrasenia"]);
        $this->ConL = $Con::obtenerConexion();
    }
    public function insertarPrestamoSala($datos)
    {
        // Verificar que haya una conexión válida
        if ($this->ConL != null) {
            // Crear la sentencia de inserción
            $sentencia = $this->ConL->prepare("INSERT INTO saci.prestamossala 
            (numero_cuenta, usuario_responsable, carrera, numero_hombres, numero_mujeres, fecha_prestamo, hora_inicio, hora_termino)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $resultado = $sentencia->execute(array(
                $datos->codigo,
                $datos->nombre,
                $datos->carrera,
                $datos->Hombres,
                $datos->Mujeres,
                $datos->fecha_ingreso,
                $datos->hora_ingreso,
                $datos->hora_salida
            ));
    
            if ($resultado) {
                return true;
            } else {
                echo "Error al insertar datos: " . $sentencia->error;
                return false;
            }
            // Cerrar la sentencia
            $sentencia->close();
        }
    }
    
    public function LlenarTablaL()
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT * FROM saci.prestamossala;");
            $sentenciaSQL->execute();
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            $registrosObtenidos = array();
            foreach ($resultado as $fila) {
                $registrosObtenidos[] = $fila;
            }
            return $registrosObtenidos;
        }
    }
    public function LlenarEspacios()
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT numero,descripcion FROM catalogos.espacios;");
            $sentenciaSQL->execute();
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            $registrosObtenidos = array();
            foreach ($resultado as $fila) {
                $registrosObtenidos[] = $fila;
            }
            return $registrosObtenidos;
        }
    }
    function obtenerpersona($id)
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT * FROM catalogos.usuarios WHERE no_cuenta = ?;");
            $sentenciaSQL->execute([$id]);
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            if ($resultado > 0) {
                //var_dump( $resultado);
                foreach ($resultado as $fila) {
                    $Obj = array();
                    $Obj[0]  = $fila->no_cuenta;
                    $Obj[1] = $fila->nombre;
                    $Obj[2] = $fila->idcarrera;
                }
                return $Obj;
            } else {
                return null;
            }
        }
    }
    function obtenerEspacio($id)
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT disponible FROM catalogos.espacios WHERE numero= ?;");
            $sentenciaSQL->execute([$id]);
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

            if ($resultado > 0) {
                foreach ($resultado as $fila) {
                    if ($fila->disponible == true) {
                        return true;
                    }
                }
            } else {
                return false;
            }
        }
    }
    function obtenerCarrera($id)
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT * FROM catalogos.carreras WHERE idcarrera = ?;");
            $sentenciaSQL->execute([$id]);
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            if ($resultado > 0) {
                foreach ($resultado as $fila) {
                    $Obj = $fila->nombre;
                }
                return $Obj;
            } else {
                return null;
            }
        }
    }


}


?>