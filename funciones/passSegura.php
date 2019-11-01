<?php
/*
* Titulo: EjercicioDNI
* Descripcion: Escribe una función que permita validar contraseñas seguras. Una contraseña segura debe tener una longitud mínima de 8 caracteres y contener al menos: Una letra minúscula, una letra mayúscula, un dígito y un carácter especial. 
* Utilizar la función en un formulario de registro.  
* Autor: Francisco Javier Frías Serrano
*/
?>

<div>
    <h2>Validar ContraseÃ±as</h2>
</div>

<?php

        $errorFormulario=false;
        $passError="";
        $pass="";
        $msgError="";

        /**
         * Formulario de contraseÃ±a para su validaciÃ³n
         */
        if(!isset($_POST['enviar']) || $errorFormulario){?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                ContraseÃ±a
                <input type="text" name="pass">
                <?php echo $passError;?><br/><br/>
                <input type="submit" name="enviar">
            </form>

            <?php 
        }
        else{?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                ContraseÃ±a
                <input type="text" name="pass">
                <?php echo $passError;?><br/><br/>
                <input type="submit" name="enviar">
            </form>
            <?php
            if(validar($pass,$msgError))
                echo "ContraseÃ±a segura --> ". $pass;
            else
                echo "ContraseÃ±a no segura.</br></br>".$msgError;
        }
        
        /**
         * Comprobamos si la contrseÃ±a es valida segÃºn:
         * 8 caracteres
         * minusculas
         * mayusculas
         * 
         */
        function validar($pass,&$msgError){
            $isValid=true;
            //strlen - lenght de la cadena
            if(strlen($pass)<8){
                $msgError="La contraseÃ±a debe tener al menos 8 caracteres";
                $isValid=false;
            }
            //Expresion regular entre `[]`
            if (!preg_match('`[a-z]`',$pass)){
                if($isValid==true){
                    $msgError="La contraseÃ±a debe tener al menos una letra minÃºscula";
                    $isValid=false;
                }
            }
            if (!preg_match('`[A-Z]`',$pass)){
                if($isValid==true){
                    $msgError="La contraseÃ±a debe tener al menos una letra mayÃºscula";
                    $isValid=false;
                }
            }
            if (!preg_match('`[0-9]`',$pass)){
                if($isValid==true){
                    $msgError="La contraseÃ±a debe tener al menos un nÃºmero";
                    $isValid=false;
                }
            }
            return $isValid;
        }
    ?>

<?php
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
    <a href="../../../"><button>Volver</button></a>