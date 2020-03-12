<h2>Perfil Usuario</h2>

<?php

    $perfil="";
  
    echo "Estás como: ".$perfil."<br>";

    if($perfil=="admin")  {
        echo "<ul><li>Opcion 1</li>
        <li>Opcion 2</li>
        <li>Opcion 3</li>
        <li>Opcion 4</li>
        <li>Opcion 5</li></ul>";
    } elseif ($perfil=="usuario") {
        echo "<ul><li>Opcion 1</li>
        <li>Opcion 2</li>
        <li>Opcion 3</li></ul>";
    }else {
        echo "No está logeado";
    }
        
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>