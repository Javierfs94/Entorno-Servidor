<?php
require "phpmailer/class.phpmailer.php";

$mail = new PHPMailer();

   
    if (isset($_POST["subida"])) {
        echo $_POST["nombre"]."<br>";
        
        echo "<pre>";
        print_r($_FILES["fichero"]);
        echo "</pre>";
        
        if (!file_exists("ficheros_subidos")) {
            mkdir("ficheros_subidos", 0777, true);
        }
        
        $imagen = "file".date("HisdmY").".jpg";

        // move_uploaded_file($_FILES["fichero"]["tmp_name"], "ficheros_subidos/".$_FILES["fichero"]["name"]);
        move_uploaded_file($_FILES["fichero"]["tmp_name"], "ficheros_subidos/".$imagen);
        
            $mail->CharSet = "utf-8";
            $mail->From = "javifs94developer@gmail.com";
            $mail->FromName = "Admin";
            $mail->Subject = "Esto es una prueba";
        
            $mail->addAddress("javifs94developer@gmail.com","");
            $mail->msgHTML("Abreme");
        
            $mail->addAttachment("ficheros_subidos/".$imagen);
         
            if ($mail->send()) {
                echo "Hola que tal mi amor";
            } else {
                echo "Ha fallido";
            }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tests</title>
</head>
<body>
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="nombre" value="">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
    <input type="file" name="fichero" value="">
    <input type="submit" value="Subir fichero" name="subida">
    </form>
</body>
</html>