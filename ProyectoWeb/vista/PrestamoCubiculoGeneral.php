<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo de Cubuculo Grupal</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }

        h1 {
            margin-top: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #userInfo {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #infoUsuario {
            margin-bottom: 15px;
            color: #555;
        }

        #listaPrestamos {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Registro de Prestamo de Cubiculo Grupal</h1>
    </header>

    <form id="prestamoForm">
        <div id="userInfo">
            <div id="infoUsuario">
                <!-- Quitar readonly para permitir la edici�n del usuario responsable -->
                <label for="usuarioResponsable">Usuario Responsable:</label>
                <input type="text" id="usuarioResponsable" name="usuarioResponsable">
            </div>
        </div>

        <label for="numeroCuenta">N�mero de Cuenta:</label>
        <input type="text" id="numeroCuenta" name="numeroCuenta">

        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera">

        <label for="numHombres">N�mero de Hombres:</label>
        <input type="number" id="numHombres" name="numHombres">

        <label for="numMujeres">N�mero de Mujeres:</label>
        <input type="number" id="numMujeres" name="numMujeres">

        <label for="numCubiculo">N�mero de Cub�culo:</label>
        <input type="number" id="numCubiculo" name="numCubiculo">

        <!-- La fecha se carga autom�ticamente por el sistema -->
        <input type="hidden" id="fechaRegistro" name="fechaRegistro" value="2023-11-27">

        <!-- La hora se sugiere autom�ticamente pero es modificable por el usuario -->
        <label for="horaInicio">Hora de Inicio:</label>
        <input type="text" id="horaInicio" name="horaInicio" value="10:00">

        <button type="submit">Registrar Pr�stamo</button>
        <button type="button" onclick="mostrarPrestamos()">Ver Pr�stamos</button>
    </form>

    <div id="listaPrestamos"></div>
</body>
</html>