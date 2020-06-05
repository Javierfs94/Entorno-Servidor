<?php

if ($_SESSION["perfil"] != "user") {
    header("Location: index.php");
}

if ($_SESSION["estado"] == "activo") {

if (isset($_POST["subida"])) {

        $documento = "file".date("HisdmY").".jpg";
        
        move_uploaded_file($_FILES["fichero"]["tmp_name"], "./users/".$_SESSION["usuario"]."/".$documento);
        
        $datos = array(
            'idUsuario' => $_SESSION["idUser"],
            'descripcion' => $_POST["descripcion"],
            'fichero' => $documento
        );

        $_SESSION["documento"]->set($datos);

        echo "<p>Archivo subido con éxito</p>";
    }

    echo "<form enctype='multipart/form-data'  action=".$_SERVER["PHP_SELF"]."?page=user"." method='post'>
        <input type='text' name='descripcion' value='' required>
        <input type='hidden' name='MAX_FILE_SIZE' value='500000'>
        <input type='file' name='fichero' value='' required>
        <input type='submit' value='Subir fichero' name='subida'>
    </form>";

    echo "<p>Listado de Documentos</p>";
    $documentos = $_SESSION["documento"]->mostrarDocumentos($_SESSION["idUser"]);
        
    echo "<table>
    <tr>
    <th>Documentos</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>Acción</th>
    </tr>
    ";
      foreach ($documentos as $key) {
        echo "<tr>
        <td>".$key["descripcion"]."</td>
        <td>".$key["estado"]."</td>
        <td>".$key["fechaFirma"]."</td>
        </tr>";
      }  
      echo "</table>";

}

if ($_SESSION["estado"] == "pendiente") {
    echo "<p>Su solicitud de usuario está pendiente de validación</p>";
}

if ($_SESSION["estado"] == "bloqueado") {
    echo "<p>Ha sido bloqueado por el consejo supremo</p>";
}




?>