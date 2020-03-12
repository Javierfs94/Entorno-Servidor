<?php
echo '
<ul>
<li>Store your bookmarks online with us!</li>
<li>See what other users use!</li>
<li>Share your favorite links with others!</li>
</ul>
<a href="index.php?page=register">Not a member?</a>
<div id="login">
    <p>Members log in here</p>
    <form action="index.php" method="POST">
        Username: <input name="username" type="text"><br>
        Password: <input name="passwd" type="text"><br>
        <input type="hidden" name="validar">
        <input type="submit" value="Log in">
    </form>
    <button>RECORDAR CONTRASEÑA</button>
</div>
';
?>    
