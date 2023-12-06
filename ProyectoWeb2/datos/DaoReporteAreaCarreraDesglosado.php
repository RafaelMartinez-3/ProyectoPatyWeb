<?php
require_once 'conexion.php';

if (session_status() === PHP_SESSION_ACTIVE) {
              
} else {
    session_start();
}

class DaoReporteACDes
{
    private $Conexion;

    public function __construct()
    {
        $usuario = $_SESSION['usuario'];
        $contrasenia = $_SESSION['contrasenia'];
        $conexion = new Conexion($usuario, $contrasenia);
        $this->Conexion = $conexion::obtenerConexion();
    }

    public function obtenerAreaDesglosado($fechaInicio, $fechaTermino, $carrera)
    {
        try {
            // Construimos la consulta SQL para obtener los registros de acuerdo a los parámetros
            $query = "SELECT cuenta, usuario, computadoras, espacio,
            fecha, hora
            FROM saci.areadesglosado
            WHERE fecha >= :fechaInicio AND fecha <= :fechaTermino AND Carrera = :carrera";
         
            if($this->Conexion!==null)
            {
                $stmt = $this->Conexion->prepare($query);

                // Enlazamos los parámetros
                $stmt->bindParam(':fechaInicio', $fechaInicio);
                $stmt->bindParam(':fechaTermino', $fechaTermino);
                $stmt->bindParam(':carrera', $carrera);
    
                // Ejecutamos la consulta
                $stmt->execute();
                $registrosObtenidos = array();
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $registrosObtenidos[] = $fila;
                }
    
                return $registrosObtenidos;
            }else
            {
                echo"NO JALA";
            }
            // Preparamos la consulta
        } catch (PDOException $e) {
            // Manejo de errores: Puedes personalizar cómo manejas las excepciones aquí
            error_log("Error en la consulta SQL: " . $e->getMessage());
            throw new Exception("Error en la consulta SQL: " . $e->getMessage());
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

            $pdo = Conexion::obtenerConexion();
            $stmt = $pdo->prepare($query);

            // Vinculamos los valores de manera segura usando bindParam
            foreach ($carrerasEspecificas as $index => $carrera) {
                $stmt->bindValue($index + 1, $carrera);
            }

            // Ejecutamos la consulta
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