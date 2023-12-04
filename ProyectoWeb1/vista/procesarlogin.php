<?php
require_once("../datos/conexion.php");
// Revisar que lleguen los datos
 //isset($_POST["server"]) && isset($_POST["puerto"]) && 
if (isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {
    // Revisar en BD que esten correctas
  
    $Hayconexion = new Conexion($_POST["usuario"], $_POST["contrasenia"]);
    $con= $Hayconexion::obtenerConexion();

    if ($con!=null) {
        
        $usuario = $_SESSION['usuario'];

        if ($usuario == "general") {
            // usuario general
            header("Location: SalaGeneralLogin.php");
            exit;
        } else if ($usuario == "auxiliar") {
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
}else{
    echo("NO HAY VALORES");
}

header("Location: index.html");
?>