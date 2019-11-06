<?php
/*
* Titulo: Proyecto Verbos Irregulares
* Descripcion: Realizan un proyecto que según el nivel de dificultad (1-3),
* en una tabla habrá una serie de huecos en función de la dificultad, y el usuario tendrá que rellenarlos.
* Autor: Francisco Javier Frías Serrano
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Verbos Irregulares</title>
</head>

<body>


<?php

$array = array(
    array("arise","arose","arisen","Elevarse"),
    array("awake","awoke","awoken","Despertar"),
    array("bear","bore","born","Soportar"),
    array("beat","beat","beaten","golpear"),
    array("become","became","become","Hacerse"),
    array("begin","began","begun","Empezar"),
    array("bend","bent","bent","Doblar"),
    array("bet","bet","bet","Apostar"),
    array("bind","bound","bound","Atar"),
    array("bite","bit","bitten","Morder"),
    array("blow","blew","blown","Soplar"),
    array("break","broke","broken","Quebrar"),
    array("bring","brought","brought","Traer"),
    array("build","built","built","Construir"),
    array("burn","burnt","burnt","Quemar"),
    array("burst","burst","burst","Romper"),
    array("buy","bought","bought","Comprar"),
    array("catch","caught","caught","Coger"),
    array("choose","chose","chosen","Escoger"),
    array("cling","clung","clung","Asirse"),
    array("come","came","come","Venir"),
    array("cost","cost","cost","Costar"),
    array("creep","crept","crept","Arrastrarse"),
    array("cut","cut","cut","Cortar"),
    array("deal","dealt","dealt","Tratar"),
    array("dig","dug","dug","Cavar"),
    array("do","did","done","Hacer"),
    array("draw","drew","drawn","Tirar"),
    array("drink","drank","drunk","Beber"),
    array("drive","drove","driven","conducir"),
    array("fall","fell","fallen","Caer"),
    array("feed","fed","fed","Alimentar"),
    array("feel","felt","felt","Sentir"),
    array("fight","fought","fought","Pelear"),
    array("find","found","found","Encontrar"),
    array("findout","foundout","foundout","Averiguar"),
    array("flee","fled","fled","Escapar"),
    array("fly","flew","flown","Volar"),
    array("forbid","forbade","forbidden","Prohibir"),
    array("foresee","foresaw","foreseen","prevenir"),
    array("forget","forgot","forgotten","Olvidar"),
    array("forgive","forgave","forgiven","Perdonar"),
    array("freeze","froze","frozen","Congelar"),
    array("get","got","gotten","Lograr"),
    array("give","gave","given","Dar"),
    array("go","went","gone","funcionar"),
    array("grind","ground","ground","Moler"),
    array("grow","grew","grown","Crecer"),
    array("hang","hung","hung","Colgar"),
    array("have","had","had","Tener"),
    array("hear","heard","heard","OÃ­r"),
    array("hide","hid","hidden","Ocultar"),
    array("hit","hit","hit","Pegar"),
    array("hold","held","held","Sostener"),
    array("hurt","hurt","hurt","Herir"),
    array("keep","kept","kept","Mantener"),
    array("know","knew","known","Conocer"),
    array("lay","laid","laid","Poner"),
    array("lead","led","led","Guiar"),
    array("lean","leant","leant","Inclinar"),
    array("learn","learnt","learnt","Aprender"),
    array("leave","left","left","Partir"),
    array("lend","lent","lent","Prestar"),
    array("let","let","let","Permitir"),
    array("lie","lay","lain","Tenderse"),
    array("light","lit","lit","Alumbrar"),
    array("lose","lost","lost","Perder"),
    array("make","made","made","Hacer"),
    array("mean","meant","meant","Significar"),
    array("meet","met","met","Encontrar"),
    array("melt","melted","molten","Derretir"),
    array("mistake","mistook","mistaken","Equivocarse"),
    array("misunderstand","misunderstood","misunderstood","malentender"),
    array("overcome","overcame","overcome","Vencer"),
    array("pay","paid","paid","Pagar"),
    array("put","put","put","Poner"),
    array("read","read","read","Leer"),
    array("rebuild","rebuilt","rebuilt","Reconstruir"),
    array("rid","rid","rid","Librarse."),
    array("ride","rode","ridden","Rodar"),
    array("ring","rang","rung","Tocar"),
    array("rise","rose","risen","Ascender"),
    array("run","ran","run","Correr"),
    array("saw","sawed","sawn","serrar"),
    array("say","said","said","Decir"),
    array("see","saw","seen","Ver"),
    array("seek","sought","sought","Buscar"),
    array("sell","sold","sold","Vender"),
    array("send","sent","sent","Enviar"),
    array("set","set","set","Instalar"),
    array("shake","shook","shaken","Sacudir"),
    array("shed","shed","shed","Derramar"),
    array("shine","shone","shone","Brillar"),
    array("shoot","shot","shot","Disparar"),
    array("show","showed","shown","Mostrar"),
    array("shrink","shrank","shrunk","Encoger"),
    array("shut","shut","shut","Cerrar"),
    array("sing","sang","sung","Cantar"),
    array("sink","sank","sunk","Hundir"),
    array("sit","sat","sat","Sentarse"),
    array("sleep","slept","slept","Dormir"),
    array("slide","slid","slidden","Deslizar"),
    array("smell","smelt","smelt","Oler"),
    array("speak","spoke","spoken","Hablar"),
    array("speed","sped","sped","Acelerar"),
    array("spend","spent","spent","Gastar"),
    array("spill","spilt","spilt","Derramar"),
    array("spin","spun","spun","Tornear"),
    array("split","split","split","Partir"),
    array("spoil","spoilt","spoilt","Deteriorar"),
    array("spread","spread","spread","Extender"),
    array("spring","sprang","sprung","Saltar,"),
    array("stand","stood","stood","Pararse"),
    array("steal","stole","stolen","Robar"),
    array("stick","stuck","stuck","Pegar"),
    array("stink","stank","stunk","apestar"),
    array("strike","struck","struck","Golpear"),
    array("swell","swelled","swollen","Hinchar"),
    array("swim","swam","swum","Nadar"),
    array("swing","swung","swung","Balancearse"),
    array("take","took","taken","Tomar"),
    array("teach","taught","taught","EnseÃ±ar"),
    array("tear","tore","torn","Romper"),
    array("tell","told","told","Decir"),
    array("think","thought","thought","Pensar"),
    array("throw","threw","thrown","Lanzar"),
    array("thrust","thrust","thrust","empujar"),
    array("undergo","underwent","undergone","Sufrir"),
    array("understand","understood","understood","Comprender."),
    array("undertake","undertook","undertaken","Emprender"),
    array("undo","undid","undone","Desarmar"),
    array("wake","woke","woken","Despertar"),
    array("wear","Wore","worn","usar."),
    array("win","Won","won","Ganar"),
    array("wind","Wound","wound","Enroscar"),
    array("withdraw","Withdrew","withdrawn","Retirar"),
    array("withstand","Withstood","withstood","Resistir")
);


$dificultad;
$huecos;
$lerror = false;
$numero = "";
$numeroErr = "";

/**
 * Controlamos que los datos sean válidos
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {   
    /**
     * Número vacío error, bandera = true
     */
    if (empty($_POST["numero"])) {
        $numeroErr = "Campo requerido *";
        $lerror = true;
        
    }
    else {
        $numero = $_POST['numero'];
    }
    
    /**
     * Dificultad Fácil Normal y Dificil
     */
    if(isset($_POST['enviar'])){
        if($_POST['dificultad'] == "facil"){
            $dificultad = "facil";
            $huecos = 3;
        }else if($_POST['dificultad'] == "normal"){
            $dificultad = "normal";
            $huecos = 2;
        }else{
            $dificultad = "dificil";
            $huecos = 1;
        }
        $numero = $_POST['numero'];
    }
}

