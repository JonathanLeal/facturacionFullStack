$(document).ready(function () {
    llenarTabla();
})

function llenarTabla() {
    $.ajax({
        url: "http://127.0.0.1:8000/vendedores/list",
        method: "GET",
        dataType: "JSON",
        success: function(response){
            console.log(response);
            $('#tabla-vendedores tbody').empty();
            $.each(response, function (index, vendedor) {
                var fila = "<tr>" +
                        "<td>" + vendedor.codVendedor + "</td>" +
                        "<td>" + vendedor.nombres + "</td>" +
                        "<td>" + vendedor.apellidos + "</td>" +
                        "<td>" + vendedor.dui + "</td>" +
                        "<td>" + vendedor.celular + "</td>" +
                        "<td>" + vendedor.direccion + "</td>" +
                        "</tr>"
                $("#tabla-vendedores tbody").append(fila);
            })
        },
        error: function(error){
            console.log(error);
        }
    });
}