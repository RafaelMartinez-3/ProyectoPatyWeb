<?php
require_once 'conexion.php';

if (session_status() === PHP_SESSION_ACTIVE) {
              
} else {
    session_start();
    echo "La sesión no está activa.";
}

class DaoReporteACD
{
    private $conexion;

    public function __construct()
    {
        $conexionActual = Conexion::obtenerConexion();
        $this->conexion = $conexionActual;
    }

    public function obtenerAreaConcentrado($fechaInicio, $fechaTermino, $carrera)
{
    try {
        // Construimos la consulta SQL para obtener los registros de acuerdo a los parámetros
        $query = "SELECT hombres, mujeres, total FROM saci.areaconcentrado WHERE fechaInicio >= :fechaInicio AND fechaTermino <= :fechaTermino AND Carrera = :carrera";

        $pdo = Conexion::obtenerConexion();
        $stmt = $pdo->prepare($query);

        // Enlazamos los parámetros
            $stmt->bindParam(':fechaInicio', $fechaInicio);
            $stmt->bindParam(':fechaTermino', $fechaTermino);
        $stmt->bindParam(':carrera', $carrera);

        $stmt->execute();

        $registrosObtenidos = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $registrosObtenidos[] = $fila;
        }
        return $registrosObtenidos;
    } catch (PDOException $e) {
        // Manejo de errores: Puedes personalizar cómo manejas las excepciones aquí
        return array();
    }
}
}

?>