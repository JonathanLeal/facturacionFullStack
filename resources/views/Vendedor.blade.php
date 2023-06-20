<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Producto</title>
</head>
<body>
<!--INICIO DE Tabla-->
      <div class="container">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>Lista de PRODUCTOS</h3>
            <!-- BUTON para abri modal de PRODUCTOS -->
            <button type="button" id="abrirModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productosModal">
              Nuevo producto
            </button>
            <!-- BUTON para abri modal de Productos -->

            <!-- Modal INCIO PRODUCTOS-->
          <div class="modal fade" id="productosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion del cliente</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input type="text" class="form-control" id="nombre" placeholder="Nombres del producto">
                    </div>
                    <div class="form-group">
                      <label for="precioVenta">Precio de venta:</label>
                      <input type="number" step=".01" class="form-control" id="precioVenta" placeholder="precio de venta del producto">
                    </div>
                    <div class="form-group">
                      <label for="stockMinimo">Stock minimo:</label>
                      <input type="number" class="form-control" id="stockMinimo" placeholder="stock minimo del producto">
                    </div>
                    <div class="form-group">
                        <label for="stockActual">Stock actual:</label>
                        <input type="number" class="form-control" id="stockActual" placeholder="stock actual del producto">
                      </div>
                    <div class="form-group">
                      <label for="codBarra">Cod cliente:</label>
                      <input type="text" class="form-control" id="codBarra" placeholder="Codigo de barra del producto">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btnGuardar">Guardar</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btnEditar" style="display: none;">Editar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal FIN SOCIEDADES-->

            <table id="tabla-productos" class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Precio de venta</th>
                  <th>stock minimo</th>
                  <th>stock actual</th>
                  <th>codigo de barra</th>
                  <th>acciones</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
<!--FIN DE tabla-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{asset('js/Producto.js')}}"></script>
</body>
</html>