<!-- Configuracion para -->
<?php

require 'config/database.php';
require 'config/config.php';
$db = new Database();

$con = $db->conectar();
$sql = $con-> prepare("SELECT id, nombre, tipo, precio FROM productos WHERE activo=1");
$sql-> execute();
$resultado = $sql->fetchall(PDO::FETCH_ASSOC);

?>

<?php
if(isset($_GET['enviar'])){
  $search = $_GET['search'];

  $consulta = $con->query("SELECT * FROM productos WHERE id LIKE '%$search%' or nombre LIKE '%$search%'");

  while($row = $consulta->mysqli_fetch_array()){
    echo $row['id'].'<br>';
    echo $row['nombre'].'<br>';
  }
}
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

<style>
          
        /* styling navlist */
        #navlist {
            background-color: #0074D9;
            position: absolute;
            width: 100%;
        }
          
        /* styling navlist anchor element */
        #navlist a {
            float:center;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 15px;
        }
        .navlist-right{
            float:center;
        }
  
        /* hover effect of navlist anchor element */
        #navlist a:hover {
            background-color: #ddd;
            color: black;
        }
          
        /* styling search bar */
        .search input[type=search]{
            width:300px;
            height:25px;
            border-radius:25px;
            border: none;
  
        }
          
        .search{
            float:center;
            margin:7px;
  
        }
          
        .search button{
            background-color: #0074D9;
            color: #f2f2f2;
            float: center;
            padding: 5px 10px;
            margin-right: 16px;
            font-size: 12px;
            border: none;
            cursor: pointer;
        } 
    </style>

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
                    <li class="has-children"><a href="login.php">Iniciar Sesión</a>
                    <ul class="dropdown arrow-top">
                      <li class="#"><a href="register.php">Registrarse</a></li>
                      </ul>
                    </li>
                    <a href="check.php" class="d-inline-block bg-primary text-white btn btn-primary">Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span></a>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/banners/banner_manga.jpg);"
      data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-5 text-center" data-aos="fade">
          <h1 class="text-uppercase">Productos</h1>
          <span class="caption d-block text-white"> Encuentra tus mangas y comics <a href="#">favoritos</a></span>
        </div>
      </div>
    </div>
    <div class="slant-1"></div>
    <div class="site-section first-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Mejores Mangas </span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">Tu Mejor Eleccion </h2>
          </div>
        </div>

        <div class="search">
              
            <form action="" method="get">
                <input type="search"
                    placeholder=" Search Mangas o Comics"
                    name="search">
                <input type="submit" name="enviar" value="Buscar">
            </form>
        </div>
    </div>
<br>
        <!-- Optimizacion de codigo -->

        <main>
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
              <!-- php -->
              <?php foreach($resultado as $row){ ?>
                <!--  -->
              <div class="col">
                <div class="card shadow-sm">
                  <!--  -->
                  <?php
                  $id = $row['id'];
                  $imagen = "images/" . $id . "/principal.jpg";
                  if(!file_exists($imagen)){
                    $imagen = "images/no_imagen.png";
                  }?>
                  <!--  -->
                  <img width="250" height= "300" src="<?php echo $imagen; ?>" alt="imagenes">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                    <p class="card-text"><?php echo $row['tipo']; ?></p>
                    <h6 class="card-text"><?php echo $row['precio']; ?></h6>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'],KEY_TOKEN); ?>" class="btn btn-primary">Informacion</a>
                      </div>
                      <div>
                        <a class="btn btn-success" type="button" onclick="addProducto( <?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>' )">Añadir</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- php -->
              <?php } ?>
            </div>
          </div>
        </main>
        <!--  -->
        <div class="py-5 bg-primary">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 text-center mb-3 mb-md-0">
                <h2 class="text-uppercase text-white mb-4">Try For Your Next Project</h2>
                <a href="#" class="btn btn-bg-primary font-secondary text-uppercase">Contact Us</a>
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
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      
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