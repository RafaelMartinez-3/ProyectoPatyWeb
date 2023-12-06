<?php
if (session_status() === PHP_SESSION_ACTIVE) {
    // La sesión está activa
   // echo "La sesión está activa.";
} else {
    // La sesión no está activa
    session_start();
}
$fechaInicioDateTime = null;
$fechaTerminoDateTime = null;
$fechaInicio = "";
$fechaTermino = "";
$carrera = "";

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables
    $fechaInicio = $_POST["fechaInicio"];
    $fechaTermino = $_POST["fechaTermino"];
    $carrera = $_POST["carrera"];

    // Verifica el formato de las fechas
    $fechaInicioDateTime = DateTime::createFromFormat('Y-m-d', $fechaInicio);
    $fechaTerminoDateTime = DateTime::createFromFormat('Y-m-d', $fechaTermino);

    // Verifica si las fechas son válidas
    if (!$fechaInicioDateTime || !$fechaTerminoDateTime) {
        echo "Formato de fecha no válido. Utiliza el formato 'YYYY-MM-DD'.";
        // Puedes agregar más manejo de errores o redireccionar según sea necesario
        exit;
    }

    try {
        require_once '../datos/conexion.php';
        require_once '../datos/DaoReporteAreaCarreraConcentrado.php';

        $usuario = $_SESSION['usuario'];
        $contrasenia = $_SESSION['contrasenia'];
        $conexion = new Conexion($usuario, $contrasenia);
        $dao = new DaoReporteACD($conexion);

        echo "Registro exitoso";
    } catch (Exception $e) {
        echo "Error al registrar visita: " . $e->getMessage();
    }
}

try {
    require_once '../datos/conexion.php';
    require_once '../datos/DaoReporteAreaCarreraConcentrado.php';
    if (session_status() === PHP_SESSION_ACTIVE) {
        // La sesión está activa
       // echo "La sesión está activa.";
    } else {
        // La sesión no está activa
        session_start();
    }
    // Establecer las credenciales de la base de datos (ajusta esto según tus necesidades)
    $usuario = $_SESSION['usuario'];
    $contrasenia = $_SESSION['contrasenia'];
    $conexion = new Conexion($usuario, $contrasenia);
    $dao = new DaoReporteACD($conexion);

    // Convierte el formato de fecha de "03/12/2023" a "2023-12-03"
    if ($fechaInicioDateTime && $fechaTerminoDateTime) {
        try {
            $fechaInicio = $fechaInicioDateTime->format('Y-m-d');
            $fechaTermino = $fechaTerminoDateTime->format('Y-m-d');
        } catch (Exception $e) {
            echo "Error al convertir las fechas: " . $e->getMessage();
            // Puedes agregar más manejo de errores o redireccionar según sea necesario
            exit;
        }
    }

    // Obtener registros de visitas con condiciones
    $registros = $dao->obtenerAreaConcentrado($fechaInicio, $fechaTermino, $carrera);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Visitas.css">
    <title>Reporte por área carreras concentrado</title>
</head>
<body>
    <div id="fondo"></div>
    <h1>Reporte por área carreras concentrado</h1>

    <?php
    // Requiere nuevamente los archivos de conexión y DaoVisitasGuiadas
    require_once '../datos/conexion.php';
    require_once '../datos/DaoVisitasGuiadas.php';

    $Hombres = ""; // Se inicializan las variables (ajusta según sea necesario)
    $Mujeres = "";
    $Total = "";
    if (session_status() === PHP_SESSION_ACTIVE) {
        // La sesión está activa
       // echo "La sesión está activa.";
    } else {
        // La sesión no está activa
        session_start();
    }   
    $usuario = $_SESSION['usuario'];
    $contrasenia = $_SESSION['contrasenia'];
    $conexion = new Conexion($usuario, $contrasenia);
    $dao = new DaoVisitasGuiadas($conexion);
    $listaCarreras = $dao->obtenerCarrerasEspecificas();
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo $fechaInicio; ?>" required>
        <br>

        <label for="fechaTermino">Fecha de Término:</label>
        <input type="date" id="fechaTermino" name="fechaTermino" value="<?php echo $fechaTermino; ?>" required>
        <br>
        
        <label for="carrera">Carrera:</label>
        <select id="carrera" name="carrera" required>
            <?php
            // Mostrar opciones de carreras
            foreach ($listaCarreras as $opcion) {
                echo "<option value='$opcion'>$opcion</option>";
            }
            ?>
        </select>
        
        <div class="row justify-content-center">
                <button class="btn btn-primary col-4 mx-2">Ver Prestamo</button>
                <button type="button" id="btnVolver" class="btn btn-secondary col-4 mx-2">Cerrar</button>
            </div>
    </form>
    <?php if (!empty($registros)): ?>
            <table id="lista" class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Hombres</th>
                        <th>Mujeres</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $registro):?>
                        <tr>
                            <td><?= $registro['hombres'] ?></td>
                            <td><?= $registro['mujeres'] ?></td>
                            <td><?= $registro['total'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay registros para mostrar.</p>
        <?php endif; ?>
        <script>
            document.addEventListener('DOMContentLoaded',()=>{
    document.getElementById("btnVolver").addEventListener('click',e=>{
        location.replace("Reportes.php");
    });
});

        </script>
</body>
</html>