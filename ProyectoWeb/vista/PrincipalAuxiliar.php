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
            <li><button id="pec">Prestamos de Equipo de computo</button></li>
            <li><button id="psa">Prestamos de sala audiovisual</button></li>
            <li><button id="pcg">prestamo del cubiculo general</button></li>
            <li><button id="vg">visitas guiadas</button></li>
        </ul>
    </div>
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