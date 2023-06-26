<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Venta</title>
</head>
<body>
    <!--INICIO DE Tabla-->
      <div class="container">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>Venta</h3>

            <div class="card">
                <div class="card-header">
                    <h3>Sala de venta</h3>
                    <div class="card-body">
                        <div class="row-lg-2">
                            <label for="codCliente">Cliente:</label>
                            <select name="codCliente" id="codCliente" class="form-control" style="width: 400px"></select>
                        </div>
                        <div class="row-lg-2">
                            <label for="codVendedor">Vendedor:</label>
                            <select name="codVendedor" id="codVendedor" class="form-control" style="width: 400px"></select>
                        </div>
                        <div class="row-lg-2">
                            <label for="codProducto">Producto:</label>
                            <select name="codProducto" id="codProducto" class="form-control" style="width: 400px"></select>
                        </div>
                        <div class="row-lg-2">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" name="cantidad" style="width: 200px" id="cantidad" class="form-control" placeholder="cantidad del producto">
                        </div>
                        <div class="row-lg-2">
                            <label for="numeroFactura">Factura:</label>
                            <input type="number" name="numeroFactura" style="width: 200px" id="numeroFactura" class="form-control" placeholder="numero de la factura">
                        </div>
                        <div class="row-lg-2 mt-2">
                            <button type="button" id="btnListar" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive mt-2">
                <table class="table table-hover" id="tabla-listados">
                    <thead>
                        <tr>
                            <th>Factura</th>
                            <th>Producto</th>
                            <th>CodBarra</th>
                            <th>Cantidad</th>
                            <th>Precio venta</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{asset('js/Detalle.js')}}"></script>
</body>
</html>