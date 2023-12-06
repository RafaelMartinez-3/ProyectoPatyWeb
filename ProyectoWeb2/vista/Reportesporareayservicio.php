<?php

    try {
        require_once '../datos/conexion.php';
        require_once '../datos/DaoReportesareayservicio.php';
        if (session_status() === PHP_SESSION_ACTIVE) {
          
        } else {
            session_start();
            echo "La sesión no está activa.";
        }
        $usuario=$_SESSION['usuario'];
        $contrasenia=$_SESSION['contrasenia'];
        $conexion = new Conexion($usuario,$contrasenia);
        
    
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

        if(isset($_POST["fechaInicio"])&&isset($_POST["fachaTermino"])
        &&isset($_POST["carrera"])&&isset($_POST["servicio"]))
     {
        if($_POST["servicio"]=="SALA GENERAL")
        {  
         
        }else if($_POST["servicio"]=="EQUIPO DE COMPUTO")
        {
            $usuario=$_SESSION['usuario'];
            $contrasenia=$_SESSION['contrasenia'];
            $conexion = new Conexion($usuario,$contrasenia);
            $dao = new DaoRAS($conexion);
            $registros = $dao->LlenarTablaEquipoComputo($_POST["fechaInicio"],$_POST["fachaTermino"]);
            //var_dump($registros);
       }
        else if($_POST["servicio"]=="CUBICULO DE ESTUDIO")
        {
    
        }
        else if($_POST["servicio"]=="VISITAS GUIADAS")
        {
    
        }
        else if($_POST["servicio"]=="SALA VIDEOTECA")
        {
            $usuario=$_SESSION['usuario'];
            $contrasenia=$_SESSION['contrasenia'];
            $conexion = new Conexion($usuario,$contrasenia);
            $dao = new DaoRAS($conexion);
            $registros = $dao->LlenarTablaSalaAudio($_POST["fechaInicio"],$_POST["fachaTermino"]);
        }
      
    
    
     }else
     {
        //echo"FALTAN DATOS";
     }
    
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Visitas.css">
    <link rel="stylesheet" href="dt/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="dt/Buttons-2.4.2/css/buttons.bootstrap5.min.css">
    <title>Reporte por area y servicio</title>
</head>
<body>
    <div id="fondo"></div>
    <h1>Reporte por area y servicio</h1>

    <?php
    // Requiere nuevamente los archivos de conexión y DaoVisitasGuiadas
    require_once '../datos/conexion.php';
    require_once '../datos/DaoReportesareayservicio.php';

    $usuario=$_SESSION['usuario'];
    $contrasenia=$_SESSION['contrasenia'];
    $conexion = new Conexion($usuario,$contrasenia);
    $dao = new DaoRAS($conexion);
    $listaCarreras = $dao->obtenerCarrerasEspecificas();
    ?>
    

    <form method="post">
        
        <label for="fechaInicio">Hora de Inicio:</label>
        <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo $fechaInicio; ?>" required>
        <br>

        <label for="fachaTermino">Hora de Termino:</label>
        <input type="date" id="fachaTermino" name="fachaTermino" value="<?php echo $fachaTermino; ?>" required>
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
         <label for="servicio">Servicio:</label>
        <select id="servicio" name="servicio" required>
            <option value="SALA GENERAL">SALA GENERAL</option>
            <option value="EQUIPO DE COMPUTO">EQUIPO DE COMPUTO</option>
            <option value="CUBICULO DE ESTUDIO">CUBICULO DE ESTUDIO </option>
            <option value="VISITAS GUIADAS">VISITAS GUIADAS</option>
            <option value="SALA VIDEOTECA">SALA VIDEOTECA</option>            
        </select>
        <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-4 mx-2">Ver Prestamo</button>
                <button type="button" id="btnVolver" class="btn btn-secondary col-4 mx-2">Cerrar</button>
            </div>
    </form>
    <div>
    <?php if (!empty($registros)): ?>
            <table id="lista" class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>CUENTA</th>
                        <th>USUARIO</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $registro):?>
                        <tr>
                            <td><?= $registro->codigo ?></td>
                            <td><?= $registro->nombre ?></td>
                            <td><?= $registro->fecha_ingreso ?></td>
                            <td><?= $registro->hora_ingreso ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay registros para mostrar.</p>
        <?php endif; ?>
        </div>
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
    <script>
            document.addEventListener('DOMContentLoaded',()=>{
    document.getElementById("btnVolver").addEventListener('click',e=>{
        location.replace("Reportes.php");
    });
});

        </script>
</body>
</html>