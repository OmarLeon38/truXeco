<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="images/favicon.png">
   <title>truXeco</title>
   <!-- ARCHIVOS CSS -->
   <link href="css/custom.css" rel="stylesheet">
   <link href="css/color.css" rel="stylesheet">
   <link href="css/responsive.css" rel="stylesheet">
   <link href="css/owl.carousel.min.css" rel="stylesheet">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/prettyPhoto.css" rel="stylesheet">
   <link href="css/all.min.css" rel="stylesheet">
   <link href="css/slick.css" rel="stylesheet">
   <link href="css/proyect.css" rel="stylesheet">
</head>

<body>
   <div class="wrapper">
      <!--Header Inicio-->
      <header class="header-style-2">
         <nav class="navbar navbar-expand-lg">
         <a class="navbar-brand" href="index-2.html"><img src="images/logo.png" alt="" width="160x"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i
                  class="fas fa-bars"></i> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item"> <a class="nav-link" href="index.html">Inicio</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="nosotros.html">Sobre nosotros</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="informacion.html">Información</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="huella-ecologica.html">Huella ecológica</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="eventos.html">Eventos</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="tutoriales.php">Tutoriales</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="noticias.html">Noticias</a> </li>
               </ul>
               <ul class="topnav-right">
                  <li class="login-reg"> <a href="my-account.html">Admin</a>
               </ul>
            </div>
         </nav>
      </header>
      <!--Header Final-->

      <!--Inicio de sección de videos-->
      <section class="videos">
         <div class="container">
            <h1 class="titulo">Tutoriales</h1>
            <div class="lista_videos">
               <div class="contenedor_videos">
                  <?php
                  // Configuración de la conexión a la base de datos
                  $host = "b2qse4kwewbmhsljbq06-mysql.services.clever-cloud.com";
                  $database = "b2qse4kwewbmhsljbq06";
                  $user = "uzzwtpe560fd1gyz";
                  $password = "NHLIrd09pKn35nnM3PRV";

                  // Conexión a la base de datos
                  $conn = new mysqli($host, $user, $password, $database);

                  // Verificar la conexión
                  if ($conn->connect_error) {
                     die("Error de conexión a la base de datos: " . $conn->connect_error);
                  }

                  // Definir la cantidad de videos por página
                  $videosPorPagina = 5;

                  // Obtener el número de página actual desde la URL (si está configurado)
                  $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                  // Calcular el punto de inicio para la consulta según la página actual
                  $inicio = ($paginaActual - 1) * $videosPorPagina;

                  // Consulta para obtener datos de la tabla Videos con paginación
                  $sql = "SELECT titulo, descripcion, video_blob FROM Videos LIMIT $inicio, $videosPorPagina";
                  $result = $conn->query($sql);

                  // Verificar si hay videos en esta página
                  if ($result->num_rows > 0) {
                     while ($videoData = $result->fetch_assoc()) {
                        echo '<div class="video-item">';
                        echo '<div class="video-container">'; // Contenedor para el video
                        echo '<video width="100%" controls>';
                        echo '<source src="data:video/mp4;base64,' . base64_encode($videoData['video_blob']) . '" type="video/mp4">';
                        echo 'Tu navegador no soporta el elemento de video.';
                        echo '</video>';
                        echo '</div>';
                        echo '<div class="pro-txt">';
                        echo '<h3><a href="#">' . $videoData['titulo'] . '</a></h3>';
                        echo '<p>' . $videoData['descripcion'] . '</p>';
                        echo '<a href="#" class="view">Ver video en YouTube</a>';
                        echo '</div>';
                        echo '</div>';
                     }
                  }
                  ?>
               </div>
            </div>
            <?php

            // Calcular el número total de páginas
            $sqlTotal = "SELECT COUNT(*) as total FROM Videos";
            $resultTotal = $conn->query($sqlTotal);
            $totalVideos = $resultTotal->fetch_assoc()['total'];
            $totalPaginas = ceil($totalVideos / $videosPorPagina);

            // Imprimir botones de paginación
            echo '<div class="paginacion">';
            for ($i = 1; $i <= $totalPaginas; $i++) {
               echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
            }
            echo '</div>';
            ?>
         </div>
      </section>
      <!--Final de sección de videos-->
      <!--Footer Inicio-->
      <footer class="footer">
         <div class="footer-top wf100">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <!--Footer truXeco Inicio-->
                     <div class="footer-widget">
                        <h4>Sobre truXeco</h4>
                        <p>
                           "truXeco: Cuidando Trujillo y nuestro planeta. Inspiramos a
                           la comunidad trujillana a enfrentar la contaminación del
                           aire, de las calles y agua a través de información
                           concientizadora, tutoriales, consejos de jardinería,
                           noticias ambientales y más. Juntos, construyamos un futuro
                           más limpio y saludable para Trujillo.
                        </p>
                        <a href="#" class="lm">Sobre nosotros</a>
                     </div>
                     <!--Footer truXeco Fin-->
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <!--Footer páginas Inicio-->
                     <div class="footer-widget">
                        <h4>Páginas</h4>
                        <ul class="quick-links">
                           <li><a href="#">Información</a></li>
                           <li><a href="huella-ecologica.html">Huella ecológica</a></li>
                           <li><a href="eventos.html">Eventos</a></li>
                           <li><a href="tutoriales.php">Tutoriales</a></li>
                           <li><a href="noticias.html">Noticias</a></li>
                        </ul>
                     </div>
                     <!--Footer páginas Fin-->
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-copyr wf100">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 col-sm-4">
                     <img src="images/logo.png" alt="" />
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!--Footer Fin-->
   </div>
   <!--   JS Files Start  -->
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/jquery-migrate-1.4.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/jquery.prettyPhoto.js"></script>
   <script src="js/slick.min.js"></script>
   <script src="js/custom.js"></script>
</body>

</html>