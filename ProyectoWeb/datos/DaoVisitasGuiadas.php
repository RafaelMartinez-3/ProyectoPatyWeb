<?php

require_once 'conexion.php';

class DaoVisitasGuiadas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function insertarVisita($responsable, $carrera, $numHombres, $numMujeres, $semestre, $grupo, $horaInicio, $horaTermino, $fecha)
    {
        try {
            $query = "INSERT INTO visitas_guiadas (responsable, carrera, num_hombres, num_mujeres, semestre, grupo, hora_inicio, hora_termino, fecha) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(1, $responsable);
            $stmt->bindParam(2, $carrera);
            $stmt->bindParam(3, $numHombres);
            $stmt->bindParam(4, $numMujeres);
            $stmt->bindParam(5, $semestre);
            $stmt->bindParam(6, $grupo);
            $stmt->bindParam(7, $horaInicio);
            $stmt->bindParam(8, $horaTermino);
            $stmt->bindParam(9, $fecha);

            $stmt->execute();
            $stmt->closeCursor();

            return true;
        } catch (PDOException $e) {
            error_log("Error al insertar visita: " . $e->getMessage());

            if ($stmt) {
                $stmt->closeCursor();
            }

            throw new Exception("Error al insertar visita: " . $e->getMessage());
        }
    }

    public function obtenerCarrerasEspecificas()
    {
        try {
            // Carreras específicas que deseas
            $carrerasEspecificas = ['ING. ELECTRÓNICA', 'ING. SISTEMAS COMPUTACIONALES', 'ING. INDUSTRIAL', 'ING. GESTIÓN EMPRESARIAL', 'ING. EN SIS. AUTOMOTRICES', 'ING. AMBIENTAL', 'LIC. GASTRONOMÍA'];
    
            // Construimos la consulta SQL para obtener solo las carreras deseadas
            $query = "SELECT nombre FROM catalogos.carreras WHERE nombre IN ('" . implode("','", $carrerasEspecificas) . "')";
    
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
    
            $carrerasObtenidas = array();
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $carrerasObtenidas[] = $fila['nombre'];
            }
            return $carrerasObtenidas;
        } catch (PDOException $e) {
            return array();
        }
    }    
}

?>