<?php

function imprimeSeries($resultados){
            foreach ($resultados as $serie) {
                echo "<p>
                <h2>".$serie["titulo"]."</h2>
                <p><img src=./img/".$serie["img"]." alt='Imagen de la serie' width='250' height='250'></p>
                ".($_SESSION['serie']->getFavoritos($_SESSION["idUser"], $serie["id"]) ?  "<button id='desFavorito'><a href="."index.php?page=user&desFavorito=".$serie["id"].">Quitar favorito</a></button>" : "<button id='favorito'><a href="."index.php?page=user&favorito=".$serie["id"].">Favorito</a></button>" )."
                </p>"; 
            }
}

?>