<?php

function imprimeUsuarios($resultados){
    echo "<h2>Usuarios encontrados</h2>";
    echo "<table>";
        echo "<tr>
        <th>Usuarios</th>
        <th>Claves</th>
        </tr>";
            foreach ($resultados as $usuario) {
                echo "<tr>";
                    echo "<td>".$usuario['usuario']."</td>";
                echo "</tr>";
            }
    echo "</table>";
}

?>