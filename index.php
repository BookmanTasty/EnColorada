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

// con esto cargamos las funciones mas recurrentes del sistema
include ("funciones/funciones.php");
?>

<html>

    <head> 

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/animate.css" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <script src="js/jquery.min.js"></script> 
        <script src="js/popper.min.js"></script> 
        <script src="js/bootstrap.min.js"></script> 

        <meta charset="UTF-8">


        <title>EnColorada</title>
    </head>

    <body>


        <!-- Esta es la barra de navegacion en header -->

        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="img/logo.svg" width="180px" alt="Logo en Colorada"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Abierto ahora</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Anúnciate Aquí</a>
                        </li>

                    </ul>
                    <form class="d-flex" method="post" action="buscar.php">
                        <input class="form-control me-2" type="search" placeholder="Busca en Colorada" aria-label="Search" name="tag">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
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


            
                <!-- aqui implementamos codigo php para la carga de contenido desde la base de datos -->
                <?php
// sitema de paginacion
                $total_pages_sql = "SELECT COUNT(*) FROM fichas";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result) [0];
               

                $get_pro = "select * from fichas ORDER BY RAND($rnd)";

                $run_pro = mysqli_query($con, $get_pro);

                while ($row_pro = mysqli_fetch_array($run_pro)) {

                    $idfichas = $row_pro['idfichas'];
                    $nombre = $row_pro['nombre'];
                    $descripcion = $row_pro['desc'];
                    $apertura = $row_pro['ha'];
                    $cierre = $row_pro['hc'];
                    $hora = getHora_m();
                    $descripcion_adaptada = substr($descripcion, 0, 140);
                    // funciones actualizar contador de vistas
                    $contador = $row_pro['contadorl'];
                    $conta1 = $contador + 1;
                    $acontador = "UPDATE fichas SET contadorl='$conta1' WHERE idfichas = '$idfichas'";
                    mysqli_query($con, $acontador);

                    // Ravisamos si el lugar esta abierto o cerrado

                    $dapertura = explode(",", $row_pro['diasAp']);
                    $hoy = date("N") - 1;
                    $estado = getEstado($dapertura[$hoy], $hora, $apertura, $cierre);

                    //Dias de apertura
                    $pilaApertura = array();
                    for ($i = 0; $i <= count($dapertura) - 1; $i++) {
                        if ($dapertura[$i] == 0) {
                            array_push($pilaApertura, "Cerrado");
                        } else {
                            array_push($pilaApertura, "Abierto");
                        }
                    }

                    // actualizacion de horarios apertura y cierre del modal
                    $hapertura = getHorario($apertura);
                    $hcierre = getHorario($cierre);

                    // Cargar tags productos y servicios
                    $productos = $row_pro['tags'];
                    $servicios = $row_pro['tags1'];
                    $tproductos = explode(" ", $productos);
                    $tservicios = explode(" ", $servicios);
                    $tproductos = preg_replace('/[^a-z]+/i', '', $tproductos);
                    $tservicios = preg_replace('/[^a-z]+/i', '', $tservicios);
                    $pilaproductos = array();
                    $pilaservicios = array();

                    for ($i = 0; $i < count($tproductos); $i++) {
                        $capi = ucfirst($tproductos[$i]);
                        array_push($pilaproductos, "<a href='unitags.php?tag=$capi' class='btn btn-light'>$capi</a>");
                    }

                    for ($i = 0; $i < count($tservicios); $i++) {
                        $capi = ucfirst($tservicios[$i]);
                        array_push($pilaservicios, "<a href='unitags.php?tag=$capi' class='btn btn-light'>$capi</a>");
                    }
                    $fproductos = implode(" ", $pilaproductos);
                    $fservicios = implode(" ", $pilaservicios);

                    // Colocamos las fichas cargadas desde la base de datos
                    // codigo temporal para crear carpetas e imagenes de logo e imagenes temporles
                    // mkdir("img/fichas/$idfichas",0700);
                    // $img = imagecreate(240, 240);
                    // $white = imagecolorallocate($img, 255, 255, 255);
                    // $black = imagecolorallocate($img, 0, 0, 0);
                    // imagefilledrectangle($img, 0, 0, 240, 240, $black);
                    // imagestring($img, 5, 0, 0, $nombre, $white);
                    // imagepng($img, "img/fichas/$idfichas/logo.png");
                    // imagestring($img, 5, 0, 0, $descripcion, $white);
                    // imagepng($img, "img/fichas/$idfichas/id1.png");
                    // imagestring($img, 5, 0, 0, $apertura, $white);
                    // imagepng($img, "img/fichas/$idfichas/id2.png");
                    echo "
				<div class='card m-3 pe-2' style='max-width: 540px; padding: 10px;'>
				<div class='row g-0'>
				<div class='col-md-4'>
				<img src='img/fichas/$idfichas/logo.png' class='img-fluid rounded-start' alt='$descripcion'>
				</div>
				<div class='col-md-8'>
				<div class='card-body'>				
				<h5 class='card-title'>$nombre</h5>
				<p class='card-text text-justify' style='text-align: justify'>$descripcion_adaptada</p>
				<p class='card-text'>$estado</p>
				<p class='card-text'><small class='text-muted'>Actualizado hace $hora tiempo</small></p>
								<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#$idfichas'>Ver mas</button>
                                <!-- Modal -->
<div class='modal fade' id='$idfichas' tabindex='-1' aria-labelledby='$idfichas' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>$nombre</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
     
        <img src='img/fichas/$idfichas/logo.png' class='img-fluid rounded-start mx-auto d-block'  alt='$descripcion'>
          
            <p ><strong>$estado</strong></p>
         
        <p class='text-justify' style='text-align: justify'>$descripcion</p>
        
        <p> Horarios  </p>
        <table class='tftable' border='0'>
        <tr><td>Apertura:</td><td>$hapertura</td><td>Cierre:</td><td>$hcierre</td></tr>
        <tr><td>Lunes:</td><td>$pilaApertura[0]</td></tr>
        <tr><td>Martes:</td><td>$pilaApertura[1]</td></tr>
        <tr><td>Miercoles:</td><td>$pilaApertura[2]</td></tr>
        <tr><td>Jueves:</td><td>$pilaApertura[3]</td></tr>
        <tr><td>Viernes:</td><td>$pilaApertura[4]</td></tr>
        <tr><td>Sabado:</td><td>$pilaApertura[5]</td></tr>
        <tr><td>Domingo:</td><td>$pilaApertura[6]</td></tr>
        </table>


        <BR>
        <p>Productos</p>
        <p>$fproductos</p>
        <p>Servicios</p>
        <p>$fservicios</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
        <a href='ficha.php?ficha=$idfichas' class='btn btn-primary'>Mas informacion</a>
      </div>
    </div>
  </div>
</div>
				</div>
				</div>
				</div>
				</div>
	
	
	
		";
                }
                ?>


                <!-- aqui inicia el inifine scrool aun falta por implementar -->


                <!-- aqui termina  el inifine scrool aun falta por implementar -->

                


            </div>
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
