<?php

if ($_SESSION["perfil"] != "basico" && $_SESSION["perfil"] != "premium") {
    header("Location: index.php");
} else {
    if (isset($_GET["visualizarEncuesta"])) {
        $array = $_SESSION["encuesta"]->getPreguntas($_GET["visualizarEncuesta"]);
            echo "<table>";
            echo "<tr>
            <th>Puntuación Desde Hasta</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            </tr>";
            echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=userEncuestas>";
                foreach ($array as $encuestasPreguntas) {
                    echo "<tr>";
                        echo "<td>".$encuestasPreguntas['pregunta']."</td>";
                        echo "<td><input type = 'radio' name='puntos".$encuestasPreguntas['id']."' value='1'></td>";
                        echo "<td><input type = 'radio' name='puntos".$encuestasPreguntas['id']."' value='2'></td>"; 
                        echo "<td><input type = 'radio' name='puntos".$encuestasPreguntas['id']."' value=''></td>"; 
                        echo "<td><input type = 'radio' name='puntos".$encuestasPreguntas['id']."' value='4'></td>"; 
                        echo "<td><input type = 'radio' name='puntos".$encuestasPreguntas['id']."' value='5'></td>"; 
                    echo "</tr>";
                }
                echo "<input type='submit' name='enviarEncuesta' value='Enviar encuesta'>";
            echo " </form>
            </table>";
            if (isset($_POST["enviarEncuesta"])) {
                echo "RESPUESTAS ENVIADAS";
                // $_SESSION["encuesta"]->setRespuestas();
            }
        } else{
            $array = $_SESSION["encuesta"]->getDatos();
            echo "<h2>Encuestas disponibles</h2>";
            echo "<table>";
                echo "<tr>
                <th>Titulo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                </tr>";
                echo "<form metho='post' action=".$_SERVER["PHP_SELF"]."?page=userEncuestas>";
                    foreach ($array as $encuestas) {
                        echo "<tr>";
                            echo "<td>".$encuestas['Titulo']."</td>";
                            echo "<td>".$encuestas['fechaHoraInicio']."</td>";
                            echo "<td>".$encuestas['fechaHoraFinal']."</td>";
                            echo "<td><button id='visualizarEncuesta'><a href="."index.php?page=userEncuestas&visualizarEncuesta=".$encuestas["id"].">Realizar encuesta</a></button></td>";                        
                            echo "</tr>";
                    }
                echo "</table>";
        }

}

?>