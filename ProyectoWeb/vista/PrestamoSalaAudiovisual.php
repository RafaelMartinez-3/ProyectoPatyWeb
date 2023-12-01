<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pr�stamo de Sala Audiovisual</title>
   <link rel="stylesheet" href="CSS/SalaAudiovisual.css">
</head>
<body>
 
    <h1>Registro de Pr�stamo de Sala Audiovisual</h1>

   
<form id="prestamoForm" method="post" action="../datos/SalaAudiovisualP.php">
    <label for="numeroCuenta">N�mero de Cuenta del Usuario Responsable:</label>
    <input type="text" id="numeroCuenta" name="numeroCuenta" required>

    <label for="usuarioCarrera">Usuario Responsable y Carrera:</label>
    <input type="text" id="usuarioCarrera" name="usuarioCarrera" readonly>

    <label for="numUsuariosHombres">N�mero de Usuarios Hombres:</label>
    <input type="number" id="numUsuariosHombres" name="numUsuariosHombres" required>

    <label for="numUsuariosMujeres">N�mero de Usuarios Mujeres:</label>
    <input type="number" id="numUsuariosMujeres" name="numUsuariosMujeres" required>

    <label for="horaInicio">Hora de Inicio (sugerida por el sistema):</label>
    <input type="text" id="horaInicio" name="horaInicio" readonly>

    <button type="submit">Registrar Pr�stamo </button>
</form>

    <h2>Lista de Pr�stamos</h2>
    <table id="prestamosTable">
        <thead>
            <tr>
                <th>N�mero de Cuenta</th>
                <th>Usuario Responsable y Carrera</th>
                <th>N�mero de Hombres</th>
                <th>N�mero de Mujeres</th>
                <th>Fecha de Pr�stamo</th>
                <th>Hora de Inicio</th>
                <th>Hora de T�rmino</th>
            </tr>
        </thead>
        <tbody>
            <!-- Las filas de la tabla se llenar�n din�micamente con JavaScript -->
        </tbody>
    </table>
</body>
</html>
