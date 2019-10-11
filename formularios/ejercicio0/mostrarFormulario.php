<?php 

if (!isset($_POST['enviar']) || (empty($_POST['Nombre'])) || (empty($_POST['Apellidos'])) 
|| (empty($_POST['Direccion'])) || (empty($_POST['Provincia'])) || (empty($_POST['Contrasenna']))
|| !(strlen($_POST['Telefono'])==9)) { 
    header('location:formulario.php');
}

echo "Nombre: ".$_POST['Nombre']."<br/>";
echo "Apellidos: ".$_POST['Apellidos']."<br/>";
echo "Direccion: ".$_POST['Direccion']."<br/>";
echo "Provincia: ".$_POST['Provincia']."<br/>";
echo "Teléfono: ".$_POST['Telefono']."<br/>";
echo "Contraseña: ".$_POST['Contrasenna']."<br/>";
echo "Trabajo: ".$_POST['trabajo']."<br/>";
echo "Estudios: ".$_POST['estudios']."<br/>";
echo "Nivel Inglés: ".$_POST['ingles']."<br/>";
echo "Intereses: ".$_POST['ocio']."<br/>";

echo "<br/><a href=\"formulario.php\"><button>Volver</button></a>";

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";

?>
<a href="formulario.php"><button>Volver</button></a>
