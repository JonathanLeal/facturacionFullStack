function llenarSelectVendedor() {
    $.ajax({
        url: "http://127.0.0.1:8000/venta/vendedor/list",
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#codVendedor").empty();
            $("#codVendedor").append("<option value=''>Seleccione un vendedor</option>");
            $.each(response, function(index, vendedor){
                $("#codVendedor").append("<option value='"+vendedor.codVendedor+"'>"+vendedor.nombres+" "+vendedor.apellidos+"</option>");
            });
        }
    })
}

function llenarSelectCliente() {
    $.ajax({
        url: "http://127.0.0.1:8000/venta/cliente/list",
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#codCliente").empty();
            $("#codCliente").append("<option value=''>Seleccione al cliente</option>");
            $.each(response, function(index, cliente){
                $("#codCliente").append("<option value='"+cliente.codCliente+"'>"+cliente.nombres+" "+cliente.apellidos+"</option>");
            });
        }
    })
}

function llenarSelectProducto() {
    $.ajax({
        url: "http://127.0.0.1:8000/venta/producto/list",
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#codProducto").empty();
            $("#codProducto").append("<option value=''>Seleccione un producto</option>");
            $.each(response, function(index, producto){
                $("#codProducto").append("<option value='"+producto.codProducto+"'>"+producto.nombreProducto+"</option>");
            });
        }
    })
}
llenarSelectProducto();
llenarSelectCliente();
llenarSelectVendedor();

$("#btnListar").on("click", function () {
    var codCliente = $("#codCliente").val();
    var codProducto = $("#codProducto").val();
    var codVendedor = $("#codVendedor").val();
    var numeroFactura = $("#numeroFactura").val();
    var cantidad = $("#cantidad").val();

    var listado = {
        codCliente: codCliente,
        codProducto: codProducto,
        codVendedor: codVendedor,
        cantidad: cantidad,
        numeroFactura: numeroFactura
    }

    $.ajax({
        url: "http://127.0.0.1:8000/venta/detalle/save",
        method: "POST",
        dataType: "JSON",
        data: listado,
        success: function (response) {
            console.log(response);
            Swal.fire(
                'exito!',
                'Producto listado',
                'success'
            )
            $.ajax({
                url: "http://127.0.0.1:8000/venta/listada/"+numeroFactura,
                method: "GET",
                dataType: "JSON",
                success: function(response1){
                    $('#tabla-listados tbody').empty();
                $.each(response1, function (index, detalle) {
                var fila = "<tr>" +
                        "<td>" + detalle.numeroFactura + "</td>" +
                        "<td>" + detalle.nombreProducto + "</td>" +
                        "<td>" + detalle.codBarra + "</td>" +
                        "<td>" + detalle.cantidad + "</td>" +
                        "<td>" + detalle.precioVenta + "</td>" +
                        "<td>" + detalle.total + "</td>" +
                        "<td><button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#productosModal'>Editar</button></td>" +
                        "<td><button type='button' class='btn btn-danger'>Eliminar</button></td>" +
                        "</tr>"
                $("#tabla-listados").append(fila);
            })
                }   
            })
        },
        error: function (error) {
            console.log(error);
        }
    })
});