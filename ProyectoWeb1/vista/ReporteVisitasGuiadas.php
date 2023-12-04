<?php
require_once '../datos/conexion.php';
require_once '../datos/DaoVisitasGuiadas.php';
require('menu.php');
try {
    require_once '../datos/conexion.php';
    require_once '../datos/DaoVisitasGuiadas.php';
    if (session_status() === PHP_SESSION_ACTIVE) {
      
    } else {
        session_start();
        echo "La sesión no está activa.";
    }
    $usuario=$_SESSION['usuario'];
    $contrasenia=$_SESSION['contraseña'];
    $conexion = new Conexion($usuario,$contrasenia);
    
    // Obtener registros de visitas
    $daoVisitas = new DaoVisitasGuiadas($conexion);
    $registros = $daoVisitas->obtenerRegistrosVisitas();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Visitas Guiadas</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="dt/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="dt/Buttons-2.4.2/css/buttons.bootstrap5.min.css">
    <style>
        #lista {
            font-size: 0.9rem;
            width: auto;
            margin: auto;
        }
    </style>
</head>
<body>

        <?php if (!empty($registros)): ?>
            <table id="lista" class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Responsable</th>
                        <th>Carrera</th>
                        <th>Número de Hombres</th>
                        <th>Número de Mujeres</th>
                        <th>Semestre</th>
                        <th>Grupo</th>
                        <th>Hora de Inicio</th>
                        <th>Hora de Término</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $registro): ?>
                        <tr>
                            <td><?= $registro['responsable'] ?></td>
                            <td><?= $registro['carrera'] ?></td>
                            <td><?= $registro['num_hombres'] ?></td>
                            <td><?= $registro['num_mujeres'] ?></td>
                            <td><?= $registro['semestre'] ?></td>
                            <td><?= $registro['grupo'] ?></td>
                            <td><?= $registro['hora_inicio'] ?></td>
                            <td><?= $registro['hora_termino'] ?></td>
                            <td><?= $registro['fecha'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay registros de visitas.</p>
        <?php endif; ?>
    <script src="/bootstrap.bundle.min.js"></script>
    <script src="dt/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
    <script src="dt/DataTables-1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="dt/DataTables-1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="dt/Buttons-2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="dt/Buttons-2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="dt/JSZip-3.10.1/jszip.min.js"></script>
    <script src="dt/pdfmake-0.2.7/pdfmake.min.js"></script>
    <script src="dt/pdfmake-0.2.7/vfs_fonts.js"></script>
    <script src="dt/Buttons-2.4.2/js/buttons.html5.min.js"></script>
    <script src="dt/Buttons-2.4.2/js/buttons.print.min.js"></script>
    <script src="dt/Buttons-2.4.2/js/buttons.colVis.min.js"></script>
    <script src="JS/listaVisita.js"></script>
</body>
</html>