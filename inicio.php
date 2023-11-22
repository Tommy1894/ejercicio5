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
        .cardimg{
            margin: auto;
            max-width: 100px;
            max-height: 100px;
        }
        .nav-wrapper ul a{
            font-size: 18pt;
        }

        body{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 15pt;
            background:#e0f7fa ;
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
    <nav id="bloc" class="nav-wrapper  red darken-2">
        <a class="brand-logo center">iCar Plus</a>
        <ul id="nav-mobile" class="right">
        <li><a href="inicio.php">Inicio</a></li>
        <li><a href="index.php">Cerrar sesion</a></li>
        </ul>
    </nav>
    <div class="container">
    <h4 class="card-panel red lighten-3 black-text center">Inicio</h4><br>

    <div class="col s12 m6">
    <div class="row">
        <div class="col s12 m6">
            <div class="card card-panel">
                <div class="card-image">
                    <img src="https://cdn-icons-png.flaticon.com/512/686/686348.png" class="cardimg">
                </div>
                <div class="card-content">
                    <span class="card-title center " style="font-weight: bold;">Clientes</span><br>
                    <p class="center">Clientes</p><br>
                    <div class="center">
                    <a href="registrocliente.php" class="waves-effect btn red darken-2">Clientes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card card-panel">
            <div class="card-image">
                    <img src="https://help.fiverr.com/hc/article_attachments/360020049978" class="cardimg">
                </div>
                <div class="card-content">
                    <span class="card-title center" style="font-weight: bold;">Compras</span><br>
                    <p class="center">Compras</p><br>
                    <div class="center">
                    <a href="registro.php" class="waves-effect btn red darken-2">Compras</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col s12 m4">
            <div class="card card-panel">
            <div class="card-image">
                    <img src="https://help.fiverr.com/hc/article_attachments/360020049978" class="cardimg">
                </div>
                <div class="card-content">
                    <span class="card-title center" style="font-weight: bold;">Inventario</span><br>
                    <p class="center">Inventario    </p><br>
                    <div class="center">
                    <a href="registrorepuesto.php" class="waves-effect btn red darken-2">Compras</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card card-panel">
            <div class="card-image">
                    <img src="https://help.fiverr.com/hc/article_attachments/360020049978" class="cardimg">
                </div>
                <div class="card-content">
                    <span class="card-title center" style="font-weight: bold;">Vehiculos</span><br>
                    <p class="center">Vehiculos    </p><br>
                    <div class="center">
                    <a href="registrovehiculo.php" class="waves-effect btn red darken-2">Compras</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card card-panel">
            <div class="card-image">
                    <img src="https://help.fiverr.com/hc/article_attachments/360020049978" class="cardimg">
                </div>
                <div class="card-content">
                    <span class="card-title center" style="font-weight: bold;">Mecanicos</span><br>
                    <p class="center">Mecanicos    </p><br>
                    <div class="center">
                    <a href="registromecanico.php" class="waves-effect btn red darken-2">Compras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </body>
    <br><br>
    <footer class="page-footer red darken-2"><br>
      <div class="container center">
      © 2023 Todos los derechos reservados.
      </div><br>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
    </script>
    </html>