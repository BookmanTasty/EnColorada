
<html>

    <head> 

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/animate.css" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <script src="js/jquery.min.js"></script> 
        <script src="js/popper.min.js"></script> 
        <script src="js/bootstrap.min.js"></script> 

        <style>
            * {
	border: 0;
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
body {
	background: currentColor;
}
/* I. Containers */
figure {
	font-size: 6px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 64em;
}
figcaption {
	color: #fff;
	display: flex;
	align-content: space-between;
	flex-wrap: wrap;
	height: 17em;
}
figcaption span:before, .sad-mac:before {
	content: "";
	display: block;
	width: 1em;
	height: 1em;
	transform: translate(-1em,-1em);
} 
figcaption span {
	display: inline-block;
	margin: 0 2em;
	width: 4em;
	height: 6em;
}
.sr-text {
	overflow: hidden;
	position: absolute;
	width: 0;
	height: 0;
}
/* II. Sprites */
/* 1. Sad Mac */
.sad-mac {
	background: #fff;
	margin: 0 auto 7em auto;
	width: 23em;
	height: 30em;
}
.sad-mac:before {
	box-shadow: 1em 1em, 23em 1em, 4em 3em, 5em 3em, 6em 3em, 7em 3em, 8em 3em, 9em 3em, 10em 3em, 11em 3em, 12em 3em, 13em 3em, 14em 3em, 15em 3em, 16em 3em, 17em 3em, 18em 3em, 19em 3em, 20em 3em, 3em 4em, 21em 4em, 3em 5em, 21em 5em, 3em 6em, 7em 6em, 9em 6em, 15em 6em, 17em 6em, 21em 6em, 3em 7em, 8em 7em, 16em 7em, 21em 7em, 3em 8em, 7em 8em, 9em 8em, 15em 8em, 17em 8em, 21em 8em, 3em 9em, 21em 9em, 3em 10em, 10em 10em, 13em 10em, 21em 10em, 3em 11em, 11em 11em, 12em 11em, 21em 11em, 3em 12em, 21em 12em, 3em 13em, 10em 13em, 11em 13em, 12em 13em, 13em 13em, 14em 13em, 21em 13em, 3em 14em, 9em 14em, 15em 14em, 16em 14em, 21em 14em, 3em 15em, 17em 15em, 21em 15em, 3em 16em, 21em 16em, 4em 17em, 5em 17em, 6em 17em, 7em 17em, 8em 17em, 9em 17em, 10em 17em, 11em 17em, 12em 17em, 13em 17em, 14em 17em, 15em 17em, 16em 17em, 17em 17em, 18em 17em, 19em 17em, 20em 17em, 3em 22em, 4em 22em, 5em 22em, 14em 22em, 15em 22em, 16em 22em, 17em 22em, 18em 22em, 19em 22em, 20em 22em, 1em 27em, 2em 27em, 3em 27em, 4em 27em, 5em 27em, 6em 27em, 7em 27em, 8em 27em, 9em 27em, 10em 27em, 11em 27em, 12em 27em, 13em 27em, 14em 27em, 15em 27em, 16em 27em, 17em 27em, 18em 27em, 19em 27em, 20em 27em, 21em 27em, 22em 27em, 23em 27em, 1em 28em, 23em 28em, 1em 29em, 23em 29em, 1em 30em, 23em 30em;
}
/* 2. Letters */
._0:before {
	box-shadow: 2em 1em, 3em 1em, 1em 2em, 1em 3em, 1em 4em, 1em 5em, 4em 2em, 4em 3em, 4em 4em, 4em 5em, 2em 4em, 3em 3em, 2em 6em, 3em 6em;
}
._4:before {
	box-shadow: 1em 1em, 1em 2em, 1em 3em, 1em 4em, 4em 1em, 4em 2em, 4em 3em, 4em 4em, 2em 4em, 3em 4em, 4em 5em, 4em 6em;
}
.d:before {
	box-shadow: 1em 1em, 2em 1em, 3em 1em, 1em 2em, 4em 2em, 1em 3em, 4em 3em, 1em 4em, 4em 4em, 1em 5em, 4em 5em, 1em 6em, 2em 6em, 3em 6em;
}
.e:before {
	box-shadow: 1em 1em, 2em 1em, 3em 1em, 4em 1em, 1em 2em, 1em 3em, 2em 3em, 3em 3em, 1em 4em, 1em 5em, 1em 6em, 2em 6em, 3em 6em, 4em 6em;
}
.f:before {
	box-shadow: 1em 1em, 2em 1em, 3em 1em, 4em 1em, 1em 2em, 1em 3em, 2em 3em, 3em 3em, 1em 4em, 1em 5em, 1em 6em;
}
.n:before {
	box-shadow: 1em 1em, 1em 2em, 1em 3em, 1em 4em, 1em 5em, 1em 6em, 4em 1em, 4em 2em, 4em 3em, 4em 4em, 4em 5em, 4em 6em, 2em 3em, 3em 4em;
}
.o:before {
	box-shadow: 2em 1em, 3em 1em, 1em 2em, 1em 3em, 1em 4em, 1em 5em, 4em 2em, 4em 3em, 4em 4em, 4em 5em, 2em 6em, 3em 6em;
}
.r:before {
	box-shadow: 1em 1em, 2em 1em, 3em 1em, 4em 2em, 1em 2em, 1em 3em, 1em 4em, 2em 3em, 3em 3em, 1em 5em, 1em 6em, 4em 4em, 4em 5em, 4em 6em;
}
.t:before {
	box-shadow: 1em 1em, 2em 1em, 3em 1em, 2em 2em, 2em 3em, 2em 4em, 2em 5em, 2em 6em;
}
.u:before {
	box-shadow: 1em 1em, 1em 2em, 1em 3em, 1em 4em, 1em 5em, 4em 1em, 4em 2em, 4em 3em, 4em 4em, 4em 5em, 2em 6em, 3em 6em;
}
/* III. Responsiveness */
/* This cannot be smoothly done using viewport units; sprite pixels will look divided when font size is a floating point. */
@media screen and (min-width: 720px) {
	figure {
	    font-size: 7px;
	}
}
@media screen and (min-width: 1440px) {
	figure {
	    font-size: 8px;
	}
}
        </style>


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

        <figure>
            <div class="sad-mac"></div>
            <figcaption>
                <span class="sr-text">Error 404: Not Found</span>
                <span class="e"></span>
                <span class="r"></span>
                <span class="r"></span>
                <span class="o"></span>
                <span class="r"></span>
                <span class="_4"></span>
                <span class="_0"></span>
                <span class="_4"></span>
   
            </figcaption>
        </figure>


  



    </body>
</html>