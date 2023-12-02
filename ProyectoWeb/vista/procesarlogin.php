<?php
require_once("../datos/conexion.php");

// Revisar que lleguen los datos
if (isset($_POST["server"]) && isset($_POST["puerto"]) && isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {

    // Revisar en BD que esten correctas
    $dao = new Conexion($_POST["server"], $_POST["puerto"], $_POST["usuario"], $_POST["contrasenia"]);
   // $conexion = $dao->conectar();

    if ($dao !== false) {
        session_start();
        $usuario = $_POST["usuario"];

        if ($usuario == "usuariogeneral") {
            // usuario general
            header("Location: SalaGeneralLogin.php");
            exit;
        } else if ($usuario == "usuarioauxiliar") {
            // archivo para el usuario auxiliar
            header("Location: PrincipalAuxiliar.php");
             exit;
        } else if ($usuario == "postgres") {
            // archivo para lo que puede hacer el admin
            header("Location: PrincipalAdmin.php");
             exit;
        }

        // Borra una clave
        //unset($_SESSION["mensajes"]);
        //return;
    }
    header("Location: index.html");
}

header("Location: index.html");
?>
