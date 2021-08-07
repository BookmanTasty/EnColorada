<?php
include("funciones/funciones.php");

if (isset($_GET['ficha'])) {
    $idCarga = $_GET['ficha'];
} else {
    header('Location: 404.php');
}

$getFicha = "select * from fichas WHERE idfichas='$idCarga'";
$run_pro = mysqli_query($con, $getFicha);
$row_pro = mysqli_fetch_array($run_pro);

$idfichas = $row_pro['idfichas'];
if ($idfichas == null) {
    header('Location: 404.php');
}
$nombre = $row_pro['nombre'];
$descripcion = $row_pro['desc2'];
$apertura = $row_pro['ha'];
$cierre = $row_pro['hc'];
$mapa = $row_pro['mapa'];
$hora = getHora_m();

// funciones actualizar contador de vistas

$contador = $row_pro['contadorp'];
$contap = $contador + 1;
$acontador = "UPDATE fichas SET contadorp='$contap' WHERE idfichas = '$idfichas'";
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
?>


<html>

    <head> 

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/animate.css" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <script src="js/jquery.min.js"></script> 
        <script src="js/popper.min.js"></script> 
        <script src="js/bootstrap.min.js"></script> 

        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


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
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lugares</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Categorías</a>
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

        <div class="container">
            <h1><?php ECHO $nombre ?></h1>
            <div class='row'>
                <div class='col'>
                    <div id='fotosficha' class='carousel slide carousel-fade' data-bs-ride='carousel'>
                        <div class='carousel-inner'>
                            <div class='carousel-item active'>
                                <img src='img/fichas/<?php ECHO$idCarga ?>/logo.png' class='d-block w-100' alt='...'>
                            </div>
                            <div class="carousel-item">
                                <img src='img/fichas/<?php ECHO$idCarga ?>/id1.png' class='d-block w-100' alt='...'>
                            </div>
                            <div class="carousel-item">
                                <img src='img/fichas/<?php ECHO$idCarga ?>/id2.png' class='d-block w-100' alt='...'>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <p class='text-justify' style='text-align: justify'><?php ECHO $descripcion ?></p>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php ECHO "<h4>$estado </h4>
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
                        </table>"
                        ?>

                        <BR>
                        <p>Productos</p>
                        <p><?php ECHO $fproductos ?> </p>
                        <p>Servicios</p>
                        <p><?php ECHO $fservicios ?></p>
                    </div>


                    <div class="col">
                        <h4>Mapa</h4>
                        <img width='100%' src='https://maps.googleapis.com/maps/api/staticmap?center=<?php echo$mapa ?>&zoom=13&scale=1&size=300x300&maptype=roadmap&key=AIzaSyCspua9CO_RW2VGdrwKn4cRgY6XSimDBuY&format=png&visual_refresh=true' alt='Como llegar'>
                    </div>
                </div>

            </div>
            <div>
                <BR><!-- comment -->
            </div>

            <footer class="bg-light text-center text-lg-start">
                <!-- Marca Registrada -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2021 Copyright:
                    <a class="text-dark" href="https://encolorada.com/">EnColorada.com</a>
                </div>

            </footer>



    </body>
</html>