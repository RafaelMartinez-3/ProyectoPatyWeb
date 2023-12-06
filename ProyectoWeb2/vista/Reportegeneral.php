<?php

    try {
        require_once '../datos/conexion.php';
        require_once '../datos/DaoReporteGeneral.php';
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

        if(isset($_POST["fechaInicio"])&&isset($_POST["fachaTermino"]))
     {
        $usuario=$_SESSION['usuario'];
            $contrasenia=$_SESSION['contrasenia'];
            $conexion = new Conexion($usuario,$contrasenia);
            $dao = new DaoRG($conexion);
            $registros = $dao->LlenarTabla($_POST["fechaInicio"],$_POST["fachaTermino"]);
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
    <title>Reporte general</title>
</head>
<body>
    <div id="fondo"></div>
    <h1>Reporte General</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <label for="horaInicio">Hora de Inicio:</label>
        <input type="date" id="horaInicio" name="horaInicio" value="<?php echo $horaInicio; ?>" required>
        <br>

        <label for="horaTermino">Hora de Término:</label>
        <input type="date" id="horaTermino" name="horaTermino" value="<?php echo $horaTermino; ?>" required>     
        </select>
        <input type="submit" value="Ver reporte">
    </form>
     <?php if (!empty($registros)): ?>
            <table id="lista" class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>CUENTA</th>
                        <th>USUARIO</th>
                        <th>carrera</th>
                        <th>servicio</th>
                        <th>fecha</th>
                        <th>HORA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $registro):?>
                        <tr>
                            <td><?= $registro->cuenta ?></td>
                            <td><?= $registro->usuario ?></td>
                            <td><?= $registro->carrera?></td>
                            <td><?= $registro->servicio?></td>
                            <td><?= $registro->fecha?></td>
                            <td><?= $registro->hora?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay registros para mostrar.</p>
        <?php endif; ?>
</body>
</html>