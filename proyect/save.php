<?php
if( isset($_POST['Enviar'])){
#Los 3 primeros IF muestran por pantalla el formato del archivo el como ha elegido el usuario.
        if(isset($_POST['IMAGENES'])){
            echo "FROM ";
            foreach ($_POST['IMAGENES'] as $image){
                echo $image . " : ";
            if(isset($_POST['VERSION'])){
                foreach($_POST['VERSION'] as $version){
                    echo $version;
                }
            }else{
                echo "Error.No has seleccionado nada";
            }
                echo "<br>";
            }
        }else{
            echo "Error.No has seleccionado nada";
        }

        if(isset($_POST['ACTUALIZAR'])){
            echo "RUN apt-get ";
            foreach ($_POST['ACTUALIZAR'] as $actualizar){
                echo $actualizar . " ";
            }
            echo '&&';
            echo "<br>";
        }

        if(isset($_POST['APLICACIONES'])){
            echo "apt-get install -y ";
            foreach ($_POST['APLICACIONES'] as $aplicaciones) {
                echo $aplicaciones . " "  ;
            }
            echo "&& ";
        }else{
            echo "Error.No has seleccionado nada";
        }
}
?>