?>
<!-- Top de la aplicación -->
<?php include 'top.php' ?>
<div><h2>Proyecto verbos irregulares</h2></div>
<?php
/**
 * Mostramos el formulario de Nivel y de Cantidad de huecos.
 */
if((!isset($_POST['enviar']) || $lerror) && !isset($_POST['comprobar'])) {
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <!-- Niveles -->
    <label for="Dificultad">Nivel</label>
    <select name="dificultad"> 
    <!-- Nivel 1 -->
    <option value="facil">Facil</option> 
    <!-- Nivel 2 -->
    <option value="normal">Media</option>
    <!-- Nivel 3 -->
    <option value="dificil">Dificil</option> 
    </select>

    <!-- Cantidad de verbos -->
    <label for="Numero de verbos">Cantidad</label>
    <!-- Mínimo 1 verbo y máximo la cantidad de verbos = 137 -->
    <input type="number" min="1" max="<?php echo count($array); ?>" name ="numero">
    <span><?php echo $numeroErr;?></span><br><br>
    <br/><br/>
    <input type="submit" name="enviar">
    <input type="reset" value="limpiar"> 
    </form>
    <?php
}

/**
 * Si le damos al botón de enviar
 * y no existen errores mostramos
 * 
 * Formulario de verbos aleatorios
 */
