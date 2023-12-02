<?php 
    $valServidor=$valPuerto=$valUsuario=$valContrasena="";
    //Cuando post no trae datos asumimos que la operación es agregar
    if(count($_POST)>0){
        $valServidor=$valPuerto=$valUsuario=$valContrasena="is-invalid";
        $valido=true;
        if(ISSET($_POST["ipServidor"]) && 
          (strlen(trim($_POST["Nombre"]))>3 && strlen(trim($_POST["Nombre"]))<51)){
            $valNombre="is-valid";
        }else{
            $valido=false;
        }
        if(ISSET($_POST["puerto"]) && 
          (strlen(trim($_POST["puerto"]))>3 && strlen(trim($_POST["Apellido1"]))<5)){
            $valApe1="is-valid";
        }else{
            $valido=false;
        }
        if(ISSET($_POST["usuario"]) && 
          (strlen(trim($_POST["usuario"]))>3 && strlen(trim($_POST["usuario"]))<51)){
            $valApe2="is-valid";
        }else{
            $valido=false;
        }
        if(ISSET($_POST["contrasena"]) && 
          (strlen(trim($_POST["contrasena"]))>=6 && strlen(trim($_POST["contrasena"]))<16)){
            $valPassword="is-valid";
        }else{
            $valido=false;
        }
       
        if($valido){
            //Guardar 
            //Crear un modelo Usuario con todos los datos
            $obj = new Conexion();
            $obj->ipServidor=trim($_POST["ipServidor"]);
            $obj->puerto=trim($_POST["puerto"]);
            $obj->usuario=trim($_POST["usuario"]);
            $obj->contrasena=trim($_POST["contrasena"]);
            
            $conect = new conexion();
            $conect->conectar();
            
        }

      }
?>