    <?php
            require_once '../datos/conexion.php';
            require_once '../datos/DaoVisitasGuiadas.php';
            
    // Verifica si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Variables
        $responsable = $_POST["responsable"];
        $carrera = $_POST["carrera"];
        $numHombres = $_POST["numHombres"];
        $numMujeres = $_POST["numMujeres"];
        $semestre = $_POST["semestre"];
        $grupo = $_POST["grupo"];
        $horaInicio = $_POST["horaInicio"];
        $horaTermino = $_POST["horaTermino"];
        $fecha = date("Y-m-d");  // Fecha actual

        // Guardar en la base de datos
        try {
           require_once '../datos/conexion.php';
            require_once '../datos/DaoVisitasGuiadas.php';
            session_start();
            $usuario=$_SESSION['usuario'];
            $contrasenia=$_SESSION['contraseña'];
            $conexion = new Conexion($usuario,$contrasenia);
            $dao = new DaoVisitasGuiadas();

            // Llama al método para insertar visita
            $dao->insertarVisita($responsable, $carrera, $numHombres, $numMujeres, $semestre, $grupo, $horaInicio, $horaTermino, $fecha);

            echo "Registro exitoso";
        } catch (Exception $e) {
            echo "Error al registrar visita: " . $e->getMessage();
        }
    }
    ?><!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/Visitas.css">
        <title>Registro de Visitas Guiadas</title>
    </head>
    <body>
    <div id="fondo"></div>
        <?php
        // Variables
        $responsable = "";
        $carrera = "";
        $numHombres = 0;
        $numMujeres = 0;
        $semestre = "";
        $grupo = "";
        $horaInicio = date("H:i");
        $horaTermino = date("H:i");
        $fecha = date("Y-m-d");

        require_once '../datos/conexion.php';
        require_once '../datos/DaoVisitasGuiadas.php';
        $us=conexion::$usuario;
        $cont=conexion::$contrasenia;
        
        $conexion= new conexion($us,$cont);
        $dao = new DaoVisitasGuiadas($conexion);
        $listaCarreras = $dao->obtenerCarrerasEspecificas();
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Registro de Visitas Guiadas</h1>

            <label for="responsable">Responsable (Número de cuenta del docente):</label>
            <input class="form-control form-control" type="text" id="responsable" name="responsable" required>

            <label for="carrera">Carrera:</label>
            <select class="form-control form-control" id="carrera" name="carrera" required>
                <?php
                // Mostrar opciones de carreras
                foreach ($listaCarreras as $opcion) {
                    echo "<option value='$opcion'>$opcion</option>";
                }
                ?>
            </select>

            <label for="numHombres">Número de Hombres:</label>
            <input class="form-control form-control" type="number" id="numHombres" name="numHombres" required>

            <label for="numMujeres">Número de Mujeres:</label>
            <input class="form-control form-control" type="number" id="numMujeres" name="numMujeres" required>

            <label for="semestre">Semestre:</label>
            <input class="form-control form-control" type="text" id="semestre" name="semestre" required>

            <label for="grupo">Grupo:</label>
            <input class="form-control form-control" type="text" id="grupo" name="grupo" required>

            <label for="horaInicio">Hora de Inicio:</label>
            <input class="form-control form-control" type="time" id="horaInicio" name="horaInicio" value="<?php echo $horaInicio; ?>" required>

            <label for="horaTermino">Hora de Término:</label>
            <input class="form-control form-control "type="time" id="horaTermino" name="horaTermino" value="<?php echo $horaTermino; ?>" required>

            <div class="row justify-content-center">
                <button class="btn btn-primary col-4 mx-2" type="submit">Registrar</button>
                <button type="button" id="btnVolver" class="btn btn-secondary col-4 mx-2">Cerrar</button>
            </div>
        </form>
        <script src="JS/visita.js"></script>
    </body>
    </html>