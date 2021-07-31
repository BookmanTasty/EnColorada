<?php

// con esto cargamos las funciones mas recurrentes del sistema
include("funciones/funciones.php");

session_start();
if (isset($_SESSION['rnd'])) {
    $rnd = $_SESSION['rnd'];
} else {
    $_SESSION['rnd'] = random_int(100, 999);
    $rnd = $_SESSION['rnd'];
}

// cargamos la variables de paginacion de la pagina 

if (isset($_POST['page'])) {
    $numeropagina = $_POST['page'];
} else {
    $numeropagina = 1;
}

$fichas_por_pagina = 10;
$offset = ($numeropagina ) * $fichas_por_pagina;
$total_pages_sql = "SELECT COUNT(*) FROM fichas";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $fichas_por_pagina);

// THIS IS A DUMMY CONTENT SERVER SCRIPT
// CREATE YOUR OWN!
// (A) NO MORE CONTENT TO SERVE
if ($_POST['page'] == $total_pages) {
    echo "END";
}

// (B) SERVE DUMMY PAGE
else {

// sitema de paginacion
    echo " <div class='container-fluid'>
            <div class='row justify-content-center' style='padding: 10px;' >

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
                </script> ";

    $get_pro = "select * from fichas ORDER BY RAND($rnd) LIMIT $offset, $fichas_por_pagina ";

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

        $estado = getEstado($hora, $apertura, $cierre);
        
        // actualizacion de horarios apertura y cierre del modal
        
        $hapertura = getHorario ($apertura);
        $hcierre = getHorario ($cierre);
        
        // Cargar tags productos y servicios 
       $productos = $row_pro['tags'];
       $servicios = $row_pro['tags1']; 
       $tproductos = explode(" ", $productos);
       $tservicios = explode(" ", $servicios);
       $pilaproductos = array();
       $pilaservicios = array();
       
            for ($i = 0 ; $i < count($tproductos) ; $i++){
               array_push($pilaproductos, "<a href='unitags?producto=$tproductos[$i]' class='btn btn-light'>$tproductos[$i]</a>");
           }
            
            for ($i = 0 ; $i < count($tservicios) ; $i++){
                array_push($pilaservicios, "<a href='unitags?servicio=$tservicios[$i]' class='btn btn-light'>$tservicios[$i]</a>");
            }
        $fproductos = implode(" ",$pilaproductos)  ;
        $fservicios = implode(" ",$pilaservicios)  ;
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
        
        <p> Horarios  Apertura: $hapertura  Cierre: $hcierre <p>
        <p>Productos</p>
        $fproductos
        <p>Servicios</p>
        $fservicios
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
        <button type='button' class='btn btn-primary'>Mas informacion</button>
      </div>
    </div>
  </div>
</div>
                                
				</div>
				</div>
				
	
	
	
		";
        echo " </div>
				</div>";
    }
}
?>
