<?php

if ($_SESSION["perfil"] != "admin") {
  header("Location: index.php");
}else {

  if (isset($_GET["habilitar"])) {
    $_SESSION["serie"]->habilitar($_GET["habilitar"]);
  }
  
  if (isset($_GET["deshabilitar"])) {
    $_SESSION["serie"]->deshabilitar($_GET["deshabilitar"]);
  }
  
  if (isset($_POST["addSerie"])) {
    $datos = array(
        'titulo' => $_POST["titulo"],  
        'img' => $_FILES["imagen"]["name"],
        'estado' => "habilitado"
    );
  
    echo "<pre>";
    print_r($_FILES["imagen"]);
    echo "</pre>";
  
    move_uploaded_file($_FILES["imagen"]["tmp_name"], "./img/".$_FILES["imagen"]["name"]);
  
    $_SESSION["serie"]->set($datos);
    header("Location: index.php?page=adminSeries");
    $_SESSION["serie"]->getMensaje();
  }
  
  echo "<p>Listado de Series</p>";

  $series = $_SESSION["serie"]->mostrarSeries();
  echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=adminSeries>
  <input type='submit' name='nuevaSerie' value='Nueva serie'>  
  </form>";

  
   if (isset($_POST["nuevaSerie"])) {
     echo "<h2>Añadir una nueva serie</h2>
     <form method='post' action=".$_SERVER["PHP_SELF"]."?page=adminSeries"." name='signin-form' enctype='multipart/form-data'>
         <div class='form-element'>
             <label>Titulo</label>
             <input type='text' name='titulo' required />
         </div>
         <div class='form-element'>
             <label>Imagen</label>
             <input type='hidden' name='MAX_FILE_SIZE' value='500000'>
             <input type='file' name='imagen' value='' required>
             </div>
         <button type='submit' name='addSerie' value='login'>Añadir serie</button>
     </form>";
   } else {
       
  echo "<table>
  <tr>
  <th>Titulo</th>
  <th>Imagen</th>
  <th>Estado</th>
  <th>Habilitar</th>
  <th>Deshabilitar</th>
  </tr>
  ";
  echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=adminSeries>";
    foreach ($series as $key) {
      echo "<tr>
      <td>".$key["titulo"]."</td>
      <td><img src=./img/".$key["img"]." alt='Imagen de la serie' width='250' height='250'></td>
      <td>".$key["estado"]."</td>
      <td><button id='habilitar'><a href="."index.php?page=adminSeries&habilitar=".$key["id"].">Habilitar</a></button></td>
      <td><button id='deshabilitar'><a href="."index.php?page=adminSeries&deshabilitar=".$key["id"].">Deshabilitar</a></button></td>
      </tr>"; 
    }
    echo "
    </form>
    ";  
    echo "</table>";
  }

}

?>