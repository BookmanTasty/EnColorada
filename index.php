<!-- cargamos las funciones especiales para la pagina -->

<?php
// Esto le dice a PHP que usaremos cadenas UTF-8 hasta el final
mb_internal_encoding('UTF-8');
// Esto le dice a PHP que generaremos cadenas UTF-8
mb_http_output('UTF-8');
// modeulo sesion y aleatoriedad, se utilizara posteriormente para sesiones de usuarios
session_start();
if (isset($_SESSION['rnd'])) {
    $rnd = $_SESSION['rnd'];
} else {
    $_SESSION['rnd'] = random_int(100, 999);
    $rnd = $_SESSION['rnd'];
}

// cargamos la variables de paginacion de la pagina 

if (isset($_GET['numeropagina'])) {
    $numeropagina = $_GET['numeropagina'];
} else {
    $numeropagina = 1;
}

$fichas_por_pagina = 10;
$offset = ($numeropagina - 1) * $fichas_por_pagina;
// con esto cargamos las funciones mas recurrentes del sistema

include("funciones/funciones.php");
?>

<html>

    <head> 

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <script src="js/jquery.min.js"></script> 
        <script src="js/popper.min.js"></script> 
        <script src="js/bootstrap.min.js"></script> 

        <meta charset="UTF-8">


        <title>EnColorada</title>
    </head>

    <body>


        <!-- Esta es la barra de navegacion en header -->

        <nav class="navbar sticky-top navbar-expand-lg  navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EnColorada</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lugares</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Abierto ahora</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>

                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-success" type="submit">An&uacutenciate aqu&iacute</button>  <!-- Boton de busqueda de servicios o negocios -->
                    </form>
                </div>
            </div>
        </nav>


        <!-- Jumbotron -->

        <div class="container-fluid ">
            <div class="row justify-content-center"  >
                <div class="container-lg">
                    <div id="carouselExampleInterval" class="container-sm carousel slide justify-content-center" data-bs-ride="carousel" >
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="img/baners/4582296.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="img/baners/5565344.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/baners/5651956.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- colocamos el contenedor de fichas para las templates -->

        <div class="container-fluid">
            <div class="row justify-content-center" style="padding: 10px;" >

                <!-- script jquery mostrar textos extentidos descripciones-->
                <script>
                    $(document).ready(function () {
                        $('.card-text').hover(
                                function () {
                                    $(this).removeClass('text-truncate');
                                },
                                function () {
                                    $(this).addClass('text-truncate');
                                }
                        );
                    });
                </script>
                <!-- aqui implementamos codigo php para la carga de contenido desde la base de datos -->
                <?php
                // sitema de paginacion

                $total_pages_sql = "SELECT COUNT(*) FROM fichas";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $fichas_por_pagina);

                $get_pro = "select * from fichas ORDER BY RAND($rnd) LIMIT $offset, $fichas_por_pagina ";

                $run_pro = mysqli_query($con, $get_pro);

                while ($row_pro = mysqli_fetch_array($run_pro)) {

                    $idfichas = $row_pro['idfichas'];
                    $nombre = $row_pro['nombre'];
                    $descripcion = $row_pro['desc'];
                    $apertura = $row_pro['ha'];
                    $cierre = $row_pro['hc'];
                    $hora = getHora_m();

                    // funciones actualizar contador de vistas

                    $contador = $row_pro['contadorl'];
                    $conta1 = $contador + 1;
                    $acontador = "UPDATE fichas SET contadorl='$conta1' WHERE idfichas = '$idfichas'";
                    mysqli_query($con, $acontador);

                    // Ravisamos si el lugar esta abierto o cerrado

                    $estado = getEstado($hora, $apertura, $cierre);

                    // Colocamos las fichas cargadas desde la base de datos

                    echo "
				<div class='card m-3 pe-2' style='max-width: 540px; padding: 10px;'>
				<div class='row g-0'>
				<div class='col-md-4'>
				<img src='img/fichas/$idfichas/logo.png' class='img-fluid rounded-start' alt='$descripcion'>
				</div>
				<div class='col-md-8'>
				<div class='card-body'>				
				<h5 class='card-title'>$nombre</h5>
				<p class='card-text text-justify text-truncate' style='text-align: justify'>$descripcion</p>
				<p class='card-text'>$estado</p>
				<p class='card-text'><small class='text-muted'>Actualizado hace $hora tiempo</small></p>
				<button type='button' class='btn btn-primary'>Ver mas</button>
				</div>
				</div>
				</div>
				</div>
	
	
	
		";
                }
                ?>


                <!-- aqui inicia el inifine scrool aun falta por implementar -->


                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="<?php
                            if ($numeropagina <= 1) {
                                echo '#';
                            } else {
                                echo "?numeropagina=" . ($numeropagina - 1);
                            }
                            ?>">Anterior</a></li>
                        
                        <?php  // esta ciclo for rellena automaticamente las paginas disponibles
                            for ($i = 1; $i<= $total_pages; $i++ ){
                                if ($i == $numeropagina){
                                    echo "<li class='page-item'><a class='page-link fw-bold' href='?numeropagina=$i'>$i</a></li>";
                                }
                                else {
                                    echo "<li class='page-item'><a class='page-link' href='?numeropagina=$i'>$i</a></li>";
                                }
                                
                            }
                        ?>
                
                        <li class="page-item"><a class="page-link" href="<?php
                            if ($numeropagina >= $total_pages) {
                                echo '#';
                            } else {
                                echo "?numeropagina=" . ($numeropagina + 1);
                            }
                            ?>">Siguiente</a></li>
                    </ul>
                </nav>


            </div>

            <!-- aqui termina  el inifine scrool aun falta por implementar -->

            <footer class="bg-light text-center text-lg-start">
                <!-- Marca Registrada -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2021 Copyright:
                    <a class="text-dark" href="https://encolorada.com/">EnColorada.com</a>
                </div>

            </footer>



    </body>
</html>