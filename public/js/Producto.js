$(document).ready(function () {
    llenarTabla();
});

var idProducto = null;

function llenarTabla() {
    $.ajax({
        url: "http://127.0.0.1:8000/productos/list",
        method: "GET",
        dataType: "JSON",
        success: function(response){
            console.log(response);
            $('#tabla-productos tbody').empty();
            $.each(response, function (index, producto) {
                var fila = "<tr>" +
                        "<td>" + producto.codProducto + "</td>" +
                        "<td>" + producto.nombreProducto + "</td>" +
                        "<td>" + producto.precioVenta + "</td>" +
                        "<td>" + producto.stockMinimo + "</td>" +
                        "<td>" + producto.stockActual + "</td>" +
                        "<td>" + producto.codBarra + "</td>" +
                        "<td><button type='button' class='btn btn-info' onclick=seleccionar("+producto.codProducto+") data-bs-toggle='modal' data-bs-target='#productosModal'>Editar</button></td>" +
                        "<td><button type='button' class='btn btn-danger' onclick=eliminar("+producto.codProducto+")>Eliminar</button></td>" +
                        "</tr>"
                $("#tabla-productos").append(fila);
            })
        },
        error: function(error){
            console.log(error);
        }
    });
}

$("#btnGuardar").on("click", function(){
    var producto = {
        nombreProducto: $("#nombreProducto").val(),
        precioVenta: $("#precioVenta").val(),
        stockMinimo: $("#stockMinimo").val(),
        stockActual: $("#stockActual").val(),
        codBarra: $("#codBarra").val()
    }

    $.ajax({
        url: "http://127.0.0.1:8000/productos/save",
        method: "POST",
        dataType: "JSON",
        data: producto,
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
    idProducto = id;
    $("#btnGuardar").hide();
    $("#btnEditar").show();
    $.ajax({
        url: "http://127.0.0.1:8000/productos/"+id,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#nombreProducto").val(response.nombreProducto);
            $("#precioVenta").val(response.precioVenta);
            $("#stockMinimo").val(response.stockMinimo);
            $("#stockActual").val(response.stockActual);
            $("#codBarra").val(response.codBarra);
        },
        error: function (error) {
            console.log(error);
        }
    })
}

function vaciarModal() {
    $("#nombreProducto").val("");
    $("#precioVenta").val("");
    $("#stockMinimo").val("");
    $("#stockActual").val("");
    $("#codBarra").val("");
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
                url: "http://127.0.0.1:8000/productos/delete/"+id,
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
        codProducto: idProducto,
        nombreProducto: $("#nombreProducto").val(),
        precioVenta: $("#precioVenta").val(),
        stockMinimo: $("#stockMinimo").val(),
        stockActual: $("#stockActual").val(),
        codBarra: $("#codBarra").val()
    }
    $.ajax({
        url: "http://127.0.0.1:8000/productos/update",
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