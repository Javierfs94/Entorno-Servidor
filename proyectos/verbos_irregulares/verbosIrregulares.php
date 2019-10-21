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
//Verbos irregulares
$arrayVerbosIrregulares = array(
        array("elevarse","arise","arose","arisen"),
        array("despertar","awake","awoke","awoken"),
        array("soportar","bear","bore","born"),
        array("golpear","beat","beat","beaten"),
        array("convertirse en","become","became","become"),
        array("empezar","begin","began","begun"),
        array("doblar","bend","bent","bent"),
        array("apostar","bet","bet","bet"),
        array("atar","bind","bound","bound"),
        array("morder","bite","bit","bitten"),
        array("soplar","blow","blew","blown"),
        array("quebrar","break","broke","broken"),
        array("traer","bring","brought","brought"),
        array("construir","build","built","built"),
        array("quemar","burn","burnt","burnt"),
        array("romper","burst","burst","burst"),
        array("comprar","buy","bought","bought"),
        array("coger","catch","caught","caught"),
        array("escoger","choose","chose","chosen"),
        array("aferrarse","cling","clung","clung"),
        array("venir","come","came","come"),
        array("costar","cost","cost","cost"),
        array("arrastrarse","creep","crept","crept"),
        array("cortar","cut","cut","cut"),
        array("tratar","deal","dealt","dealt"),
        array("cavar","dig","dug","dug"),
        array("hacer","do","did","done"),
        array("tirar","draw","drew","drawn"),
        array("beber","drink","drank","drunk"),
        array("conducir","drive","drove","driven"),
        array("caer","fall","fell","fallen"),
        array("alimentar","feed","fed","fed"),
        array("sentir","feel","felt","felt"),
        array("pelear","fight","fought","fought"),
        array("encontrar","find","found","found"),
        array("averiguar","findout","foundout","foundout"),
        array("escapar","flee","fled","fled"),
        array("volar","fly","flew","flown"),
        array("prohibir","forbid","forbade","forbidden"),
        array("prevenir","foresee","foresaw","foreseen"),
        array("olvidar","forget","forgot","forgotten"),
        array("perdonar","forgive","forgave","forgiven"),
        array("congelar","freeze","froze","frozen"),
        array("lograr","get","got","gotten"),
        array("dar","give","gave","given"),
        array("funcionar","go","went","gone"),
        array("moler","grind","ground","ground"),
        array("crecer","grow","grew","grown"),
        array("colgar","hang","hung","hung"),
        array("tener","have","had","had"),
        array("oír","hear","heard","heard"),
        array("ocultar","hide","hid","hidden"),
        array("pegar","hit","hit","hit"),
        array("sostener","hold","held","held"),
        array("herir","hurt","hurt","hurt"),
        array("mantener","keep","kept","kept"),
        array("conocer","know","knew","known"),
        array("poner","lay","laid","laid"),
        array("guiar","lead","led","led"),
        array("inclinar","lean","leant","leant"),
        array("aprender","learn","learnt","learnt"),
        array("partir","leave","left","left"),
        array("prestar","lend","lent","lent"),
        array("permitir","let","let","let"),
        array("tenderse","lie","lay","lain"),
        array("alumbrar","light","lit","lit"),
        array("perder","lose","lost","lost"),
        array("hacer","make","made","made"),
        array("significar","mean","meant","meant"),
        array("encontrar","meet","met","met"),
        array("derretir","melt","melted","molten"),
        array("equivocarse","mistake","mistook","mistaken"),
        array("malentender","misunderstand","misunderstood","misunderstood"),
        array("vencer","overcome","overcame","overcome"),
        array("pagar","pay","paid","paid"),
        array("poner","put","put","put"),
        array("leer","read","read","read"),
        array("reconstruir","rebuild","rebuilt","rebuilt"),
        array("librarse","rid","rid","rid"),
        array("rodar","ride","rode","ridden"),
        array("tocar","ring","rang","rung"),
        array("ascender","rise","rose","risen"),
        array("correr","run","ran","run"),
        array("serrar","saw","sawed","sawn"),
        array("decir","say","said","said"),
        array("ver","see","saw","seen"),
        array("buscar","seek","sought","sought"),
        array("vender","sell","sold","sold"),
        array("enviar","send","sent","sent"),
        array("instalar","set","set","set"),
        array("sacudir","shake","shook","shaken"),
        array("derramar","shed","shed","shed"),
        array("brillar","shine","shone","shone"),
        array("disparar","shoot","shot","shot"),
        array("mostrar","show","showed","shown"),
        array("encoger","shrink","shrank","shrunk"),
        array("cerrar","shut","shut","shut"),
        array("cantar","sing","sang","sung"),
        array("hundir","sink","sank","sunk"),
        array("sentarse","sit","sat","sat"),
        array("dormir","sleep","slept","slept"),
        array("deslizar","slide","slid","slidden"),
        array("oler","smell","smelt","smelt"),
        array("hablar","speak","spoke","spoken"),
        array("acelerar","speed","sped","sped"),
        array("gastar","spend","spent","spent"),
        array("derramar","spill","spilt","spilt"),
        array("hacer girar","spin","spun","spun"),
        array("partir","split","split","split"),
        array("deteriorar","spoil","spoilt","spoilt"),
        array("extender","spread","spread","spread"),
        array("saltar","spring","sprang","sprung"),
        array("pararse","stand","stood","stood"),
        array("robar","steal","stole","stolen"),
        array("pegar","stick","stuck","stuck"),
        array("apestar","stink","stank","stunk"),
        array("golpear","strike","struck","struck"),
        array("hinchar","swell","swelled","swollen"),
        array("nadar","swim","swam","swum"),
        array("balancearse","swing","swung","swung"),
        array("tomar","take","took","taken"),
        array("enseñar","teach","taught","taught"),
        array("romper","tear","tore","torn"),
        array("decir","tell","told","told"),
        array("pensar","think","thought","thought"),
        array("lanzar","throw","threw","thrown"),
        array("empujar","thrust","thrust","thrust"),
        array("sufrir","undergo","underwent","undergone"),
        array("comprender","understand","understood","understood"),
        array("emprender","undertake","undertook","undertaken"),
        array("desarmar","undo","undid","undone"),
        array("despertar","wake","woke","woken"),
        array("usar","wear","Wore","worn"),
        array("ganar","win","Won","won"),
        array("enroscar","wind","Wound","wound"),
        array("retirar","withdraw","Withdrew","withdrawn"),
        array("resistir","withstand","Withstood","withstood")
    ); 



?>


<!-- Formulario para pedir los Verbos Irregulares -->
<form action="" method="post">

<input type="button" name="enviar">
<input type="reset" value="limpiar">
</form>


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