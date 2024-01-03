function inicio(){
    console.log('holi');
    var usuario = document.getElementById('usuario').value;
    var contrasena = document.getElementById('contrasena').value;

    var datos = {
    "usuario": usuario,
    "contrasena": contrasena
};
$.ajax({
    url: "assets/php/iniciosesion.php",
    type: "post",
    data: datos,
    // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
    success: function(response) {
        console.log(response);
        if(response=='listo'){
            location.replace("inicio.php");
        }
        else{
            $("#resultado").html("Error, intente de nuevo");
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
}
    });
}

function registrar_clie(){
    console.log('holi');
    var cedula = document.getElementById('Cedula').value;
    var nombre = document.getElementById('Nombre').value;
    var apellido = document.getElementById('Apellido').value;
    var edad = document.getElementById('Edad').value;
    var sexo = document.getElementById('Sexo').value;
    var datos = {
    "cedula": cedula,
    "nombre": nombre,
    "apellido": apellido,
    "edad": edad,
    "sexo": sexo
    };
    if (cedula === "" || nombre === "" || apellido === "" || edad === "" || sexo === ""){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/agregarcliente.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se registro el cliente correctamente");
                listarcliente();
            }
            else{
                $("#resultado").html("El cliente ya existe");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
}
function modificar_clie(){
    console.log('holi');
    var cedula = document.getElementById('Cedula').value;
    var nombre = document.getElementById('Nombre').value;
    var apellido = document.getElementById('Apellido').value;
    var edad = document.getElementById('Edad').value;
    var sexo = document.getElementById('Sexo').value;
    var datos = {
    "cedula": cedula,
    "nombre": nombre,
    "apellido": apellido,
    "edad": edad,
    "sexo": sexo
    };
    if (nombre === "" || apellido === "" || edad === "" || sexo === "" ){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/modificarcliente.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se modifico el cliente correctamente");
            }
            else{
                $("#resultado").html("No se pudo modificar el cliente");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
}
function listarcliente(){
    $.ajax({
        url: 'assets/php/listacliente.php',
        type: 'GET',
        success: function(response) {
          const registros = JSON.parse(response);
          let template = '';
          registros.forEach(registro => {
            template += `
                    <tr>
                    <td>${registro.cedula}</td>
                    <td>${registro.nombre}</td>
                    <td>${registro.apellido}</td>
                    <td>${registro.edad}</td>
                    <td>${registro.sexo}</td>
                    <td><a href='modificarcliente.php?cedula=${registro.cedula}'><button class='waves-effect deep-orange lighten-2 black-text btn'>Modificar</button></a></td>
                    <td><button class='waves-effect red lighten-2 black-text btn' onclick='borrarcliente("${registro.cedula}")'>Borrar</button></td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}

function borrarcliente(cedula){

    $.ajax({
    url: "assets/php/borrarcliente.php",
    type: "post",
    data: {cedula:cedula},
    // beforeSend: function() {
    // $("#resultado").html("Procesando, espere por favor...");
    // },
    success: function(response) {
        $("#resultado").html("Se borro el cliente correctamente");
        listarcliente(); 
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
    }
    });
    
}
function registrar_meca(){
    console.log('holi');
    var cedula = document.getElementById('Cedula').value;
    var nombre = document.getElementById('Nombre').value;
    var apellido = document.getElementById('Apellido').value;
    var edad = document.getElementById('Edad').value;
    var sexo = document.getElementById('Sexo').value;
    var especialidad = document.getElementById('Especialidad').value;
    var datos = {
    "cedula": cedula,
    "nombre": nombre,
    "apellido": apellido,
    "edad": edad,
    "sexo": sexo,
    "especialidad":especialidad
    };
    if (cedula === "" || nombre === "" || apellido === "" || edad === "" || sexo === "" ||especialidad===""){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/agregarmecanico.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se registro el cliente correctamente");
                listarmecanico();
            }
            else{
                $("#resultado").html("El cliente ya existe");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
}
function modificar_meca(){
    console.log('holi');
    var cedula = document.getElementById('Cedula').value;
    var nombre = document.getElementById('Nombre').value;
    var apellido = document.getElementById('Apellido').value;
    var edad = document.getElementById('Edad').value;
    var sexo = document.getElementById('Sexo').value;
    var especialidad = document.getElementById('Especialidad').value;
    var datos = {
    "cedula": cedula,
    "nombre": nombre,
    "apellido": apellido,
    "edad": edad,
    "sexo": sexo,
    "especialidad":especialidad
    };
    if (nombre === "" || apellido === "" || edad === "" || sexo === "" || especialidad===""){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/modificarmecanico.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se modifico el mecanico correctamente");
            }
            else{
                $("#resultado").html("No se pudo modificar el mecanico");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
}
function borrarmecanico(cedula){

    $.ajax({
    url: "assets/php/borrarmecanico.php",
    type: "post",
    data: {cedula:cedula},
    // beforeSend: function() {
    // $("#resultado").html("Procesando, espere por favor...");
    // },
    success: function(response) {
        $("#resultado").html("Se borro el mecanico correctamente");
        listarmecanico(); 
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
    }
    });
    
}
function listarmecanico(){
    $.ajax({
        url: 'assets/php/listamecanico.php',
        type: 'GET',
        success: function(response) {
          const registros = JSON.parse(response);
          let template = '';
          registros.forEach(registro => {
            template += `
                    <tr>
                    <td>${registro.cedula}</td>
                    <td>${registro.nombre}</td>
                    <td>${registro.apellido}</td>
                    <td>${registro.edad}</td>
                    <td>${registro.sexo}</td>
                    <td>${registro.especialidad}</td>
                    <td><a href='modificarmecanico.php?cedula=${registro.cedula}'><button class='waves-effect deep-orange lighten-2 black-text btn'>Modificar</button></a></td>
                    <td><button class='waves-effect red lighten-2 black-text btn' onclick='borrarmecanico("${registro.cedula}")'>Borrar</button></td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}
function registrar_vehi(){
    console.log('holi');
    var matricula = document.getElementById('Matricula').value;
    var marca = document.getElementById('Marca').value;
    var modelo = document.getElementById('Modelo').value;
    var tipo = document.getElementById('Tipo').value;
    var ano = document.getElementById('Ano').value;
    var clasificacion = document.getElementById('Clasificacion').value;
    var descripcion = document.getElementById('Descripcion').value;
    var cedula = document.getElementById('Cedula').value;
    if (cedula === "" || matricula === "" || marca === "" || modelo === "" || tipo === "" ||ano==="" || clasificacion === "" || descripcion === ""){
         alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{
    var formElement= document.getElementById("formulario")
    var formu= new FormData(formElement)
    formu.append('matricula', matricula)
    formu.append('marca', marca)
    formu.append('modelo', modelo)
    formu.append('tipo', tipo)
    formu.append('ano', ano)
    formu.append('clasificacion', clasificacion)
    formu.append('descripcion', descripcion)
    formu.append('ced_cliente', cedula)
        $.ajax({
        url: "assets/php/agregarvehiculo.php",
        type: "post",
        data: formu,
        processData: false,
        contentType: false,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se registro el vehiculo correctamente");
                listarvehiculo()
            }
            else{
                $("#resultado").html(response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
   }
}
function listarvehiculo(){
    $.ajax({
        url: 'assets/php/listavehiculo.php',
        type: 'GET',
        success: function(response) {
          const registros = JSON.parse(response);
          let template = '';
          registros.forEach(registro => {
            template += `
                    <tr>
                    <td>${registro.matricula}</td>
                    <td>${registro.marca}</td>
                    <td>${registro.modelo}</td>
                    <td>${registro.tipo}</td>
                    <td>${registro.ano}</td>
                    <td>${registro.clasificacion}</td>
                    <td>${registro.descripcion}</td>
                    <td><img src="img_vehi/${registro.imagen}" alt="" width="50px" height="50px"></td>
                    <td>${registro.ced_cliente}</td>
                    <td><a href='modificarvehiculo.php?matricula=${registro.matricula}'><button class='waves-effect deep-orange lighten-2 black-text btn'>Modificar</button></a></td>
                    <td><button class='waves-effect red lighten-2 black-text btn' onclick='borrarvehiculo("${registro.matricula}")'>Borrar</button></td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}
function modificar_vehi(){
    console.log('holi');
    var matricula = document.getElementById('Matricula').value;
    var marca = document.getElementById('Marca').value;
    var modelo = document.getElementById('Modelo').value;
    var tipo = document.getElementById('Tipo').value;
    var ano = document.getElementById('Ano').value;
    var clasificacion = document.getElementById('Clasificacion').value;
    var descripcion = document.getElementById('Descripcion').value;
    var datos = {
    "matricula": matricula,
    "marca": marca,
    "modelo": modelo,
    "tipo": tipo,
    "ano": ano,
    "clasificacion":clasificacion,
    "descripcion":descripcion
    };
    if (matricula === "" || marca === "" || modelo === "" || tipo === "" || ano==="" || clasificacion === "" || descripcion===""){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/modificarvehiculo.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se modifico el vehiculo correctamente");
            }
            else{
                $("#resultado").html("No se pudo modificar el vehiculo");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
}
function borrarvehiculo(matricula){

    $.ajax({
    url: "assets/php/borrarvehiculo.php",
    type: "post",
    data: {matricula:matricula},
    // beforeSend: function() {
    // $("#resultado").html("Procesando, espere por favor...");
    // },
    success: function(response) {
        $("#resultado").html("Se borro el vehiculo correctamente");
        listarvehiculo(); 
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
    }
    });
    
}
function registrar_repue(){
    console.log('holi');
    var serial = document.getElementById('Serial').value;
    var marca = document.getElementById('Marca').value;
    var nombre = document.getElementById('Nombre').value;
    var cantidad = document.getElementById('Cantidad').value;
    if (serial === "" || nombre === "" || marca === "" || cantidad === ""){
         alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{
    var formElement= document.getElementById("formulario")
    var formu= new FormData(formElement)
    formu.append('serial', serial)
    formu.append('marca', marca)
    formu.append('nombre', nombre)
    formu.append('cantidad', cantidad)
        $.ajax({
        url: "assets/php/agregarrepuesto.php",
        type: "post",
        data: formu,
        processData: false,
        contentType: false,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se registro el repuesto correctamente");
                listarrepuesto()
            }
            else{
                $("#resultado").html(response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
   }
}
function modificar_repue(){
    console.log('holi');
    var serial = document.getElementById('Serial').value;
    var marca = document.getElementById('Marca').value;
    var nombre = document.getElementById('Nombre').value;
    var cantidad = document.getElementById('Cantidad').value;
    var datos = {
    "serial": serial,
    "marca": marca,
    "nombre": nombre,
    "cantidad": cantidad
    };
    if (serial === "" || marca === "" || nombre === "" || cantidad === "" ){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/modificarrepuesto.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se modifico el repuesto correctamente");
            }
            else{
                $("#resultado").html("No se pudo modificar el respuesto");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
}
function borrarrepuesto(serial){

    $.ajax({
    url: "assets/php/borrarrepuesto.php",
    type: "post",
    data: {serial:serial},
    // beforeSend: function() {
    // $("#resultado").html("Procesando, espere por favor...");
    // },
    success: function(response) {
        $("#resultado").html("Se borro el repuesto correctamente");
        listarrepuesto(); 
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#resultado").html("Error al realizar el cálculo");
    }
    });
    
}
function listarrepuesto(){
    $.ajax({
        url: 'assets/php/listarepuesto.php',
        type: 'GET',
        success: function(response) {
          const registros = JSON.parse(response);
          let template = '';
          registros.forEach(registro => {
            template += `
                    <tr>
                    <td>${registro.serial}</td>
                    <td>${registro.nombre}</td>
                    <td>${registro.cantidad}</td>
                    <td>${registro.marca}</td>
                    <td><img src="img_repue/${registro.imagen}" alt="" width="50px" height="50px"></td>
                    <td><a href='modificarrepuesto.php?serial=${registro.serial}'><button class='waves-effect deep-orange lighten-2 black-text btn'>Modificar</button></a></td>
                    <td><button class='waves-effect red lighten-2 black-text btn' onclick='borrarrepuesto("${registro.serial}")'>Borrar</button></td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}
function registrar_regis(){
    console.log('holi');
    var cedula = document.getElementById('Cedula').value;
    var matricula = document.getElementById('Matricula').value;
    var serial= document.getElementById('Serial').value;
    var cantidad = document.getElementById('Cantidad').value;
    var datos = {
    "cedula": cedula,
    "matricula": matricula,
    "serial": serial,
    "cantidad": cantidad
    };
    if (cedula === "" || matricula === "" || serial === "" || cantidad === ""){
        alert("Por favor, completa todos los campos.");
        return false; 
    }
    else{

        $.ajax({
        url: "assets/php/agregarregistro.php",
        type: "post",
        data: datos,
        // beforeSend: function() {
        // $("#resultado").html("Procesando, espere por favor...");
        // },
        success: function(response) {
            if(response=="listo"){
                $("#resultado").html("Se registro la reparacion correctamente");
                listarregistro();
            }
            else{
                $("#resultado").html(response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        $("#resultado").html("Error al realizar el cálculo");
        }
        });
    }
}
function listarregistro(){
    $.ajax({
        url: 'assets/php/listaregistro.php',
        type: 'GET',
        success: function(response) {
          const registros = JSON.parse(response);
          let template = '';
          registros.forEach(registro => {
            template += `
                    <tr>
                    <td>${registro.id}</td>
                    <td>${registro.matricula}</td>
                    <td>${registro.modelo}</td>
                    <td>${registro.cliente}</td>
                    <td>${registro.nomcliente}</td>
                    <td>${registro.serial}</td>
                    <td>${registro.repuesto}</td>
                    <td>${registro.cantidad}</td>
                    <td>${registro.mecanico}</td>
                    <td>${registro.nommecanico}</td>
                    <td><a href='verregistro.php?id=${registro.id}'><button class='waves-effect deep-orange lighten-2 black-text btn'>Ver</button></a></td>
                    <td><a href='fpdf/reporteindi.php?id=${registro.id}' target="_blank"><button class='waves-effect red lighten-2 black-text btn'>PDF</button></a></td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}