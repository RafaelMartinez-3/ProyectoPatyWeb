<?php

require_once 'conexion.php';

            if (session_status() === PHP_SESSION_ACTIVE) {
              
            } else {
                session_start();
              //  echo "La sesión no está activa.";
            }

class DaoVisitasGuiadas
{
    private $Conexion;

    public function __construct()
    {
       $usuario = $_SESSION['usuario'];
        $contrasenia = $_SESSION['contrasenia'];       
        $conexion = new Conexion($usuario, $contrasenia);
        $this->Conexion = $conexion::obtenerConexion();
     
    }

    public function insertarVisita($responsable, $carrera, $numHombres, $numMujeres, $semestre, $grupo, $horaInicio, $horaTermino, $fecha)
    {
        try {
            $query = "INSERT INTO saci.visitasguiadas (responsable, carrera, num_hombres, num_mujeres, semestre, grupo, hora_inicio, hora_termino, fecha) 
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

            // Construimos la consulta SQL con marcadores de posición
            $placeholders = implode(',', array_fill(0, count($carrerasEspecificas), '?'));
            $query = "SELECT nombre FROM catalogos.carreras WHERE nombre IN ($placeholders)";

            // Obtén la instancia de PDO desde la conexión
            $pdo =  $this->Conexion;
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

    public function obtenerRegistrosVisitas()
{
    try {
        // Construimos la consulta SQL para obtener todos los registros de visitas guiadas
        $query = "SELECT * FROM saci.visitasguiadas";

        $pdo = Conexion::obtenerConexion();
        $stmt = $pdo->prepare($query);
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