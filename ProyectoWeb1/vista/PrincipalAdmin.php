<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title></title>
</head>

<body>
    <?php
    require_once("../datos/conexion.php");
    session_start();
    var_dump($_SESSION["usuario"]);
    ?>
    <div class="MENU">
        <img src="IMAGENES/LOGO.png" alt="" id="LOGO1">
        <ul>
            <li><button id="pec">Prestamos de Equipo de computo</button></li>
            <li><button id="psa">Prestamos de sala audiovisual</button></li>
            <li><button id="pcg">prestamo del cubiculo general</button></li>
            <li><button id="vg">visitas guiadas</button></li>
            <li><button id="cus">Consulta de uso de servicios</button></li>
        </ul>
    </div>
    <script>
        var pec = document.getElementById("pec");
        var psa = document.getElementById("psa");
        var pcg = document.getElementById("pcg");
        var vg = document.getElementById("vg");
        var cus = document.getElementById("cus");
        pec.addEventListener('click', function() {
            window.location.href = "PrestamoEquipoComputo.php";
        });
        psa.addEventListener('click', function() {
            window.location.href = "PrestamoSalaAudiovisual.php";
        });
        pcg.addEventListener('click', function() {
            window.location.href = "PrestamoCubiculoGeneral.php";
        });
        vg.addEventListener('click', function() {
            window.location.href = "VisitasGuiadas.php";
        });
        cus.addEventListener('click', function() {
            window.location.href = "reportes.php";
        });
    </script>
</body>

</html>