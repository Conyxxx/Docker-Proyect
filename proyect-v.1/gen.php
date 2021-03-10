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
                #Funcion de guardar en un archivo de texto
                $doc = fopen("Dockerfile.txt","w+");
                fwrite($doc, "FROM " .$image. ":" .$version);
                fwrite($doc, "\nRUN apt-get " .$actualizar." && \\ \n");
                fwrite($doc, "apt-get install -y ".$aplicaciones. " \\ \n");
                #fwrite($doc, "EXPOSE 80 443");
                fclose($doc);
                print_r(error_get_last());
}
##Crear contenedor con un nombre
if (isset($_POST['crear'])){
    $nombre = $_POST['NOMBRE'];
    foreach($nombre as $key => $i){
        print "Tu contenedor se ha creado con el nombre de: " .$i. "\n";
        exec("docker build -f .\Dockerfile.txt -t " .$i. " .");
    }
}

##quitar dockerfile
if( isset($_POST['borrar'])){
    exec("del Dockerfile.txt");
    print "Registro limpio";
}else{
    echo "Error al procesar el programa";
}
?>