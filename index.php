 <head> 

  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
 	
  <script src="js/jquery.min.js"></script> 
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap.min.js"></script> 
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
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>  <!-- Boton de busqueda de servicios o negocios -->
      </form>
    </div>
  </div>
</nav>


<!-- Jumbotron -->
<div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-gray" style="
    background-image: url('img/top-view-of-figueres-catalonia.jpg');
  ">
  
  <h2 class="mb-1 h4">
    Todo lo encuentras
  </h2>
  
  <h1 class="mb-1 h1">EnColorada</h1>

  
</div>

<!-- aqui inicia el inifine scrool aun falta por implementar -->

<div class="container-fluid">
<div class="row justify-content-center">

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/d1.png" class="img-fluid rounded-start" alt="Aqui va descripcion del negocio">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Local 1</h5>
        <p class="card-text">Breve descripción del local y sus servicios más comunes.</p>
		<p class="card-text">Abierto/Cerrado</p>
  		<p class="card-text"><small class="text-muted">Actualizado hace n tiempo</small></p>
		<button type="button" class="btn btn-primary ">Ver mas</button>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/d5.jpg" class="img-fluid rounded-start" alt="Aqui va descripcion del negocio">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Local 5</h5>
        <p class="card-text">Breve descripción del local y sus servicios más comunes.</p>
		<p class="card-text">Abierto/Cerrado</p>
  		<p class="card-text"><small class="text-muted">Actualizado hace n tiempo</small></p>
		<button type="button" class="btn btn-primary ">Ver mas</button>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/d2.jpg" class="img-fluid rounded-start" alt="Aqui va descripcion del negocio">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Local 2</h5>
        <p class="card-text">Breve descripción del local y sus servicios más comunes.</p>
		<p class="card-text">Abierto/Cerrado</p>
  		<p class="card-text"><small class="text-muted">Actualizado hace n tiempo</small></p>
		<button type="button" class="btn btn-primary ">Ver mas</button>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/d3.jpg" class="img-fluid rounded-start" alt="Aqui va descripcion del negocio">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Local 3</h5>
        <p class="card-text">Breve descripción del local y sus servicios más comunes.</p>
		<p class="card-text">Abierto/Cerrado</p>
  		<p class="card-text"><small class="text-muted">Actualizado hace n tiempo</small></p>
		<button type="button" class="btn btn-primary ">Ver mas</button>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/d4.jpg" class="img-fluid rounded-start" alt="Aqui va descripcion del negocio">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Local 4</h5>
        <p class="card-text">Breve descripción del local y sus servicios más comunes.</p>
		<p class="card-text">Abierto/Cerrado</p>
  		<p class="card-text"><small class="text-muted">Actualizado hace n tiempo</small></p>
		<button type="button" class="btn btn-primary ">Ver mas</button>
      </div>
    </div>
  </div>
</div>
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

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.7.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.7.0/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>

</body>