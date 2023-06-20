<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Clientes</title>
</head>
<body>
<!--INICIO DE Tabla-->
      <div class="container">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>Lista de sociedades</h3>
            <!-- BUTON para abri modal de sociedades -->
            <button type="button" id="abrirModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientesModal">
              Nuevo cliente
            </button>
            <!-- BUTON para abri modal de sociedades -->

            <!-- Modal INCIO SOCIEDADES-->
          <div class="modal fade" id="clientesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion del cliente</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nombre_sociedades">Nombres:</label>
                      <input type="text" class="form-control" id="nombres" placeholder="Nombres del cliente">
                    </div>
                    <div class="form-group">
                      <label for="nombre_sociedades">Apellidos:</label>
                      <input type="text" class="form-control" id="apellidos" placeholder="apellidos del cliente">
                    </div>
                    <div class="form-group">
                      <label for="nombre_sociedades">Direccion:</label>
                      <input type="text" class="form-control" id="direccion" placeholder="Direccion del cliente">
                    </div>
                    <div class="form-group">
                      <label for="nombre_sociedades">Cod cliente:</label>
                      <input type="number" class="form-control" id="cod_cliente" placeholder="Codigo del cliente">
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

            <table id="tabla-clientes" class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Direccion</th>
                  <th>Codigo cliente</th>
                  <th>Acciones</th>
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
    <script src="{{asset('js/Cliente.js')}}"></script>
</body>
</html>