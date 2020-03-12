<?php
/*
* Calcular el salario de un trabajador con un impuesto
*
* @author Francisco Javier Frías Serrano
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicios Complementarios 2 - Ejercicio 7</title>
    <style>
    div{
        border: 1px solid black;
    }</style>
</head>
<body>


<?php
$info=detect();

$nombre= "Francisco Javier Frías Serrano";
$direccion= "Córdoba, Andalucía";

echo "<h1>BIENVENIDO</h1>
<div><p>Mi nombre es: $nombre</p>
<p>Mi dirección es: $direccion</p></div>
<p>Usted esta viendo esta página con un Navegador...".$info["browser"]."</p>
<p>La dirección IP desde donde está viendo esta página...".getRealIpAddr()."</p>";
 

/**
 * Funcion que devuelve un array con los valores
 */

function detect()

{

	$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");


	# definimos unos valores por defecto para el navegador y el sistema operativo

	$info['browser'] = "OTHER";
 

	# buscamos el navegador con su sistema operativo

	foreach($browser as $parent)

	{

		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);

		$f = $s + strlen($parent);

		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);

		$version = preg_replace('/[^0-9,.]/','',$version);

		if ($s)

		{
			$info['browser'] = $parent;

		}

    }
    
 	# devolvemos el array de valores

	return $info;

}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>

<a href="../../"><button>Volver</button></a>
</body>
</html>