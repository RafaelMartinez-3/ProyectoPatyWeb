<?php
session_start(); // Inicia la sesión al principio del script

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

    try {
        require_once '../datos/conexion.php';
        require_once '../datos/DaoReporteAreaCarreraDesglosado.php';

        // Si la sesión no está activa, la inicia
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
            echo "La sesión no está activa.";
        }

        $usuario = $_SESSION['usuario'];
        $contrasenia = $_SESSION['contrasenia'];
        $conexion = new Conexion($usuario, $contrasenia);
        $dao = new DaoReporteACDes($conexion);

        echo "Registro exitoso";
    } catch (Exception $e) {
        echo "Error al registrar visita: " . $e->getMessage();
    }
}

try {
    require_once '../datos/conexion.php';
    require_once '../datos/DaoReporteAreaCarreraDesglosado.php';

    // Establecer las credenciales de la base de datos (ajusta esto según tus necesidades)
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
        //echo "La sesión no está activa.";
    }
    $usuario = $_SESSION['usuario'];
    $contrasenia = $_SESSION['contrasenia'];
    $conexion = new Conexion($usuario, $contrasenia);
    $dao = new DaoReporteACDes($conexion);

    // Convierte el formato de fecha de "03/12/2023" a "2023-12-03"
    if ($fechaInicio) {
        try {
            $fechaInicioDateTime = new DateTime($fechaInicio);
            $fechaInicio = $fechaInicioDateTime->format('Y-m-d');
        } catch (Exception $e) {
            echo "Error al convertir las fechas: " . $e->getMessage();
            // Puedes agregar más manejo de errores o redireccionar según sea necesario
            exit;
        }
    }

    // Obtener registros de visitas con condiciones
    $registros = $dao->obtenerAreaDesglosado($fechaInicio, $fechaTermino, $carrera);

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
    <title>Reporte por área carreras desglosado</title>
</head>
<body>
    <div id="fondo"></div>
    <h1>Reporte por área carreras desglosado</h1>

    <?php
    // Requiere nuevamente los archivos de conexión
    require_once '../datos/conexion.php';
    require_once '../datos/DaoReporteAreaCarreraDesglosado.php';

    $Cuenta = "";
    $Usuario = "";
    $Fecha = "";
    $Hora = "";

     if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
        //echo "La sesión no está activa.";
    }
    $usuario = $_SESSION['usuario'];
    $contrasenia = $_SESSION['contrasenia'];
    $conexion = new Conexion($usuario, $contrasenia);
    $dao = new DaoReporteACDes($conexion);
    $listaCarreras = $dao->obtenerCarrerasEspecificas();
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo $fechaInicio; ?>" required>
        <br>

        <label for="fechaTermino">Hora de Término:</label>
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
                    <th>Cuenta</th>
                    <th>Usuario</th>
                    <th>servicio</th>
                    <th>espacio</th>
                    <th>Fecha</th>
                    <TH>Hora</TH>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro):?>
                    <tr>
                        <td><?= $registro['cuenta'] ?></td>
                        <td><?= $registro['usuario'] ?></td>
                        <td><?= $registro['computadoras'] ?></td>
                        <td><?= $registro['espacio'] ?></td>
                        <td><?= $registro['fecha'] ?></td>
                        <td><?= $registro['hora'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay registros para mostrar.</p>
    <?php endif; ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById("btnVolver").addEventListener('click', e => {
                location.replace("Reportes.php");
            });
        });
    </script>
</body>
</html>