<?php
require_once("../datos/conexion.php");
require_once("../datos/DaoPrestamoSala.php");
require_once("../modelos/PrestamoSala.php");
//require_once("../modelos/PrestamoEquipo.php");
date_default_timezone_set('America/Mexico_City');

if (session_status() === PHP_SESSION_ACTIVE) {
    // La sesión está activa
    // echo "La sesión está activa.";
} else {
    session_start();
}
if (
    isset($_POST['numeroCuenta']) && isset($_POST['numUsuariosHombres'])
    && isset($_POST['numUsuariosMujeres']) && isset($_POST['Opciones'])
) {
    $numeroCuenta = $_POST['numeroCuenta'];
    $dao = new DaoPrestamoSala();
    $OBJTSALA = new PrestamoSala();
    $dao->conectar();
    $Lugar = $_POST['Opciones'];
    $Hini = null;
    $Hte = null;
    if (isset($_POST['Hini'])) {
        $Hini = $_POST['Hini'];
    }
    if (isset($_POST['Hte'])) {
        $Hte = $_POST['Hte'];
    }
    if ($dao->obtenerEspacio($Lugar)) //SI EL EQUIPO ESTA DISPONIBLE
    {
        if ($dao->obtenerpersona($numeroCuenta) !== null) {
            $P = $dao->obtenerpersona($_POST['numeroCuenta']);
            $OBJTSALA->codigo = $P[0];
            $OBJTSALA->nombre = $P[1];
            $OBJTSALA->carrera =  $dao->obtenerCarrera($P[2]);
            $OBJTSALA->Hombres = $Hombres = $_POST['numUsuariosHombres'];
            $OBJTSALA->Mujeres = $Mujeres = $_POST['numUsuariosMujeres'];
            $OBJTSALA->fecha_ingreso = date("Y-m-d");
            $OBJTSALA->hora_ingreso = $Hini == null ? date('H:i:s') : $Hini;
            $horaActual = new DateTime();
            $horaActual->add(new DateInterval('PT2H'));
            $OBJTSALA->hora_salida = $Hte == null ? $horaActual->format('H:i:s') : $Hte;
            var_dump($OBJTSALA);
            if ($dao->insertarPrestamoSala($OBJTSALA)) {
                echo "SE INSERTO";
            } else
                echo "NO SE INSERTO";
        } else {
            echo ("USUARIO NO ENCONTRADO");
        }
    } else {
        echo ("El equipo esta ocupado");
    }
} else {
    echo 'Falta uno o más campos en la solicitud POST.';
}
