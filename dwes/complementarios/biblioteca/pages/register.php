<?php

if (isset($_POST["register"])) {
  $datos = array(
      'nombre' => $_POST["nombre"],  
      'apellidos' => $_POST["apellidos"],
      'dni' => $_POST["dni"],
      'usuario' => $_POST["usuario"],
      'pass' => $_POST["password"],
      'estado' => "pendiente",
      'perfil' => "lector"
  );
  
  if (sizeof($_SESSION["user"]->get($datos["usuario"])) == 1) {
    $_SESSION["user"]->getMensaje();
  }else {
    $_SESSION["user"]->set($datos);
    $_SESSION["user"]->getMensaje();
  }
}

echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=register"." name='signin-form'>
  <div class='form-element'>
      <label>Nombre</label>
      <input type='text' name='nombre' required />
  </div>

  <div class='form-element'>
      <label>Apellidos</label>
      <input type='text' name='apellidos' required />
  </div>

  <div class='form-element'>
      <label>DNI</label>
      <input type='text' name='dni' required />
  </div>

  <div class='form-element'>
    <label>Usuario</label>
    <input type='text' name='usuario' required />
  </div>

  <div class='form-element'>
    <label>Password</label>
    <input type='password' name='password' required />
  </div>
  
  <button type='submit' name='register' value='login'>Crear cuenta</button>
</form>";
?>