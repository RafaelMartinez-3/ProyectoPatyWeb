<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Visitas.css">
    
</head>

<body>
    <?php
    require_once("../datos/conexion.php");
    require("../vista/menu.php");
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_destroy();
        var_dump("SE CERRO LA SESSION");
     } else {
         session_start();
        // echo "La sesión no está activa.";
     }
    ?>
    <div id="fondo"></div>
</body>

</html>