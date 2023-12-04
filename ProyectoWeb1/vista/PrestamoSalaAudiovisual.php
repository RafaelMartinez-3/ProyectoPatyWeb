<?php
require_once("../datos/conexion.php");
require_once("../datos/DaoPrestamoSala.php");
require_once('Menu.php');
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
    <title>Registro de Préstamo de Sala Audiovisual</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/SalaAudiovisual.css">

</head>

<body>

    <h1>Registro de Prestamo de Sala Audiovisual</h1>

    <form id="prestamoForm" method="post" action="SalaAudiovisual.php">
        <div class="prin">
            <div>
                <label for="numeroCuenta">Número de Cuenta:</label>
                <input type="text" id="numeroCuenta" name="numeroCuenta" required>

            </div>
            <div>
                <?php
                $dao = new DaoPrestamoSala();
                $dao->conectar();
                $Opciones = $dao->LlenarEspacios();
                if ($Opciones !== null) : ?>
                    <label for="SOpcion">ESPACIO</label>
                    <select name="Opciones" id="SOpcion">
                        <?php foreach ($Opciones as $registro) : ?>
                            <option value="<?= $registro->numero ?>">
                                <?= $registro->descripcion ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                <?php else : ?>
                    <p>NO HAY REGISTROS</p>
                <?php endif; ?>
            </div>

        </div>

        <label for="numUsuariosHombres">Número de Usuarios Hombres:</label>
        <input type="number" id="numUsuariosHombres" name="numUsuariosHombres" required>

        <label for="numUsuariosMujeres">Número de Usuarios Mujeres:</label>
        <input type="number" id="numUsuariosMujeres" name="numUsuariosMujeres" required>

        <label for="horaInicio">Hora de Inicio (sugerida por el sistema):
            <input type="checkbox" id="ck1">
        </label>
        <div id="Hini" class="visible">
            <input type="text" id="horaInicio" name="Hini">
        </div>
        <label for="horaFin">Hora Fin (sugerida por el sistema):
            <input type="checkbox" id="ck2">
        </label>
        <div  id="Hte" class="visible">
            <input type="text" id="horaFin" name="Hte">
        </div>
        <button type="submit">Registrar Préstamo </button>
    </form>

    <h2>Lista de Préstamos</h2>
    <?php
    $dao = new DaoPrestamoSala();
    $dao->conectar();
    $registros = $dao->LlenarTablaL();
    if ($registros !== null) : ?>
        <table id="prestamosTable">
            <thead>
                <tr>
                    <th>Cuenta</th>
                    <th>Usuario</th>
                    <th>Carrera</th>
                    <th>Hombres</th>
                    <th>Mujeres</th>
                    <th>Fecha de Préstamo</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Termino</th>
                </tr>
            </thead>
            <tbody><?php foreach ($registros as $registro) : ?>
                    <tr>
                        <th><?= $registro->numero_cuenta ?></th>
                        <th><?= $registro->usuario_responsable ?></th>
                        <th><?= $registro->carrera ?></th>
                        <th><?= $registro->numero_hombres ?></th>
                        <th><?= $registro->numero_mujeres ?></th>
                        <th><?= $registro->fecha_prestamo ?></th>
                        <th><?= $registro->hora_inicio ?></th>
                        <th><?= $registro->hora_termino ?></th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>NO HAY REGISTROS QUE MOSTRAR</p>
    <?php endif; ?>
    <script src="JS/PrestamoSala.js"></script>
</body>

</html>