<!-- Configuracion para -->
<?php

require 'config/database.php';
require 'config/config.php';

$db = new Database();
$con = $db->conectar();

/* */
$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

/* Valicacion */

if($id == '' || $token == ''){
  echo 'Error no se pudo validar la informacion.';
  exit;

} else{

  $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

  if($token == $token_tmp){

    $sql = $con-> prepare("SELECT count(id), nombre, tipo, precio FROM productos WHERE id=? AND activo=1");
    $sql-> execute([$id]);
    if($sql -> fetchColumn() > 0){

      $sql = $con-> prepare("SELECT count(id), nombre, tipo, precio, descripcion, descuento FROM productos WHERE id=? AND activo=1");
      $sql-> execute([$id]);
      $row = $sql -> fetch(PDO::FETCH_ASSOC);

      $precio = $row['precio'];
      $nombre = $row['nombre'];
      $tipo = $row['tipo'];
      $descripcion = $row['descripcion'];
      $descuento = $row['descuento'];
      $precio_desc = $precio - (($precio * $descuento) / 100);
      $dir_images = 'images/' . $id . '/';


      $rutaimg = $dir_images . 'principal.jpg';

      if(!file_exists($rutaimg)){
        $rutaimg = 'images/no-imagen.png';
      }

      $imagenes = array();
      if(file_exists($dir_images)){
      $dir = dir($dir_images);

      while(($archivo = $dir->read()) != false){
        if($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))){
          $imagenes[] = $dir_images . $archivo;
        }
      }
      $dir -> close();
    }
    }
  }else{
      echo '<h4>Error no se pudo validar la informacion.</h4>';
      exit;
    }
  }


/* Conexion a tabla y seleccionar*/
$con = $db->conectar();
$sql = $con-> prepare("SELECT id, nombre, tipo, precio FROM productos WHERE activo=1");
$sql-> execute();
$resultado = $sql->fetchall(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="es">

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
                    <a href="check.php" class="d-inline-block bg-primary text-white btn btn-primary">Mi Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span></a>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
    <main>
      <div class="container">
        <div class="row mb-3">
          <!-- Col 1 -->
          <div class="col-md-6 order-md-1">
          <!-- Carrusel -->
          <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <!-- Img 1 -->
              <div class="carousel-item active">
                <img width="400" height= "500" src="<?php echo $rutaimg; ?>" class="d-block w-80">
              </div>

              <!-- Otras -->
              <?php foreach($imagenes as $img) { ?>
              <div class="carousel-item">
                <img width="400" height= "500" src="<?php echo $img; ?>" class="d-block w-70">
              </div>
              <?php } ?>
              <!--  -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>


          <!-- Cositos -->
          </div>
          <!-- Col 2 -->
          <div class="col-md-6 order-md-1">
            <h2><?php echo $nombre; ?></h2>
            <h6><?php echo $tipo; ?></h6>
            <p><?php echo $descripcion; ?></p>
            <?php
            

            if($descuento > 0) { ?>
            <h6>
            <del><?php echo MONEDA . $precio; ?>
            </del></h6>

            <h2>
              <br>
              <?php echo MONEDA . $precio_desc; ?>
              <small class="text-success">
                <?php echo $descuento;?>% de Descuento
              </small>
            </h2>

              <?php } else{ ?>
            
            <h2><?php echo MONEDA . $precio; ?></h2>
            <p class="lead"></p>
            <?php } ?>
            

            <!-- Botones -->
            <div class="d-grid gap-3 col-10 mx-auto">
              <button class="btn btn-success" type="button">Comprar</button>
              <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Añadir al carrito</button>
            </div>
          </div>
        </div>
      </div>
    </main>

        <div class="py-5 bg-primary">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 text-center mb-3 mb-md-0">
                <h2 class="text-uppercase text-white mb-4">Try For Your Next Project</h2>
                <aF href="#" class="btn btn-bg-primary font-secondary text-uppercase">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <footer class="site-footer bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <h3 class="footer-heading mb-4 text-white">Sobre Nosotros</h3>
            <p>Estudiantes de la Universidad Tecnologica de Aguascalientes.</p>
            <p><a href="autores.php" class="btn btn-primary text-white px-4">Saber mas</a></p>
          </div>
          <div class="col-md-5 mb-4 mb-md-0 ml-auto"> 
            <div class="row mb-4">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Menu</h3>
                <ul class="list-unstyled">
                  <li><a href="index.php">Inicio</a></li>
                  <li><a href="autores.php">Autores</a></li>
                  <li><a href="manga.php">Mangas</a></li>
                  <li><a href="contacto.php">Contacto</a></li>
                  <li><a href="check.php">Carrito</a></li>
                </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Free Templates</h3>
                <ul class="list-unstyled">
                  <li><a href="#">HTML5 / CSS3</a></li>
                  <li><a href="#">Clean Design</a></li>
                  <li><a href="#">Responsive</a></li>
                  <li><a href="#">Multi Purpose Template</a></li>
                </ul>
              </div>
            </div>

            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4 text-white">Mandanos un correo</h3>
                <form action="#" class="d-flex footer-subscribe">
                  <input type="text" class="form-control rounded-0" placeholder="Correo">
                  <input type="submit" class="btn btn-primary rounded-0" value="Mandar">
                </form>
              </div>
            </div>
          </div>


          <div class="col-md-2">

            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4 text-white">Iconos</h3>
              </div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
            </div>
          </div>
        </div>
    </footer>
      </div>

      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.animateNumber.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/main.js"></script>
      
      <script>
    
    function addProducto(id, token){
        let url = 'clases/carrito.php';
        let formData = new FormData();
        formData.append('id', id);
        formData.append('token', token);

        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok){
             let elemento = document.getElementById("num_cart");
             elemento.innerHTML = data.numero;
          }
        })
    }
  </script>

</body>

</html>