if(isset($_POST['enviar']) && !$lerror && !isset($_POST['comprobar'])) {
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table>
        <tr>
        <td>Infinitivo</td>
        <td>Gerundio</td>
        <td>Participio</td>
        <td>Español</td>
        </tr>
        
        <?php
        
        
        /**
         * Creo una copia del array de verbos
         */
        $arrayR = array();
        
        /**
         * Creamos un bucle según el número introducido por el usuario
         */
        for($i = 0; $i< $numero; $i++){
            /**
             * Obtenemos los verbos de forma aleatoria
             */
            do{
                $numeroAleatorioR = rand(0,count($array)-1);
                /**
                 * Sino está en el array
                 */
                if(!in_array($array[$numeroAleatorioR], $arrayR)){ 
                    $random = array(); // Array de aleatorios entre 0 y 3
                    for($j = 0; $j < $huecos; $j++){ 
                        $posicion = 0;//Declaro una posición para colocar los huecos vacíos
                        do{
                            $posicion = rand(0,3);
                            /**
                             * Coloco la posición en el array random
                             */
                            if(!in_array($posicion, $random)){
                                $random[] = $posicion;
                                break;
                            }
                            /**
                             * Los huecos no son igual a la dificulta que se asigna
                             */
                        }while(count($random)!= $huecos); 
                        /**
                         * Recorremos un bucle para rellenar el array
                         */
                        for ($p=0; $p < 4; $p++) { 
                            // Comprobamos que esta en el array
                            if(in_array($p, $random)){
                                $arrayR[$numeroAleatorioR][$p] =  $array[$numeroAleatorioR][$p];
                            }else
                            $arrayR[$numeroAleatorioR][$p] =  "";
                        }
                    }
                    break;
                }
            }while(count($arrayR)<$numero);
        }  
        
        /**
         * ForEach para recorrer el array 
         */
        foreach ($arrayR as $key => $value) {  
            /**
             * Según el número de huecos
             */
            for($j = 0; $j<$huecos; $j++){
                $random = array();// Array de posiciones aleatorias
                $posicion = 0;
                /**
                 * Posición aleatorio entre 0 y 3
                 */
                do{
                    $posicion = rand(0,3);      
                    /**
                     * Se comprueba que no está en la posición
                     */
                    if(!in_array($posicion, $random)){
                        $random[] = $posicion;
                        break;
                    }
                }while(count($random)!= $huecos);
            }
            echo "<tr>";
            foreach ($value as $indice => $val) {
                if(strtolower($val) == strtolower($array[$key][$indice])){
                    /**
                     * readonly para que no puedan escribir.
                     */
                    echo "<td><input type=\"text\" name=\"valores[".$key."][".$indice."]\" readonly=\"readonly\" style='margin:0 auto;text-align:center; color:green' value=".strtolower($val)."></input></td>";
                }
                else{
                    echo "<td><input type=\"text\" name=\"valores[".$key."][".$indice."]\" style='margin:0 auto;text-align:center; color:black' value=".strtolower($val)." ></input></td>";
                }
            }
            echo "</tr>";
        }
        ?>
        </table>
        <br/><br/>
        <input type="submit" name="comprobar" value="Comprobar">
        </form>
        <?php
}
/**
 * Botón comprobar verbos ESCRITOS
 */
if (isset($_POST['comprobar'])){
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table>
    <tr>
    <td>Infinitivo</td>
    <td>Gerundio</td>
    <td>Participio</td>
    <td>Traduccion</td>
    </tr>
    <?php
    /**
     * Obtengo valores de los inputs escritos.
     */
    foreach ($_POST['valores'] as $key => $value) {
        echo "<tr>";
        /**
         * Compruebo si está bien para pintar en verde.
         */
        foreach ($value as $indice => $val) {
            if(strtolower($val) == strtolower($array[$key][$indice])){
                echo "<td><input type=\"text\" name=\"valores[".$key."][".$indice."]\" readonly=\"readonly\" style='margin:0 auto;text-align:center; color:green' value=".strtolower($val)."></input></td>";
            }
            else{
                /**
                 * Sino, es rojo
                 */
                echo "<td><input type=\"text\" name=\"valores[".$key."][".$indice."]\" style='margin:0 auto;text-align:center; color:red' value=".strtolower($val)." ></input></td>";
            }   
        }
        echo "</tr>";
    }
    ?>
    </table>
    <br/><br/>
    <input type="submit" name="comprobar" value="Comprobar">
    </form>
    <?php
}
?> 
    <?php
echo "<a href='../../verCodigo.php?src=".__FILE__."' ><button>Ver Codigo</button></a>";
?>
    <a href="../../../"><button>Volver</button></a>
    <footer>
        <p>Página diseñada por <b>Francisco Javier Frías Serrano</b></p>
        <a href="https://github.com/Javierfs94" target="_blank"><img src="..\..\..\img\GitHub.jpg" alt="" height="50"
                width="50"></a>
        <a href="https://twitter.com/javifs94" target="_blank"><img src="..\..\..\img\Twitter.png" alt="" height="50"
                width="50"></a>
        <a href="https://es.linkedin.com/in/javifs94" target="_blank"><img src="..\..\..\img\LinkedIn.png" alt="" height="50"
                width="50"></a>
    </footer>
</body>

</html>