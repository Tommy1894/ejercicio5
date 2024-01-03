<?php
    require_once("assets/php/conexion.php");

    $serial=$_GET["serial"];
    $query="SELECT * FROM concesio_repuesto where serial='$serial'";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
    $row= mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCar Plus</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        
        .nav-wrapper ul a{
            font-size: 18pt;
        }

        body{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 15pt;
           
        }
        .input-field label {
            font-size: 14pt;
        }
        label {
            font-size: 12pt;
        }
        button{
            margin-left: 3%;
            margin-right: 3%;
        }
    </style>
</head>
<body>
    <nav id="bloc" class="nav-wrapper red darken-2">
        <a class="brand-logo center">iCar Plus</a>
        <ul id="nav-mobile" class="right">
        <li><a href="inicio.php">Inicio</a></li>
        <li><a href="index.php">Cerrar sesion</a></li>
        </ul>
    </nav>
    <div class="container">
    <h4 class="card-panel red lighten-3 black-text center">Modificacion de Vehiculo</h4><br>

    <form id="formulario" class="col s12">
    <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="Serial" name="txtSerial" value='<?php echo $row['serial']?>' disabled><br>
                    <label for="Serial">Serial</label><br>
                    
                </div>
                <div class="input-field col s6">
                    <input type="text" id="Nombre" name="txtNombre" value='<?php echo $row['nombre']?>' required><br>
                    <label for="Nombre">Nombre</label><br>
                </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input type="text" id="Cantidad" name="txtCantidad" value='<?php echo $row['cantidad']?>' required><br>
                <label for="Cantidad">Cantidad</label><br>
            </div>
            <div class="input-field col s6">
                <input type="text" id="Marca" name="txtMarca" value='<?php echo $row['marca']?>' required><br>
                <label for="Marca">Marca</label><br>
            </div>
        </div>        
        </form>
    <div class='center-align'>
            <button type="button" id='btn-reg-bot' class="btn waves-effect waves-light red darken-2" onclick=modificar_repue()>Modificar</button>
            <a href="registrorepuesto.php"><button type="button" id='btn-reg-bot' class="btn waves-effect waves-light red darken-2">Regresar</button></a>
        </div><br><br>
        <h5 id="resultado" class="center-align"></h5><br>
    </div>
    </body>
    <br><br>
    <footer class="page-footer red darken-2"><br>
      <div class="container center">
      © 2023 Todos los derechos reservados.
      </div><br>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, );
  });
    </script>
    </html>