<?php
require_once 'conexion.php';
if (session_status() === PHP_SESSION_ACTIVE) {
              
} else {
    session_start();
   // echo "La sesión no está activa.";
}

class DaoRAS{

    private $conexion;

    public function __construct()
    {
        $usuario = $_SESSION['usuario'];
        $contrasenia = $_SESSION['contrasenia'];       
        $conexion = new Conexion($usuario, $contrasenia);
        $this->conexion = $conexion::obtenerConexion();
    }
    public function LlenarTablaSalaAudio($fechaInicio, $fechaTermino)
    {
        if ($this->conexion != null) {
              $query = "SELECT numero_cuenta as codigo,usuario_responsable as nombre,
              fecha_prestamo as fecha_ingreso,hora_inicio as hora_ingreso
              FROM saci.prestamossala 
              WHERE fecha_prestamo BETWEEN :fechaInicio AND :fechaTermino;" ;
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

    public function LlenarTablaEquipoComputo($fechaInicio, $fechaTermino)
    {
        if ($this->conexion != null) {
              $query = "SELECT codigo, nombre, fecha_ingreso, hora_ingreso 
              FROM saci.prestamoequipo 
              WHERE fecha_ingreso BETWEEN :fechaInicio AND :fechaTermino;" ;
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
    public function obtenerCarrerasEspecificas()
    {
        try {
            // Carreras específicas que deseas
            $carrerasEspecificas = ['ING. ELECTRÓNICA', 'ING. SISTEMAS COMPUTACIONALES', 'ING. INDUSTRIAL', 'ING. GESTIÓN EMPRESARIAL', 'ING. EN SIS. AUTOMOTRICES', 'ING. AMBIENTAL', 'LIC. GASTRONOMÍA'];

            // Construimos la consulta SQL con marcadores de posición
            $placeholders = implode(',', array_fill(0, count($carrerasEspecificas), '?'));
            $query = "SELECT nombre FROM catalogos.carreras WHERE nombre IN ($placeholders)";

            // Obtén la instancia de PDO desde la conexión
            $pdo =  $this->conexion;
            $stmt = $pdo->prepare($query);            

            // Vinculamos los valores de manera segura usando bindParam
            foreach ($carrerasEspecificas as $index => $carrera) {
                $stmt->bindValue($index + 1, $carrera);
            }            

            $stmt->execute();

            $carrerasObtenidas = array();
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $carrerasObtenidas[] = $fila['nombre'];
            }

            return $carrerasObtenidas;
        } catch (PDOException $e) {
            // Mejor manejo de excepciones
            error_log("Error al obtener carreras específicas: " . $e->getMessage());
            throw new Exception("Error al obtener carreras específicas: " . $e->getMessage());
        }
    }
}
?>