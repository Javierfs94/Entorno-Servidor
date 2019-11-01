<?php
session_start();

print "<p>El nombre es $_SESSION[nombre]</p>";
?>




<?php
echo "<a href='../../verCodigo.php?src=".__FILE__."' ><button>Ver Codigo</button></a>";
?>
<a href="../../../"><button>Volver</button></a>