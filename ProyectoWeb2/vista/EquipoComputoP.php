<?php
require_once("../datos/conexion.php");
require_once("../datos/DaoPrestamoEquipo.php");
require_once("../modelos/PrestamoEquipo.php");
date_default_timezone_set('America/Mexico_City');

if (session_status() === PHP_SESSION_ACTIVE) {
    // La sesión está activa
    // echo "La sesión está activa.";
} else {
    session_start();
}
if (isset($_POST['numeroCuenta']) && isset($_POST['numeroEquipo'])) {
    $numeroCuenta = $_POST['numeroCuenta'];
    $numeroEquipo = $_POST['numeroEquipo'];
    $Hini=null;
    $Hte =null;
    if (isset($_POST['Hinicio'])){
        $Hini = $_POST['Hinicio'] ;
        //var_dump($Hini);
    }
    if (isset($_POST['Htermino'])) {
        $Hte = $_POST['Htermino'];
    }
    $dao = new DaoPrestamoEquipo();
    $dao->conectar();
    if ($dao->obtenerComputadora($numeroEquipo)) //SI EL EQUIPO ESTA DISPONIBLE
    {
        $OBJETO = new PrestamoEquipo();
        if ($dao->obtenerpersona($numeroCuenta) !== null) {
            $R = $dao->obtenerpersona($numeroCuenta);
            $OBJETO->codigo = $R[0];
            $OBJETO->nombre = $R[1];
            $OBJETO->carrera = $dao->obtenerCarrera($R[2]);
            $OBJETO->equipo = $numeroEquipo;
            $OBJETO->fecha_ingreso = date("Y-m-d");
            $OBJETO->hora_ingreso = $Hini==null? date('H:i:s'):$Hini;
            $horaActual = new DateTime();
            $horaActual->add(new DateInterval('PT2H'));
            $OBJETO->hora_salida = $Hte==null?$horaActual->format('H:i:s'):$Hte;
            var_dump($OBJETO);
            if ($dao->insertarEstudiante($OBJETO)) {
                header("Location: PrestamoEquipoComputo.php");
            } else {
            }
        } else {
            echo ("USUARIO NO ENCONTRADO");
        }
    } else {
        echo ("El equipo esta ocupado");
    }
} else {
    echo 'Falta uno o más campos en la solicitud POST.';
}
