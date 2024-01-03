<?php
    require_once("assets/php/conexion.php");
    date_default_timezone_set('America/Caracas');
    $id=$_GET["id"];
    $query="SELECT concesio_registro.id as id, concesio_registro.fecha_stamp as fecha, concesio_registro.matricula as matricula, concesio_vehiculo.modelo as modelo,concesio_vehiculo.marca as marca,concesio_vehiculo.tipo as tipo,concesio_vehiculo.imagen as imgvehi, concesio_cliente.cedula as cedcliente, concesio_cliente.nombre as cliente, concesio_cliente.sexo as sexo,concesio_registro.serial as serial, concesio_repuesto.nombre as repuesto,concesio_repuesto.cantidad as cantidad,concesio_repuesto.imagen as imgrep, ced_meca,concesio_mecanico.nombre as mecanico,concesio_mecanico.sexo as sexmeca FROM concesio_registro inner join concesio_vehiculo on concesio_vehiculo.matricula=concesio_registro.matricula inner JOIN concesio_repuesto on concesio_repuesto.serial=concesio_registro.serial inner join concesio_mecanico on concesio_mecanico.cedula=concesio_registro.ced_meca inner join concesio_cliente on concesio_cliente.cedula=concesio_vehiculo.ced_cliente where id='$id'";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
    $row= mysqli_fetch_array($rs);
    if($row['sexo']=="M"){
        $sexo="Masculino";
    }
    else{
        $sexo="Femenino";
    }
    if($row['sexmeca']=="M"){
        $sexo2="Masculino";
    }
    else{
        $sexo2="Femenino";
    }
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
    <h4 class="card-panel red lighten-3 black-text center">Registro de Reparacion</h4><br>
    <table class='striped centered'>
        <thead>
            <tr>
                <th>ID</th>
                <th><?php echo $row['id']?></th>
            </tr>
        </thead>
        
        <tbody id='tablaregistro'>
            <tr>
                <td>Fecha de Registro</td>
                <td><?php  $fecha=date('d-m-Y H:i:s',$row['fecha']);
                echo $fecha?></td>
            </tr>
            <tr>
                <td>Matricula</td>
                <td><?php echo $row['matricula']?></td>
            </tr>
            <tr>
                <td>Modelo</td>
                <td><?php echo $row['modelo']?></td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td><?php echo $row['tipo']?></td>
            </tr>
            <tr>
                <td>Imagen del Vehiculo</td>
                <td><img src="img_vehi/<?php echo $row['imgvehi']?>" alt="" width="200px" height="200px"></td>
            </tr>
            <tr>
                <td>Cedula del Cliente</td>
                <td><?php echo $row['cedcliente']?></td>
            </tr>
            <tr>
                <td>Nombre del Cliente</td>
                <td><?php echo $row['cliente']?></td>
            </tr>
            <tr>
                <td>Sexo del Cliente</td>
                <td><?php echo $sexo?></td>
            </tr>
            <tr>
                <td>Serial del Repuesto</td>
                <td><?php echo $row['serial']?></td>
            </tr>
            <tr>
                <td>Nombre del Repuesto</td>
                <td><?php echo $row['repuesto']?></td>
            </tr>
            <tr>
                <td>Cantidad de Repuestos usados</td>
                <td><?php echo $row['cantidad']?></td>
            </tr>
            <tr>
                <td>Imagen del Repuesto</td>
                <td><img src="img_repue/<?php echo $row['imgrep']?>" alt="" width="200px" height="200px"></td>
            </tr>
            <tr>
                <td>Cedula del Mecanico</td>
                <td><?php echo $row['ced_meca']?></td>
            </tr>
            <tr>
                <td>Nombre del Mecanico</td>
                <td><?php echo $row['mecanico']?></td>
            </tr>
            <tr>
                <td>Sexo del Mecanico</td>
                <td><?php echo $sexo2?></td>
            </tr>
        </tbody>
        </table>
        <br><br><br>
    <div class='center-align'>
            
            <a href="registro.php"><button type="button" id='btn-reg-bot' class="btn waves-effect waves-light red darken-2">Regresar</button></a>
        </div><br><br>
        
        
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