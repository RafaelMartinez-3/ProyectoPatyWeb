<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <form>
        <div id="DivLogin" class="DIV-INACTIVO">
            <form action="" class="">
                <img src="IMAGENES/cortada.jpeg" class="col-md-4 align-items-center" />
                <div class="col-md-4 align-items-center" id="caja">
                    <label for="Usuario">
                        NoControl
                    </label>
                    <input type="text" class="form-control" id="Usuario" required />
                    <div class="col-auto">
                        <button class="btn btn-success" onclick="Agregar()>
                            Aceptar
                        </button>
                        <button class="btn btn-danger" onclick="volverAlInicio()">
                            volver
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </form>
              <script>
                    function volverAlInicio() {
                         window.location.href = "INDEX.php";
                    }
              </script>
</body>
</html>