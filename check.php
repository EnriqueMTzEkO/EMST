<?php
  require 'config/database.php';
  require 'config/config.php';

  $db = new Database();
  $con = $db->conectar();
  
  $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
  
  $lista_carrito = array(); //Creación de arreglo para almancenar N productos
  if($productos != null) //Si carrito no está vacío
  {
        foreach ( $productos as $clave => $cantidad )
        {
            $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1 ");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Carrito</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">

  <head>
    <title>Tienda Online &mdash; TuManga</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilo.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  </head>

<body>

  <!-- <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div> -->

  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    <div class="site-navbar-wrap js-site-navbar bg-white">
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="row align-items-center">
            <div class="col-2">
              <h2 class="mb-0 site-logo"><a href="index.php" class="font-weight-bold text-uppercase">TuManga</a></h2>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                      class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="autores.php">Autores</a>
                    <li class="has-children"><a href="#">Categorias</a>
                      <ul class="dropdown arrow-top">
                        <li class="active"><a href="manga.php">Mangas</a></li>
                      </ul>
                    </li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <a href="check.php" class="d-inline-block bg-primary text-white btn btn-primary">Carrito <span
                        id="num_cart" class="badge bg-secondary">
                        <?php echo $num_cart;?>
                      </span></a>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <main id="main">

      <div class="container">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
              </tr>
            <tbody>
            <?php
              if ($lista_carrito == null){
                  echo '<tr> <td colspan="5" class="text-center"><b>Lista Vacía </b></td> </tr>';
              }
              else{
                $total= 0;
                foreach ($lista_carrito as $fila)
                {
                  $_id =       $fila['id'];
                  $nombre =    $fila['nombre'];
                  $precio =    $fila['precio'];
                  $descuento = $fila['descuento'];
                  $cantidad = $fila['cantidad'];
                  $precio_desc = $precio - (($precio * $descuento) / 100);
                  $subtotal = $cantidad * $precio_desc;
                  $total = $total + $subtotal;
                ?>
              <tr>
                <td>
                  <?php echo $nombre; ?>
                </td>
                <td> $
                  <?php echo number_format($precio_desc,2,'.',','); ?>
                </td>
                <td>
                  <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5"
                    id=cantidad_<?php echo $_id; ?> onchange="actualizarCantidad( this.value,
                  <?php echo $_id; ?> )" >
                </td>
                <td>
                  <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                    $
                    <?php echo number_format($subtotal,2,'.',','); ?>
                  </div>
                </td>
                <td>
                  <a href="#" id="eliminar" class="btn btn-outline-danger btn-sm" data-bs-id="<?php echo $_id; ?>"
                    data-bs-toggle="modal" data-bs-target="#eliminaModal"> Eliminar </a>
                </td>
              </tr>

              <?php } ?>

              <tr>
                <td colspan="3"></td>
                <td colspan="2">
                  <p class="h3" id="total">
                    $
                    <?php echo number_format($total,2,'.',','); ?>
                  </p>
                </td>
              </tr>
            </tbody>
            <?php } ?>
            </thead>
          </table>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 offset-md-6 d-grid gap-2">
            <button class="btn btn-outline-dark btn-lg"> Realizar Pago </button>
          </div>
        </div>

      </div>

    </main>
    <!-- End #main -->

    <!-- Modal para Eliminar -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminaModalLabel">Advertencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea Eliminar el Producto del Carrito?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal"> Cancelar </button>
        <button id="btn-elimina" type="button" class="btn btn-outline-danger" onclick="eliminar()"> Eliminar </button>
      </div>
    </div>
  </div>
</div>


    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>

      let eliminaModal = document.getElementById('eliminaModal')
      eliminaModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina');
        buttonElimina.value = id
      })

      function actualizarCantidad(cantidad, id) {
        let url = 'clases/actualizar_carrito.php';
        let formData = new FormData();
        formData.append('action', 'agregar');
        formData.append('id', id);
        formData.append('cantidad', cantidad);

        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
          .then(data => {
            if (data.ok) {

              let divsubtotal = document.getElementById('subtotal_' + id);
              divsubtotal.innerHTML = data.sub;

              let total = 0.00;
              let list = document.getElementsByName('subtotal[]');

              for (let i = 0; i < list.length; i++) {
                total = total + parseFloat(list[i].innerHTML.replace(/[$,]/g, ''));
              }

              total = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2
              }).format(total);

              document.getElementById('total').innerHTML = '$' + total;

            }
          })
      }

      function eliminar()
    {
        let botonElimina = document.getElementById ('btn-elimina');
        let id = botonElimina.value;

        let url = 'clases/actualizar_carrito.php';
        let formData = new FormData();
        formData.append('action', 'eliminar');
        formData.append('id', id);
 
        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok)
          {
              location.reload();
          }
        })
    } 
     
    </script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>