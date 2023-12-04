<?php
require_once("../datos/conexion.php");
require_once("../datos/DaoPrestamoEquipo.php");
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
    <title>Registro de Préstamo de Equipo de Cómputo</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/EquipoComputo.css">
</head>

<body>
    <h1>Registro de Préstamo de Equipo de Cómputo</h1>
    <div class="principal">
        <div>
            <form id="prestamoForm" method="post" action="EquipoComputoP.php">
                <div class="pr">
                <label for="numeroCuenta">Número de Cuenta:</label>
                <input type="text" name="numeroCuenta" required>

                <label for="numeroEquipo">Número de Equipo:</label>
                <input type="number" name="numeroEquipo" required>
                <button type="submit"">Registrar Préstamo</button>
                </div>
               
                <div>
                <h6>HORA INICIO:</h6>
                <label for="">Default <input type="checkbox" id="ck1"></label>
                <div class="visible" id="Hini">
                    <input type="text" name="Hinicio">
                </div>
                <h6>HORA TÉRMINO:</h6>
                <label for="">Default <input type="checkbox" id="ck2"></label>
                <div class="visible" id="Hte">
                    <input type="text" name="Htermino">
                </div>
                </div>
               </form>
        </div>
        <div>
        <?php
        $dao = new DaoPrestamoEquipo();
        $dao->conectar();
        $registros = $dao->LlenarTablaE();
        if ($registros !== null) : ?>
            <table id=" Equipos" class="table1">
                    <thead>
                        <tr>
                            <th>EQUIPO</th>
                            <th>DISPONIBLE</th>
                            <th>CAMBIAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro) : ?>
                            <tr>
                                <td><?= $registro->idcomputadora ?></td>

                                <td><?= $nuevo = $registro->disponible == false ? "NO" : "SI" ?></td>
                                <td>
                                    <?php if ($nuevo == "NO") : ?>
                                        <div>
                                            <button value="<? $registro->idcomputadora ?>">HABILITAR</button>
                                        </div>
                                    <?php else : ?>
                                        <p>NO SE PUEDE HABILITAR</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                <?php else : ?>
                    <p>NO HAY REGISTROS</p>
                <?php endif; ?>
        </div>
    </div>

    <?php
    $dao = new DaoPrestamoEquipo();
    $dao->conectar();
    $registros = $dao->LlenarTablaL();
    if ($registros !== null) : ?>
        <h2>Lista de Préstamos</h2>
        <table id=" prestamosTable">
            <thead>
                <tr>
                    <th>Número de Cuenta</th>
                    <th>Usuario </th>
                    <th>Carrera </th>
                    <th>Número de Equipo</th>
                    <th>Fecha de Préstamo</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Término</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php foreach ($registros as $registro) : ?>
                    <tr>
                        <td><?= $registro->codigo ?></td>
                        <td><?= $registro->nombre ?></td>
                        <td><?= $registro->carrera ?></td>
                        <td><?= $registro->equipo ?></td>
                        <td><?= $registro->fecha_ingreso ?></td>
                        <td><?= $registro->hora_ingreso ?></td>
                        <td><?= $registro->hora_salida ?></td>
                        <td>
                            <div>
                                <button value="<? $registro->codigo?>">ELIMINAR</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>NO HAY REGISTROS</p>
    <?php endif; ?>
<script src="JS/PrestamoCom.js"></script>
</body>

</html>