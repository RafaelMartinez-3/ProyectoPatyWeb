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
    <div id="fondo"></div>
    <div class="MENU">
        <img src="IMAGENES/LOGO.png" alt="" id="LOGO1">
        <ul>
            <li><button id="racd">Reportes por area carrera desglosado </button></li>
            <li><button id="racc">Reportes por area carrera concetrado </button></li>
            <li><button id="ras">Reportes por area y servicio </button></li>
            <li><button id="raec">Reportes por area escuela concentrado </button></li>
            <li><button id="rg">Reporte general</button></li>
            <li><button id="rgc">Reporte general concentrado</button></li>
            <li><button id="rv">Reporte visitas guiadas</button></li>
        </ul>
    </div>
    <script>
            var racd=document.getElementById("racd");
            var racc=document.getElementById("racc");
            var ras=document.getElementById("ras");
            var raec=document.getElementById("raec");
            var rg=document.getElementById("rg");
            var rgc=document.getElementById("rgc");
            var rvg=document.getElementById("rv");
            racd.addEventListener('click', function(){
                window.location.href = "Reportesporareacarreradesglosado.php";
            });
            racc.addEventListener('click', function(){
                window.location.href = "Reportesporareacarreraconcetrado.php";
            });
            ras.addEventListener('click', function(){
                window.location.href = "Reportesporareayservicio.php";
            });
            raec.addEventListener('click', function(){
                 window.location.href = "Reportesporareaescuelaconcentrado.php";
            });
            rg.addEventListener('click', function(){
                 window.location.href = "Reportegeneral.php";
            });
            rgc.addEventListener('click', function(){
                 window.location.href = "Reportegeneralconcentrado.php";
            });
            rvg.addEventListener('click', function(){
                 window.location.href = "ReporteVisitasGuiadas.php";
            });
    </script>
</body>
</html>