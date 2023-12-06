<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Visitas.css">
    <title>SALA GENERAL</title>
    <style>
        #contenedor {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="fondo"></div>
    <div id="contenedor">
        <form method="POST" action="../datos/DaoGeneral.php" class="text-center">
            <div id="DivLogin" class="DIV-INACTIVO">
            <div class="ENCABEZADO">
                    <img src="IMAGENES/LOGO2.png" alt="" id="LOGO2">
                </div>
            <div class="" id="caja">
                    <h3 for="Usuario" style="color: white;">
                        No. Control
                    </h3>
                    <input type="text" class="form-control" id="Usuario" name="numcontrol" />
                    <div class="row justify-content-center">
                    <button class="btn btn-primary col-4 mx-2" type="submit">ACEPTAR</button>
                    <button type="button" id="btnVolver" class="btn btn-secondary col-4 mx-2">CANCELAR</button>
                </div>
                </div>
            </div>
        </form>
    </div>
    
    <script>
        document.getElementById("btnVolver").addEventListener('click', e => {
            e.preventDefault();
            window.location.href = "INDEX.html";
        });
    </script>
</body>
</html>