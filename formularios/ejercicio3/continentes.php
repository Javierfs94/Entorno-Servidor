<?php
/**
* Utilizando el array de continentes y países, crea un script que lea en un formulario un continente
* y nos muestre sus países con sus capitales y banderas.
* https://es.wikipedia.org/wiki/Anexo:Pa%C3%ADses_por_continentes
* @author Francisco Javier Frías Serrano
 */

if (isset($_GET['codigo'])) {
    highlight_file(__FILE__);
    exit;
}
?>

<h2>Leer continentes</h2>

<!--Array de los continenntes -->
<?php
    $continentes = array(
        "Europa" => (array(
            "España" => array("capital" => "Madrid", "bandera" => "imagenes/Spain.jpg"),
            "Italia" => array("capital" => "Roma", "bandera" => "imagenes/Italia.jpg"),
            "Portugal" => array("capital" => "Lisboa", "bandera" => "imagenes/Portugal.jpg"),
            "Francia" => array("capital" => "Parí­s", "bandera" => "imagenes/Francia.jpg"),
            "Rumania" => array("capital" => "Bucarest", "bandera" => "imagenes/Rumania.jpg"),
            "Luxemburgo" => array("capital" => "Luxemburgo", "bandera" => "imagenes/Luxemburgo.jpg"),
            "Alemania" => array("capital" => "Berlí­n", "bandera" => "imagenes/Alemania.jpg"),
        )),
        "America" => (array(
            "Barbados" => array("capital" => "Bridgetown", "bandera" => "imagenes/Barbados.jpg"),
            "Costa Rica" => array("capital" => "San José", "bandera" => "imagenes/CostaRica.jpg"),
            "Nicaragua" => array("capital" => "Managua", "bandera" => "imagenes/Nicaragua.jpg"),
            "Canadá" => array("capital" => "Ottawa", "bandera" => "imagenes/Canada.jpg"),
            "Chile" => array("capital" => "Chile", "bandera" => "imagenes/Chile.jpg"),
            "Brasil" => array("capital" => "Brasilia", "bandera" => "imagenes/Brasil.jpg"),
        )),

        "Asia" => (array(
            "Afganistan " => array("capital" => "Kabul", "bandera" => "imagenes/Afganistan.jpg"),
            "Rusia " => array("capital" => "Moscú", "bandera" => "imagenes/Rusia.jpg"),
            "Georgia " => array("capital" => "Tflis", "bandera" => "imagenes/Georgia.jpg"),
            "Filipinas " => array("capital" => "Manila", "bandera" => "imagenes/Filipinas.jpg"),
            "India " => array("capital" => "Nueva Delhi", "bandera" => "imagenes/India.jpg"),
            "Omán " => array("capital" => "Mascate", "bandera" => "imagenes/Oman.jpg"),
            "Japón" => array("capital" => "Tokio", "bandera" => "imagenes/Japon.jpg"),
        )),

        "Africa" => (array(
            "Botswana" => array("capital" => "Gaborone", "bandera" => "imagenes/Botswana.jpg"),
            "Cabo Verde" => array("capital" => "Praia", "bandera" => "imagenes/CaboVerde.jpg"),
            "Gambia" => array("capital" => "Banjul", "bandera" => "imagenes/Gambia.jpg"),
            "Madagascar" => array("capital" => "Antananarivo", "bandera" => "imagenes/Madagascar.jpg"),
            "Nigeria" => array("capital" => "Abuja", "bandera" => "imagenes/Nigeria.jpg"),
            "Somalia" => array("capital" => "Mogadiscio", "bandera" => "imagenes/Somalia.jpg"),
            "Togo" => array("capital" => "Lomé", "bandera" => "imagenes/Togo.jpg"),
        )),

        "Oceania" => (array(
            "Australia" => array("capital" => "Canberra", "bandera" => "imagenes/Australia.jpg"),
            "Kiribati" => array("capital" => "Tarawa Sur", "bandera" => "imagenes/Kiribati.jpg"),
            "Tonga" => array("capital" => "Nukualofa", "bandera" => "imagenes/Tonga.jpg"),
            "Nauru" => array("capital" => "Yaren", "bandera" => "imagenes/Nauru.jpg"),
            "Vanuatu" => array("capital" => "Port Vila", "bandera" => "imagenes/Vanuatu.jpg"),
            "Tuvalu" => array("capital" => "Funafuti", "bandera" => "imagenes/Tuvalu.jpg"),
            "Samoa" => array("capital" => "Apia", "bandera" => "imagenes/Samoa.jpg"),
        ))
    );

    //Si no le he dado a enviar muestra el formulario
    if(!isset($_POST['enviar'])){

    //Inicio formulario
    echo "<form action=" .htmlentities($_SERVER["PHP_SELF"]). " method=post>";
    
    echo "<select name=continentes display:block>";
   
    foreach ($continentes as $continente => $value) {
        if($_POST['continentes']==$continente)
            echo "<option name=pais value=$continentes selected>". $continente . "</option>";
        else
            echo "<option name=pais value=$continente>". $continente . "</option>";
    }
    echo "</select>";
    echo "<input type=submit name=enviar value=Enviar>";
    echo "</form>";
    //Fin formulario

    }else{
    //Crea la tabla de los paises
    echo "<table border ='1'>";
    echo "<tr>";
        echo "<th>País</th>";
        echo "<th>Capital</th>";
        echo "<th>Bandera</th>";
    echo "</tr>";
    echo "<tr>";
    foreach ($continentes as $continente => $paises) {
        if($continente==$_POST['continentes'])
            foreach ($paises as $pais => $info) {
                echo "<td>" . $pais . "</td>";
                    foreach ($info as $continente => $value) {
                        if($continente=='capital')
                            echo "<td>". $value. "</td>";
                        else
                        echo "<td><img src='$value' style='width: 75px; height: 75px;'></td>";
                    }
                echo "</tr>";
            }
        }
    echo "</table>";
    }
     
echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>
<a href="../../../"><button>Volver</button></a>