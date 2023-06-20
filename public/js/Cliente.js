$(document).ready(function () {
    llenarTabla();
});

var idCliente = null;

function llenarTabla() {
    $.ajax({
        url: "http://127.0.0.1:8000/clientes/list",
        method: "GET",
        dataType: "JSON",
        success: function(response){
            console.log(response);
            $('#tabla-clientes tbody').empty();
            $.each(response, function (index, cliente) {
                var fila = "<tr>" +
                        "<td>" + cliente.codCliente + "</td>" +
                        "<td>" + cliente.nombres + "</td>" +
                        "<td>" + cliente.apellidos + "</td>" +
                        "<td>" + cliente.direccion + "</td>" +
                        "<td>" + cliente.cod_cliente + "</td>" +
                        "<td><button type='button' class='btn btn-info' onclick=seleccionar("+cliente.codCliente+") data-bs-toggle='modal' data-bs-target='#clientesModal'>Editar</button></td>" +
                        "<td><button type='button' class='btn btn-danger' onclick=eliminar("+cliente.codCliente+")>Eliminar</button></td>" +
                        "</tr>"
                $("#tabla-clientes").append(fila);
            })
        },
        error: function(error){
            console.log(error);
        }
    });
}

$("#btnGuardar").on("click", function(){
    var cliente = {
        nombres: $("#nombres").val(),
        apellidos: $("#apellidos").val(),
        direccion: $("#direccion").val(),
        cod_cliente: $("#cod_cliente").val()
    }

    $.ajax({
        url: "http://127.0.0.1:8000/clientes/save",
        method: "POST",
        dataType: "JSON",
        data: cliente,
        success: function(response){
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: response.mensaje,
                showConfirmButton: false,
                timer: 3000
            })
            llenarTabla();
            vaciarModal();
        }
    })
});

$("#abrirModal").on("click", function () {
    $("#btnGuardar").show();
    $("#btnEditar").hide();
    vaciarModal();
});

function seleccionar(id) {
    idCliente = id;
    $("#btnGuardar").hide();
    $("#btnEditar").show();
    $.ajax({
        url: "http://127.0.0.1:8000/clientes/"+id,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#nombres").val(response.nombres);
            $("#apellidos").val(response.apellidos);
            $("#direccion").val(response.direccion);
            $("#cod_cliente").val(response.cod_cliente);
        },
        error: function (error) {
            console.log(error);
        }
    })
}

function vaciarModal() {
    $("#nombres").val("");
    $("#apellidos").val("");
    $("#direccion").val("");
    $("#cod_cliente").val("");
}

function eliminar(id) {
    console.log(id);
    Swal.fire({
        title: 'Eliminar!',
        text: "Estas seguro de eliminar este privilegio?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "http://127.0.0.1:8000/clientes/delete/"+id,
                method: "POST",
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                        'Eliminado!',
                        'El privilegio se ha eliminado con exito',
                        'success'
                    )
                    llenarTabla();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
    })
}

$("#btnEditar").on("click", function () {
    var editado = {
        codCliente: idCliente,
        nombres: $("#nombres").val(),
        apellidos: $("#apellidos").val(),
        direccion: $("#direccion").val(),
        cod_cliente: $("#cod_cliente").val()
    }
    $.ajax({
        url: "http://127.0.0.1:8000/clientes/update",
        method: "POST",
        dataType: "JSON",
        data: editado,
        success: function (response) {
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: response.mensaje,
                showConfirmButton: false,
                timer: 3000
            })
            llenarTabla();
            vaciarModal();
        }
    })
});