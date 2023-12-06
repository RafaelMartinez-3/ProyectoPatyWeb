<?php
    require_once 'conexion.php';
    if (session_status() === PHP_SESSION_ACTIVE) {
              
    } else {
        session_start();
       // echo "La sesión no está activa.";
    }
    class DaoRG{
        public function __construct()
        {
            $usuario = $_SESSION['usuario'];
            $contrasenia = $_SESSION['contrasenia'];       
            $conexion = new Conexion($usuario, $contrasenia);
            $this->conexion = $conexion::obtenerConexion();
        }
        public function LlenarTabla($fechaInicio, $fechaTermino)
    {
        if ($this->conexion != null) {
              $query = "INSERT INTO saci.reportegeneral (cuenta, usuario, carrera, fecha, hora, servicios)
SELECT 
    codigo as cuenta,
    nombre as usuario,
    carrera, 
    fecha_ingreso as fecha,
    hora_ingreso as hora,
    'Computadoras' AS servicios
FROM saci.prestamoequipo where fecha_ingreso BETWEEN :fechaInicio AND :fechaTermino 
UNION 
SELECT 
    numero_cuenta as cuenta,
    usuario_responsable as nombre,
    carrera,
    fecha_prestamo as fecha,
    hora_inicio as hora,
    'Sala Audiovisaul' AS servicios
FROM saci.prestamossala where fecha_prestamo BETWEEN :fechaInicio AND :fechaTermino; 
SELECT 
    no_cuenta as cuenta,
    nombre,
    carrera,
    fecha_registro as fecha,
    hora_registro as hora,
    'Sala general' AS servicios
FROM saci.salageneral where fecha_registro BETWEEN :fechaInicio AND :fechaTermino; " ;
                $stmt = $this->conexion->prepare($query);
             $stmt->bindParam(':fechaInicio', $fechaInicio);
             $stmt->bindParam(':fechaTermino', $fechaTermino);
           
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            $registrosObtenidos = array();
            foreach ($resultado as $fila) {
                $registrosObtenidos[] = $fila;
            }
            return $registrosObtenidos;
        }
    }

    }
?>