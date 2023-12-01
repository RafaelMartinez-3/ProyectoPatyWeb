<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Préstamo de Sala Audiovisual</title>
   <link rel="stylesheet" href="CSS/SalaAudiovisual.css">
</head>
<body>
 
    <h1>Registro de Préstamo de Sala Audiovisual</h1>

   
<form id="prestamoForm" method="post" action="../datos/SalaAudiovisualP.php">
    <label for="numeroCuenta">Número de Cuenta del Usuario Responsable:</label>
    <input type="text" id="numeroCuenta" name="numeroCuenta" required>

    <label for="usuarioCarrera">Usuario Responsable y Carrera:</label>
    <input type="text" id="usuarioCarrera" name="usuarioCarrera" readonly>

    <label for="numUsuariosHombres">Número de Usuarios Hombres:</label>
    <input type="number" id="numUsuariosHombres" name="numUsuariosHombres" required>

    <label for="numUsuariosMujeres">Número de Usuarios Mujeres:</label>
    <input type="number" id="numUsuariosMujeres" name="numUsuariosMujeres" required>

    <label for="horaInicio">Hora de Inicio (sugerida por el sistema):</label>
    <input type="text" id="horaInicio" name="horaInicio" readonly>

    <button type="submit">Registrar Préstamo </button>
</form>

    <h2>Lista de Préstamos</h2>
    <table id="prestamosTable">
        <thead>
            <tr>
                <th>Número de Cuenta</th>
                <th>Usuario Responsable y Carrera</th>
                <th>Número de Hombres</th>
                <th>Número de Mujeres</th>
                <th>Fecha de Préstamo</th>
                <th>Hora de Inicio</th>
                <th>Hora de Término</th>
            </tr>
        </thead>
        <tbody>
            <!-- Las filas de la tabla se llenarán dinámicamente con JavaScript -->
        </tbody>
    </table>
</body>
</html>
