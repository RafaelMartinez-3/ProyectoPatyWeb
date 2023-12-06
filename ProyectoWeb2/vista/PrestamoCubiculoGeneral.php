<?php
require_once("../datos/conexion.php");

require('Menu.php');
if (session_status() === PHP_SESSION_ACTIVE) {
} else {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo de Cubuculo Grupal</title>
    
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
   <link rel="stylesheet" href="CSS/prestamoCubiculo.css">
</head>
<body>
    <form id="prestamoForm">
        <div id="userInfo">
            <div id="infoUsuario">
            <label for="numeroCuenta">Numero de Cuenta:</label>
        <input type="text" id="numeroCuenta" name="numeroCuenta">
            </div>
        </div>

        <label for="numHombres">Numero de Hombres:</label>
        <input type="number" id="numHombres" name="numHombres">

        <label for="numMujeres">Numero de Mujeres:</label>
        <input type="number" id="numMujeres" name="numMujeres">

        <label for="numCubiculo">Numero de Cubiculo:</label>
        <input type="number" id="numCubiculo" name="numCubiculo">

        <input type="hidden" id="fechaRegistro" name="fechaRegistro">

        <label for="horaInicio">Hora de Inicio:</label>
        <input type="time" id="horaInicio" name="horaInicio">

        <label for="horaInicio">Fecha de Termino    :</label>
        <input type="time" id="horaInicio" name="horaInicio">
        <button type="submit">Registrar Prestamo</button>

    </form>

    <div id="listaPrestamos"></div>
</body>
</html>