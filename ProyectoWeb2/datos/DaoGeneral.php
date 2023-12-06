 <?php
        require_once("conexion.php");
        if (session_status() === PHP_SESSION_ACTIVE) {
        } else {
            session_start();
        }
        if (isset($_POST['numcontrol'])) {
            $numcontrol=$_POST['numcontrol'];
            $Con = new Conexion($_SESSION["usuario"], $_SESSION["contrasenia"]);
            var_dump($_SESSION["usuario"]);
            $Haycon = $Con::obtenerConexion();

            if ($Haycon != null) {
                echo "CONECTO";
                $sentenciaSQL = $Haycon->prepare("INSERT INTO saci.salageneral (no_cuenta, nombre, carrera, genero, fecha_registro, hora_registro)
SELECT no_cuenta, nombre, idcarrera, genero, CURRENT_DATE,   CURRENT_TIME  FROM catalogos.usuarios where catalogos.usuarios.no_cuenta=? ; ");
                $sentenciaSQL->execute([$numcontrol]);
                //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
                $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
                header("Location: ../vista/SalaGeneralLogin.php");
            }
        } else {
            echo 'Falta uno o mas campos en la solicitud POST.';
        }
      ?>