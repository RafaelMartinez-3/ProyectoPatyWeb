<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['numeroCuenta']) && isset($_POST['usuarioCarrera']) && isset($_POST['numeroEquipo'])) {

        $numeroCuenta = $_POST['numeroCuenta'];
        $usuarioCarrera = $_POST['usuarioCarrera'];
        $numeroEquipo = $_POST['numeroEquipo'];  
    } else {
        echo 'Falta uno o más campos en la solicitud POST.';
    }
}
