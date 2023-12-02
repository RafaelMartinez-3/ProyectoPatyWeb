<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
        <div class="MENU">
        <img src="IMAGENES/LOGO.png" alt="" id="LOGO1">
        <ul>
            <li><button id="racd">Reportes por area carrera desglosado </button></li>
            <li><button id="racc">Reportes por area carrera concetrado </button></li>
            <li><button id="ras">Reportes por area y servicio </button></li>
            <li><button id="raec">Reportes por area escuela concentrado </button></li>
            <li><button id="rg">Reporte general</button></li>
            <li><button id="rgc">Reporte general concentrado</button></li>
        </ul>
    </div>
    <script>
            var racd=document.getElementById("racd");
            var racc=document.getElementById("racc");
            var ras=document.getElementById("ras");
            var raec=document.getElementById("raec");
            var rg=document.getElementById("rg");
            var rgc=document.getElementById("rgc");
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
    </script>
</body>
</html>