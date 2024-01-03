<?php
    require_once("assets/php/conexion.php");

    $matricula=$_GET["matricula"];
    $query="SELECT * FROM concesio_vehiculo where matricula='$matricula'";
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
                        <input type="text" id="Matricula" name="txtMatricula" value='<?php echo $row['matricula']?>' disabled><br>
                        <label for="Matricula">Matricula</label><br>
                        
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="Marca" name="txtMarca" value='<?php echo $row['marca']?>' required><br>
                        <label for="Marca">Marca</label><br>
                    </div>
            </div>
            
            
            <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="Modelo" name="txtModelo" value='<?php echo $row['modelo']?>'required><br>
                        <label for="Modelo">Modelo</label><br>
                    </div>
                    <div class="input-field col s6">
                        
                            <select name="txtTipo" id="Tipo" required>
                                <option value="" disabled selected>Escoge una opcion</option>   
                                <option value="Sedan" <?php if($row['tipo']=='Sedan'){echo "selected";}?>>Sedan</option>
                                <option value="Coupe" <?php if($row['tipo']=='Coupe'){echo "selected";}?>>Coupe</option>
                                <option value="SUV" <?php if($row['tipo']=='SUV'){echo "selected";}?>>SUV</option>
                                <option value="Convertible" <?php if($row['tipo']=='Convertible'){echo "selected";}?>>Convertible</option>
                                <option value="Hatchback" <?php if($row['tipo']=='Hatchback'){echo "selected";}?>>Hatchback</option>
                                <option value="Pick up" <?php if($row['tipo']=='Pick up'){echo "selected";}?>>Pick up</option>
                                <option value="Crossover" <?php if($row['tipo']=='Crossover'){echo "selected";}?>>Crossover</option>
                            </select>
                            <label>Tipo</label><br>
                    </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="Ano" name="txtAno" value='<?php echo $row['ano']?>'><br>
                    <label for="Ano">Año</label><br>
                    
                </div>
                <div class="input-field col s6">
                    <select name="txtClasificacion" id="Clasificacion" required>
                        <option value="" disabled selected>Escoge una opcion</option>   
                        <option value="Segmento micro" <?php if($row['clasificacion']=='Segmento micro'){echo "selected";}?>>Segmento micro</option>
                        <option value="Segmento A" <?php if($row['clasificacion']=='Segmento A'){echo "selected";}?>>Segmento A</option>
                        <option value="Segmento B" <?php if($row['clasificacion']=='Segmento B'){echo "selected";}?>>Segmento B</option>
                        <option value="Segmento C" <?php if($row['clasificacion']=='Segmento C'){echo "selected";}?>>Segmento C</option>
                        <option value="Segmento D" <?php if($row['clasificacion']=='Segmento D'){echo "selected";}?>>Segmento D</option>
                        <option value="Segmento E" <?php if($row['clasificacion']=='Segmento E'){echo "selected";}?>>Segmento E</option>
                        <option value="Segmento F" <?php if($row['clasificacion']=='Segmento F'){echo "selected";}?>>Segmento F</option>
                        <option value="Segmento J" <?php if($row['clasificacion']=='Segmento J'){echo "selected";}?>>Segmento J</option>
                        <option value="Segmento M" <?php if($row['clasificacion']=='Segmento M'){echo "selected";}?>>Segmento M</option>
                        <option value="Segmento S" <?php if($row['clasificacion']=='Segmento S'){echo "selected";}?>>Segmento S</option>
                    </select>
                    <label>Clasificacion</label><br>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="Descripcion" name="txtDescripcion" value='<?php echo $row['descripcion']?>'><br>
                    <label for="Descripcion">Descripcion</label><br>
                    
                </div>
                <div class="input-field col s6">
                    <input type="text" id="Cedula" name="txtCedula" value='<?php echo $row['ced_cliente']?>' disabled><br>
                    <label for="Cedula">Cedula del dueño</label><br>
                    
                </div>
            </div>
        
        </form>
    <div class='center-align'>
            <button type="button" id='btn-reg-bot' class="btn waves-effect waves-light red darken-2" onclick=modificar_vehi()>Modificar</button>
            <a href="registrovehiculo.php"><button type="button" id='btn-reg-bot' class="btn waves-effect waves-light red darken-2">Regresar</button></a>
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