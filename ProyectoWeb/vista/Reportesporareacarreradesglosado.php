<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Visitas.css">
    <title>Registro de Visitas Guiadas</title>
</head>
<body>
    <div id="fondo"></div>
    <h1>Reporte por area carreras desglosado</h1>
    

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <label for="horaInicio">Hora de Inicio:</label>
        <input type="time" id="horaInicio" name="horaInicio" value="<?php echo $horaInicio; ?>" required>
        <br>

        <label for="horaTermino">Hora de Término:</label>
        <input type="time" id="horaTermino" name="horaTermino" value="<?php echo $horaTermino; ?>" required>
        <br>
        <label for="carrera">Carrera:</label>
        <select id="carrera" name="carrera" required>
            
        </select>
        <input type="submit" value="Ver reporte">
    </form>

</body>
</html>