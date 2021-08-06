<?php
include("funciones/funciones.php");

$getFicha = "select * from fichas";
$run_pro = mysqli_query($con, $getFicha);
$row_pro = mysqli_fetch_array($run_pro);

$pilaproductos = array();
$pilaservicios = array();

while ($row_pro = mysqli_fetch_array($run_pro)) {
// Cargar tags productos y servicios 
    $productos = $row_pro['tags'];
    $servicios = $row_pro['tags1'];
    $tproductos = explode(" ", $productos);
    $tservicios = explode(" ", $servicios);
    $tproductos = preg_replace('/[^a-z]+/i', '', $tproductos);
    $tservicios = preg_replace('/[^a-z]+/i', '', $tservicios);

    for ($i = 0; $i < count($tproductos); $i++) {
        array_push($pilaproductos, ucfirst($tproductos[$i]));
    }

    for ($i = 0; $i < count($tservicios); $i++) {
        array_push($pilaservicios, ucfirst($tservicios[$i]));
    }
}

$fproductos = implode(" ", $pilaproductos);
$fservicios = implode(" ", $pilaservicios);

$uproductos = array_unique($pilaproductos);
$uservicios = array_unique($pilaservicios);
sort($uproductos);
sort($uservicios);

//$crt2 = implode(" ", $uproductos);
// echo $crt2;
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
        <div>
            <BR><!-- comment -->
        </div>

        <!-- aqui pondremos el contenido de la pagina  -->
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>Productos</h1>
                    <ul class="list-group list-group-flush">
<?php
for ($i = 0; $i < count($uproductos); $i++) {
    echo "<a href='unitags.php?tag=$uproductos[$i]' class='list-group-item list-group-item-action'>$uproductos[$i]</a>";
}
?>
                    </ul>
                </div>
                <div class="col-6">
                    <h1>Servicios</h1>
                    <ul class="list-group list-group-flush">
<?php
for ($i = 0; $i < count($uservicios); $i++) {
    echo "<a href='unitags.php?tag=$uservicios[$i]' class='list-group-item list-group-item-action'>$uservicios[$i]</a>";
}
?>
                </div>
                </ul>
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