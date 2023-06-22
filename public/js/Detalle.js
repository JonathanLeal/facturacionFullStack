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
                $("#codCliente").append("<option value='"+cliente.codCliente+"'>"+cliente.nombres+"</option>");
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

$("#btnListar").on("click", function () {
    var codCliente = $("#codCliente").val();
    var codProducto = $("#codProducto").val();
    var cantidad = $("#cantidad").val();
    var fechaIngreso = $("#fechaRegistro").val();

    var listado = {
        codCliente: codCliente,
        codProducto: codProducto,
        cantidad: cantidad,
        fechaIngreso: fechaIngreso
    }

    $.ajax({
        url: "http://127.0.0.1:8000/venta/detalle/save",
        method: "POST",
        dataType: "JSON",
        data: listado,
        success: function (response) {
            console.log(response);
            Swal.fire(
                'Listado!',
                'Producto agregado a la lista!',
                'success'
            )
            $.ajax({
                url: "venta/listada",
                method: "GET",
                dataType: "JSON",
                success: function(response1){
                    console.log(response1);
                }   
            })
        },
        error: function (error) {
            console.log(error);
        }
    })
});