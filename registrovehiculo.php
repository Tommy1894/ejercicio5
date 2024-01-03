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
        <h4 class="card-panel red lighten-3 black-text center">Registros de Vehiculos</h4><br>

        
        <form enctype="multipart/form-data" id="formulario" class="col s12">
            <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="Matricula" name="txtMatricula"><br>
                        <label for="Matricula">Matricula</label><br>
                        
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="Marca" name="txtMarca" required><br>
                        <label for="Marca">Marca</label><br>
                    </div>
            </div>
            
            
            <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="Modelo" name="txtModelo" required><br>
                        <label for="Modelo">Modelo</label><br>
                    </div>
                    <div class="input-field col s6">
                        
                            <select name="txtTipo" id="Tipo" required>
                                <option value="" disabled selected>Escoge una opcion</option>   
                                <option value="Sedan">Sedan</option>
                                <option value="Coupe">Coupe</option>
                                <option value="SUV">SUV</option>
                                <option value="Convertible">Convertible</option>
                                <option value="Hatchback">Hatchback</option>
                                <option value="Pick up">Pick up</option>
                                <option value="Crossover">Crossover</option>
                            </select>
                            <label>Tipo</label><br>
                    </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="Ano" name="txtAno"><br>
                    <label for="Ano">Año</label><br>
                    
                </div>
                <div class="input-field col s6">
                    <select name="txtClasificacion" id="Clasificacion" required>
                        <option value="" disabled selected>Escoge una opcion</option>   
                        <option value="Segmento micro">Segmento micro</option>
                        <option value="Segmento A">Segmento A</option>
                        <option value="Segmento B">Segmento B</option>
                        <option value="Segmento C">Segmento C</option>
                        <option value="Segmento D">Segmento D</option>
                        <option value="Segmento E">Segmento E</option>
                        <option value="Segmento F">Segmento F</option>
                        <option value="Segmento J">Segmento J</option>
                        <option value="Segmento M">Segmento M</option>
                        <option value="Segmento S">Segmento S</option>
                    </select>
                    <label>Clasificacion</label><br>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="Descripcion" name="txtDescripcion"><br>
                    <label for="Descripcion">Descripcion</label><br>
                    
                </div>
                <div class="input-field col s6">
                    <input type="text" id="Cedula" name="txtCedula"><br>
                    <label for="Cedula">Cedula del dueño</label><br>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="file-field input-field s12">
                <div class="btn">
                    <span>File</span>
                    <input name="archivo" id="archivo" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                </div>
            </div>
        
        </form>
        <div class='center-align'>
            <button type="button" id='btn-reg-bot' class="btn waves-effect waves-light red darken-2" onclick="registrar_vehi()" name="subir">Registrar</button>
            <a href="inicio.php"><button type="button" id='btn-reg-bot' class="btn waves-effect waves-light red darken-2">Regresar</button></a>
        </div><br><br>
        <h5 id="resultado" class="center-align"></h5><br>
        <div class="right">
            <a href="fpdf\reportevehiculo.php" target="_blank"><i class="material-icons left">description</i>Imprimir Reporte</a>
        </div><br>
        <h4 class="card-panel red lighten-3 black-text center">Historial de Vehiculos</h4><br>
        </div>
        <table class='striped centered'>
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Año</th>
                <th>Clasificacion</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Cedula Del Dueño</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        
        <tbody id='tablaregistro'>
        </tbody>
        </table>
    

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
    <script>listarvehiculo()</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, );
  });
    </script>
    </html>

