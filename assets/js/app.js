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
                    <td><button class='waves-effect red lighten-2 black-text btn' onclick='borrarcliente(${registro.cedula})'>Borrar</button></td>
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
//


function listamecanico(){
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

function registrar_meca(){
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
function listarvehiculo(){
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
                    <td><button class='waves-effect red lighten-2 black-text btn' onclick='borrarcliente(${registro.cedula})'>Borrar</button></td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}

function borrarvehiculo(cedula){

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

function listamecanico(){
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

function registrar_meca(){
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
function listarvehiculo(){
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
                    <td><button class='waves-effect red lighten-2 black-text btn' onclick='borrarcliente(${registro.cedula})'>Borrar</button></td>
                    </tr>
                    `
                });
                $('#tablaregistro').html(template);
            }
      });
}

function borrarvehiculo(cedula){

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

