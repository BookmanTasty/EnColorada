<?php
// Conectamos al servidor desde este metodo
$con = mysqli_connect("localhost", "root", "", "EnColorada");
if (mysqli_connect_errno()) {
    echo "Error en coneccion" . mysqli_connect_error();
}
?>