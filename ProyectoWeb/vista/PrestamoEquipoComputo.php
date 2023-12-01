<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Préstamo de Equipo de Cómputo</title>
    <link rel="stylesheet" href="CSS/EquipoComputo.css">

</head>
<body>
    <h1>Registro de Préstamo de Equipo de Cómputo</h1>

    <form id="prestamoForm" method="post" action="../datos/EquipoComputoP.php"></form>
        <label for="numeroCuenta">Número de Cuenta:</label>
        <input type="text" id="numeroCuenta" required>

        <label for="usuarioCarrera">Usuario y Carrera:</label>
        <input type="text" id="usuarioCarrera" readonly>

        <label for="numeroEquipo">Número de Equipo:</label>
        <input type="number" id="numeroEquipo" required>

        <button type="submit" onclick="registrarPrestamo()">Registrar Préstamo</button>
    </form>

    <h2>Lista de Préstamos</h2>
    <table id="prestamosTable">
        <thead>
            <tr>
                <th>Número de Cuenta</th>
                <th>Usuario y Carrera</th>
                <th>Número de Equipo</th>
                <th>Fecha de Préstamo</th>
                <th>Hora de Inicio</th>
                <th>Hora de Término</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>

</body>
</html>
