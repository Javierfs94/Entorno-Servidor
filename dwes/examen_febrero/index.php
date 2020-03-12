
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>PHPBookmark</title>
</head>
<nav>
    <?php include("includes/menu.php"); ?>
</nav>
<body>
    <header>    
        <img src="img/php.png" alt="" srcset=""><h1>PHPBookmark</h1>
    </header>

<?php 
if (isset($_GET["page"])){
    if (($_GET["page"]=="index")) {
        include("index.php"); 
    }
    if (($_GET["page"]=="register")) {
        include("pages/register.php"); 
    }
    if (($_GET["page"]=="member")) {
        include("pages/member.php"); 
    }
    if (($_GET["page"]=="add")) {
        include("pages/add.php"); 
    }
    if (($_GET["page"]=="delete")) {
        include("pages/delete.php"); 
    }
    if (($_GET["page"]=="recommend")) {
        include("pages/recommend.php"); 
    }
    if (($_GET["page"]=="register_new")) {
        include("pages/register_new.php"); 
    }
}else {
    include("pages/home.php");
}
?>

<?php include("includes/footer.php"); ?>

</body>
</html>