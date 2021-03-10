# Contenido nuevo
Despues de 1 semana larga de resfriado y horas de lectura he conseguido hacer el control de errrores, la primera vez intente hacerlo con las variables de los POST donde se almacenaban los checkbos, pero me daba error de sintaxis asi que me he decantado por lo clasico.
```
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

        if(isset($_POST['APLICACIONES'])){
            echo "apt-get install -y ";
            foreach ($_POST['APLICACIONES'] as $aplicaciones) {
                echo $aplicaciones . " "  ;
            }
            echo "&& ";
        }else{
            echo "Error.No has seleccionado nada";
        }
        if( isset($_POST['monitor'])){
            exec("docker ps");
        }else{
            echo "Error al procesar el programa";
        }
```
Poco mas puedo decir del programa, sigo intentando hacer que guarde el archivo de configuracion con mas de una opcion elegida del checkbox.