<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>  

  <!-- SWEETALERT2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- LOCAL -->
  <link rel="stylesheet" href="./view/css/main.css">
  <script type="text/javascript" src="./view/js/main.js" defer></script>
  <script type="text/javascript" src="./view/js/modal.js" defer></script>
  <script type="text/javascript" src="./view/js/tableActions.js" defer></script>
  <script type="text/javascript" src="./view/js/filter.js" defer></script>

  <title>Management - Registro Productos</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid header-container">
      <a class="navbar-brand name-container" href="#">
        <img src="./public/img/productLogo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
        <h2>Registro de Productos</h2>
      </a>
    </div>
  </nav>

  <div class="main-container">
    <div id="tableSection">
      <div class="btns-container">
        <button type="button" id="btnRegistry" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProdModal">
          Registrar
        </button>

        <select class="form-select" name="CategoriesFilter" id="CategoriesFilter">
          <option selected disabled value=""></option>
        </select>
      </div>

      <div class="table-container">
        <table id="ProdTable" class="table table-dark table-hover dt-responsive">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Categoría</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="ProdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="formLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form id="ProdForm" class="row g-3 needs-validation" novalidate>

            <div class="divider div-transparent div-dot">
              <i class="bi bi-box2-fill"></i>
            </div>
          
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Nombre Producto</label>
              <input type="text" name="ProdName" class="form-control" id="ProdName" required>
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
                Ingresa el nombre del producto!
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Cantidad</label>
              <input type="number" name="ProdStock" class="form-control" id="ProdStock" required>
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
                Ingresa la cantidad de productos!
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom03" class="form-label">Categoría</label>
              <select class="form-select" name="ProdCategory" id="ProdCategory" required>
                <!-- <option selected disabled value=""></option> -->
              </select>
              <div class="valid-feedback">
                OK!
              </div>
              <div class="invalid-feedback">
                Ingrese una categoría!
              </div>
            </div>

            <div class="col-12 btn-container">
              <button id="formBtn" class="btn btn-primary" type="submit"></button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>