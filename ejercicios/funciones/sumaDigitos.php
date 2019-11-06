<?php
/*
* Titulo: EjercicioDNI
* Descripcion: Escribe una función recursiva para sumar los dígitos de un número.
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php 
include 'top.php';
$lerrorFormulario=false; 
$numero=0; 
$numeroErr=""; 
?>
    
<div>
    <h2>Suma Recursiva</h2>
</div>

<?php

/**
 * Function sumar, calcula el n
 */
function sumar($numero){
    if($numero==0){
        return 0;
    }
    else{
        //Calculamos el recursivo del numero
        return sumar((int)($numero /10)) + ($numero%10);
    }
}

if (isset($_POST['enviar'])) {
    $numero = $_POST['numero'];

    //Con Filter validamos que se introduzca solo nÃºmeros enteros
    if (empty($_POST['numero']) || !filter_var($numero, FILTER_VALIDATE_INT)) {    
        $numeroErr = "ERROR";
        $lerrorFormulario = true;
    }
}

/**
 * Formulario para pedir el nÃºmero
 */
if (!isset($_POST['enviar']) || $lerrorFormulario) { ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
    <label>NÃºmero</label> 
    <input type="text" name="numero"> 
        <?php echo $numeroErr; ?> <br>
    <input type="submit" name="enviar"> 
    </form> 
        <?php 
    } else {
        echo "La suma recursiva es:";
        echo (sumar($numero));
    }
    ?>

<?php
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
    <a href="../../../"><button>Volver</button></a>