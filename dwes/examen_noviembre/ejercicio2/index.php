<?php
/*
* Titulo: Cuestionario
* Descripcion: Array que almacena la información del horario de 2ºDAW
* Autor: Francisco Javier Frías Serrano
* Fecha: 18/11/2019
*/

// Array que almacena el nivel de inglés
$nivelIngles = array("A1", "A2","B1", "B2","C1","C2");

// Array con las preguntas para generar el cuestionario dinámicamente
$cuestionario = array(
array ("pregunta" => "The room where secretaries work is called an .....",
       "Tipo"=>"text",
       "Respuesta"=>array("office"),
       "Acierto"=>1,
       "Fallo"=>0),
array ("pregunta" => "To go to the top of the building you can take the .....",
       "Tipo"=>"text",
       "Respuesta"=>array("lift","elevator"),
       "Acierto"=>1,
       "Fallo"=>0),
array ("pregunta" => "I ..... tennis every Sunday morning.",
       "Tipo"=>"Multiple-choice",
       "Opciones"=>array("playing","play","am playing","am play"),
       "Respuesta"=>"play",
       "Acierto"=>1,
       "Fallo"=>-0.25),
array ("pregunta" => "Don't make so much noise. Noriko ..... to study for her ESL test!",
       "Tipo"=>"Multiple-choice",
       "Opciones"=>array("try","tries","tried","is trying"),
       "Respuesta"=>"is trying",
       "Acierto"=>1,
       "Fallo"=>-0.25),
array ("pregunta" => "Jun-Sik ..... his teeth before breakfast every morning.",
       "Tipo"=>"Multiple-choice",
       "Opciones"=>array("will cleaned","is cleaning","cleans","clean"),
       "Respuesta"=>"cleans",
       "Acierto"=>1,
       "Fallo"=>-0.25),
array ("pregunta" => "Sorry, she can't come to the phone. She ..... a bath!",
       "Tipo"=>"Multiple-choice",
       "Opciones"=>array("is having","having","have","has"),
       "Respuesta"=>"is having",
       "Acierto"=>1,
       "Fallo"=>-0.25),
array ("pregunta" => "	..... many times every winter in Frankfurt.",
       "Tipo"=>"Multiple-choice",
       "Opciones"=>array("It snows","snowed","It is snowing","It is snow"),
       "Respuesta"=>"It snows",
       "Acierto"=>1,
       "Fallo"=>-0.25)   
);
?>
<?php
    include("config/parametros.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo TITULO; ?></title>
</head>

<body>
<?php
    // Cabecera de la página
    include("includes/cabecera.php");
    // Menu de la página
    echo '<nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
            </ul>
        </nav>';
    ?>
<div id="principal"> 
<?php
// Comprobamos que los parametros pasados no sean nulos
if (isset($_POST['nombre']) && isset($_POST['nivel']) && isset($_POST['0']) && isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4']) && isset($_POST['5']) && isset($_POST['6'])) {    echo "<form action='index.php' method='post'>";
    echo "Nombre: <input type='text' name='nombre' value='".$_POST['nombre']."' disabled>";
    echo '<br><br>';
    echo "Nivel: <select name='nivel'>";
                    foreach($nivelIngles as $key => $valor){
                        if ($value==$_POST[`nivel`]) {
                            echo "<option value='$valor' selected>$valor</option>" ;
                        }else {
                            echo "<option value=\"".$valor."\">".$valor."</option>" ;
                        }
                    }
                    echo "</select>"; 
    echo '<br><br>'; 

$contador = 0;
$nota = 0;

foreach($cuestionario as $key => $value){   
    if ($value["Tipo"]=="Multiple-choice") {
        echo $value["pregunta"];
        if ($_POST[$contador] == $value["Respuesta"]) {
           $nota += $value["Acierto"];
        }else {
            $nota += $value["Fallo"];
        }
        foreach ($value["Opciones"] as $keyopciones => $valueopciones) {

            if($valueopciones == $_POST[$contador]){
                if($valueopciones == $value["Respuesta"]){
                    echo "</br>"."<div style='background-color:green; color:white;'><input type='radio' name='".$key."' value='".$valueopciones."' checked disabled>".$valueopciones."</div>";
                 } else{
                    echo "</br>"."<div style='background-color:red; color:white;'><input type='radio' name='".$key."' value='".$valueopciones."' checked disabled>".$valueopciones."</div>";
                    }
                } else{
                    if($valueopciones == $value["Respuesta"]){
                        echo "</br>"."<div style='background-color:green;color:white;'><input type='radio' name='".$key."' value='".$valueopciones."' disabled>".$valueopciones."</div>";
                    } else{
                        echo "</br>"."<div><input type='radio' name='".$key."' value='".$valueopciones."' disabled>".$valueopciones."</div>";
                    }
             }   
        }
    }
    else{
        if(in_array($_POST[$contador], $value["Respuesta"])){
            $nota=$nota+$value["Acierto"];
            echo $value["pregunta"].": <input type='text' name='".$key."' value=".$_POST[$contador]." style='background-color:green;color:white;' disabled></br>";
        }
        else{
            $nota=$nota+$value["Fallo"];
            echo $value["pregunta"].": <input type='text' name='".$key."' value=".$_POST[$contador]." style='background-color:red;color:white;' disabled></br>";
            echo "La respuesta correcta es: ";
            echo "<ul>";
            foreach ($value["Respuesta"] as $keyrespuesta => $valuerespuesta) {
                echo "<li>$valuerespuesta</li>";
            }
            echo "</ul>";
        }
    }
    echo "<br>";
    $contador++;
}

echo "</form>";

//
if ($nota >= 3.5) {
    echo "<p>Has sacado: ".$nota." ¡Enhorabuena por aprobar!</p>";
}else {
    echo "<p>Has sacado: ".$nota." ¡Te ha faltado poco para aprobar!</p>";
}
}else {
    // Si no se ha enviado nada, muestra el formulario normal
    echo '<form action="index.php" method="post">';
    echo 'Nombre: <input type="text" name="nombre" value="" required>';
    echo '<br><br>';
    echo "Nivel: <select name=\"nivel\">";
                    foreach($nivelIngles as $clave => $valor){
                        echo "<option value=\"".$clave."\">".$valor."</option>" ;
                    }
                    echo "</select>";        
    echo '<br><br>'; 
    foreach($cuestionario  as $key => $value){
        echo "<p>";
        if ($value["Tipo"]=="Multiple-choice") {
            echo $value["pregunta"];
            foreach ($value["Opciones"] as $keyopciones => $valueopciones) {
                echo "<br>"."<input type='radio' name='".$key."' value='".$valueopciones."' required>".$valueopciones;
            }
        }else {
            echo $value["pregunta"]." <input type='text' name='".$key."' value='' required>";
        }       
        echo "</p>"; 
    }
    echo '<br><br>';
    echo '<input type="submit" value="Enviar">';    
    echo '</form>'; 
}

?>   


<?php
    // Muestra un boton que permite ver el codigo de la página
    echo "<br/><a href='includes/verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>
    </div>
  
    <?php
    // Pie de la página
    include("includes/footer.php");
    ?>
</body>

</html>