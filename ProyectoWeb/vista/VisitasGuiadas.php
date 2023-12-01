<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Visitas Guiadas</title>
</head>
<body>

    <h1>Registro de Visitas Guiadas</h1>

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

    // Carreras disponibles
    $carreras = array(
        "Seleccione una opcion",
        "Gastronomia",
        "Ingenieria Industrial",
        "Ingenieria Ambiental",
        "Ingenieria Electronica",
        "Ingenieria en Gestion empresarial",
        "Ingenieria en Sistemas Automotrices",
        "Ingenieria en Sistemas Computacioneles"
    );

    // Verifica si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $responsable = $_POST["responsable"];
        $carrera = $_POST["carrera"];
        $numHombres = $_POST["numHombres"];
        $numMujeres = $_POST["numMujeres"];
        $semestre = $_POST["semestre"];
        $grupo = $_POST["grupo"];
        $horaInicio = $_POST["horaInicio"];
        $horaTermino = $_POST["horaTermino"];

        // Mostrar información de la visita registrada
        echo "<p>Registro de visita:</p>";
        echo "<p>Responsable: $responsable ($carrera)</p>";
        echo "<p>Número de Hombres: $numHombres</p>";
        echo "<p>Número de Mujeres: $numMujeres</p>";
        echo "<p>Semestre: $semestre</p>";
        echo "<p>Grupo: $grupo</p>";
        echo "<p>Hora de Inicio: $horaInicio</p>";
        echo "<p>Hora de Término: $horaTermino</p>";
        echo "<p>Fecha: $fecha</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="responsable">Responsable (Número de cuenta del docente):</label>
        <input type="text" id="responsable" name="responsable" required>
        <br>

        <label for="carrera">Carrera:</label>
        <select id="carrera" name="carrera" required>
            <?php
            // Mostrar opciones de carreras
            foreach ($carreras as $opcion) {
                echo "<option value='$opcion'>$opcion</option>";
            }
            ?>
        </select>
        <br>

        <label for="numHombres">Número de Hombres:</label>
        <input type="number" id="numHombres" name="numHombres" required>
        <br>

        <label for="numMujeres">Número de Mujeres:</label>
        <input type="number" id="numMujeres" name="numMujeres" required>
        <br>

        <label for="semestre">Semestre:</label>
        <input type="text" id="semestre" name="semestre" required>
        <br>

        <label for="grupo">Grupo:</label>
        <input type="text" id="grupo" name="grupo" required>
        <br>

        <label for="horaInicio">Hora de Inicio:</label>
        <input type="time" id="horaInicio" name="horaInicio" value="<?php echo $horaInicio; ?>" required>
        <br>

        <label for="horaTermino">Hora de Término:</label>
        <input type="time" id="horaTermino" name="horaTermino" value="<?php echo $horaTermino; ?>" required>
        <br>

        <input type="submit" value="Registrar Visita">
    </form>

</body>
</html>