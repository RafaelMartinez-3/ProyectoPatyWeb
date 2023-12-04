<?php
require_once("../datos/conexion.php");
if (session_status() === PHP_SESSION_ACTIVE) {
    // La sesión está activa
    echo "La sesión está activa.";
} else {
    // La sesión no está activa
    session_start();
}
class DaoPrestamoEquipo
{
    private $ConL;
    function conectar()
    {
        $Con = new Conexion($_SESSION["usuario"], $_SESSION["contrasenia"]);
        $this->ConL = $Con::obtenerConexion();
    }
    public function desconectar()
    {
        $this->ConL = null;
    }
    public function LlenarTablaL()
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT * FROM saci.prestamoequipo;");
            $sentenciaSQL->execute();
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            $registrosObtenidos = array();
            foreach ($resultado as $fila) {
                $registrosObtenidos[] = $fila;
            }
            return $registrosObtenidos;
        }
    }
    public function LlenarTablaE()
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT * FROM catalogos.computadoras;");
            $sentenciaSQL->execute();
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            $registrosObtenidos = array();
            foreach ($resultado as $fila) {
                $registrosObtenidos[] = $fila;
            }
            //var_dump($registrosObtenidos);
            return $registrosObtenidos;
        }
    }

    public function insertarEstudiante($datos)
    {
        // Verificar que haya una conexión válida
        if ($this->ConL != null) {
            // Crear la sentencia de inserción
            $sentencia = $this->ConL->prepare("INSERT INTO saci.PrestamoEquipo 
            (codigo, nombre, carrera, equipo, fecha_ingreso, hora_ingreso, hora_salida)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
            $resultado = $sentencia->execute(array(
                $datos->codigo,
                $datos->nombre,
                $datos->carrera,
                $datos->equipo,
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
    function obtenerpersona($id)
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT * FROM catalogos.usuarios WHERE no_cuenta = ?;");
            $sentenciaSQL->execute([$id]);
            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            if ($resultado > 0) {
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
    function obtenerComputadora($id)
    {
        if ($this->ConL != null) {
            $sentenciaSQL = $this->ConL->prepare("SELECT disponible FROM catalogos.computadoras WHERE idcomputadora = ?;");
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
