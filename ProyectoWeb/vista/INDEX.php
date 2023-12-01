<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <?php
      require_once('../datos/conexion.php');
      require_once('ConnexionUtil.php');
    ?>
    <div class="CONTENEDORPR">
         <div id="DIVSIABUC" class="ACTIVO" >
            <form method="post" class="BRAYAN" id="formulario">
                <div class="ENCABEZADO">
                    <img src="IMAGENES/LOGO2.jpg" alt="" id="LOGO2">
                </div>
                <h3>IpServidor:</h3>
                <div>
                    <input type="text" id="txtServidor" value="<?php echo ISSET($_POST["ipServidor"])?$_POST["ipServidor"]:"" ?>">
                </div>
                <h3>Puerto:</h3>
                <div>
                    <input type="text" id="txtPuerto" value="<?php echo ISSET($_POST["puerto"])?$_POST["puerto"]:"" ?>">
                </div>
                <h3>Usuario:</h3>
                <div>
                    <input type="text" id="txtUsusario" value="<?php echo ISSET($_POST["usuario"])?$_POST["usuario"]:"" ?>">
                </div>
                <h3>Contrasena:</h3>
                <div>
                    <input type="text" id="txtcontrasena" value="<?php echo ISSET($_POST["contrasena"])?$_POST["contrasena"]:"" ?>">
                </div>
    
                <div class="botones">
                    <button type="button" onclick="iniciarSesion()" >ACEPTAR</button><button>CANCELAR</button>
                </div>
            </form>
        </div>
    </div>
        
            <script>
                    function iniciarSesion() {
                        var formulario = document.getElementById("formulario");
                        var datos = new FormData(formulario);

                        fetch('../datos/conexion.php', {
                            method: 'POST',
                            body: datos
                            
                        })
                        alert("datos");
                        let usuario=txtUsusario.value;
                        if(usuario=="UsuarioGeneral")
                        {
                            //usuario general
                            //Usuario=UsuarioGeneral
                            //contraseña =root
                            window.location.href = "SalaGeneralLogin.php";
                        }
                        else if(usuario=="UsuarioAuxiliar"){
                            //archivo para el usuario auxiliar
                             //Usuario=UsuarioAuxiliar
                            //contraseña =root
                            window.location.href = "PrincipalAuxiliar.php";
                        }
                        else if(usuario=="posgrest")
                        {
                            //archivo para lo que puede hacer el admin
                             //Usuario=posgrest
                            //contraseña =root
                            window.location.href = "PrincipalAdmin.php";
                        }
                    }
              </script>
     </body>
</html>