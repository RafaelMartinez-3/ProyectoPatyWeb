<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Visitas.css">
    <title></title>
</head>
<body>
<?php
    require_once("../datos/conexion.php");
    session_start();    
    ?>
        <div class="MENU">
        <img src="IMAGENES/cortada.jpeg" alt="" id="LOGO1">
        <ul>
            <li><button type="button" class="btn btn-primary" id="pec">Prestamos de Equipo de computo</button></li>
            <li><button type="button" class="btn btn-secondary" id="psa">Prestamos de sala audiovisual</button></li>
            <li><button type="button" class="btn btn-success" id="pcg">prestamo del cubiculo general</button></li>
            <li><button type="button" class="btn btn-info" id="vg">visitas guiadas</button></li>
        </ul>
    </div>
    <div id="fondo"></div>
    <script>
            var pec=document.getElementById("pec");
            var psa=document.getElementById("psa");
            var pcg=document.getElementById("pcg");
            var vg=document.getElementById("vg");
            pec.addEventListener('click', function(){
                window.location.href = "PrestamoEquipoComputo.php";
            });
            psa.addEventListener('click', function(){
                window.location.href = "PrestamoSalaAudiovisual.php";
            });
            pcg.addEventListener('click', function(){
                window.location.href = "PrestamoCubiculoGeneral.php";
            });
            vg.addEventListener('click', function(){
                 window.location.href = "VisitasGuiadas.php";
            });

    </script>
</body>
</html>