<?php
    session_start();
    $usuario = $_SESSION['username'];

    if(!isset($usuario)){
        header("location: login.php");
    }else{
        echo "<h1>Bienvenido $usuario</h1>";
        echo "<a href='controlador/salir.php'> Salir </a>";
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

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

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
    </div>
    <!-- .site-mobile-menu -->
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
                    <li class="active"><a href="index.php">Inicio</a></li>
                    <li><a href="autores.php">Autores</a>
                    <li class="has-children"><a href="#">Categorias</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="manga.php">Mangas</a></li>
                      </ul>
                    </li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li class="has-children"><a href="login.php">Iniciar Sesión</a>
                    <ul class="dropdown arrow-top">
                      <li class="#"><a href="register.php">Registrarse</a></li>
                      </ul>
                    </li>
                    <a href="check.php" class="d-inline-block bg-primary text-white btn btn-primary">Mi Carrito</a>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/banners/banner1.jpg);"
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
              <h1 class="font-secondary  font-weight-bold text-uppercase">Bienvenido a TuManga</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/banners/banner2.png);"
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 class="font-secondary font-weight-bold text-uppercase">La Tienda Online de tus Mangas y Comics
                Preferidos.</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slant-1"></div>

    <div class="site-half">
      <div class="img-bg-1" style="background-image: url('images/banners/banner3.png');" data-aos="fade"></div>
      <div class="container">
        <div class="row no-gutters align-items-stretch">
          <div class="col-lg-5 ml-lg-auto py-5">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Diferencias entre un Manga y un
              Comic</span>
            <h2 class="site-section-heading text-uppercase font-secondary mb-5">¿Qué es un Manga?</h2>
            <p>Manga es la palabra japonesa para designar las historietas en general. Fuera de Japón, se utiliza para
              referirse a las historietas de origen japonés. un representante del ukiyo-e, acuñó el término manga
              combinando los kanji correspondientes a informal (漫 man) y dibujo (画ga). Se traduce, literalmente, como
              «dibujos caprichosos» o «garabatos». Al profesional que escribe o dibuja mangas se le conoce como mangaka.
            </p>

            <p>El manga se clasifica en función del segmento de población al que se dirigen como:
            <ul type="circle">
              <li>Kodomo, dirigido a niños pequeños.</li>
              <li>Shōnen, dirigido a chicos adolescentes. Son series con grandes dosis de acción, en las que a menudo se
                dan situaciones humorísticas. Destaca el compañerismo entre miembros de un colectivo o de un equipo de
                combate.</li>
              <li>Shōjo, dirigido a chicas adolescentes. Sus argumentos son siempre muy inocentes, historias de romance
                y fantasía, aunque tras la primera guerra del Golfo se desarrollaron personajes femeninos peleones, que
                luchan para proteger el destino del planeta o de una comunidad.</li>
              <li>Seinen, dirigido a hombres jóvenes y adultos. Tiene tramas más intensas y maduras.</li>
              <li>Josei, dirigido a mujeres jóvenes y adultas. Historias maduras y más elaboradas que pueden tocar temas
                adultos como el romance, el rencor, la crianza de hijos, la amistad y la traición.</li>
            </ul>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-half block">
      <div class="img-bg-1 right" style="background-image: url('images/banners/banner5.jpg');" data-aos="fade"></div>
      <div class="container">
        <div class="row no-gutters align-items-stretch">
          <div class="col-lg-5 mr-lg-auto py-5">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Diferencias entre un Manga y un
              Comic</span>
            <h2 class="site-section-heading text-uppercase font-secondary mb-5" >¿Qué es un Comic?</h2>
            <p>El término cómic es utilizado para designar a aquellas formas de relato gráfico que se arman en base a
              dibujos encuadrados en viñetas. La historieta o cómic es una forma de expresión artística y un medio de
              comunicación que consisten en una serie de dibujos, dotados o no de texto de acompañamiento, que leídos en
              secuencia componen un relato o una serie de ellos.</p>

            <p>
            <ul type="square">
              <li>Tiras cómicas: Respetan el formato que su nombre indica: son una tira de tres o más viñetas en las
                cuales se representa una narración breve, a menudo semejante al chiste, al gag o, también, a la
                narración por entregas, típica del siglo XIX.</li>
              <li>Cómics o revistas de historietas. Impresas en papel de mayor o menor calidad, pero por lo general a
                todo color, con acabado profesional y en tirajes en masa, se trata de las clásicas revistas de lectura
                por viñetas, aunque ya distan mucho de ser únicamente de superhéroes o aventuras asombrosas.</li>
              <li>Novelas gráficas. Esta es una categoría amplia y diversa, en donde encajan las propuestas artísticas
                más formales, cultas y exigentes, a menudo para un público informado, dispuesto a interpretarlas tal y
                como se hace con una obra de arte escrita o ilustrada.</li>
            </ul>
            </p>
          </div>
        </div>
      </div>
    </div>


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
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>


</body>

</html>