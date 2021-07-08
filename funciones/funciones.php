<?php
// Conectamos al servidor desde este metodo
$con = mysqli_connect("sql3.freemysqlhosting.net", "sql3423802", "VaegNBjVX7", "sql3423802");
if (mysqli_connect_errno()) {
    echo "Error en coneccion" . mysqli_connect_error();
}

function getHora_m()
{
date_default_timezone_set('America/Mexico_City');
$hora = date('H');
$minuto = date('i');
$tiempo_m = ($hora * 60) + $minuto;
return $tiempo_m;
}

function getEstado($hora,$apertura,$cierre)
{
if ($hora > $apertura )
		{
			if ($hora < $cierre)
			{
				$estado = "Abierto";
			}
			else 
				$estado = "Cerrado";
				
		}
		else
			$estado = "Cerrado";
return $estado;
}

?>