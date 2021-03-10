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
Ya he conseguido crear el dockerfile con las opciones que el usuario desea usando el parametro "Fopen".
* El codigo quedaria mas o menos de esta manera
  ```
                $doc = fopen("Dockerfile.txt","w+");
                fwrite($doc, "FROM " .$image. ":" .$version);
                fwrite($doc, "\nRUN apt-get " .$actualizar." && \\ \n");
                fwrite($doc, "apt-get install -y ".$aplicaciones. " \\ \n");
                fwrite($doc, "EXPOSE 80 443");
                fclose($doc);
                print_r(error_get_last());
  ```
* Tambien he avanzado en el apartado de la creacion del contenedor usando el dockerfile creado usando este pequeño codigo.
````
  if (isset($_POST['crear'])){
    $nombre = $_POST['NOMBRE'];
    foreach($nombre as $key => $i){
        print "Tu contenedor se ha creado con el nombre de: " .$i. "\n";
        exec("docker build -f .\Dockerfile.txt -t " .$i. " .");
    }
}
````
* Basicamente aqui almaceno el nombre que elige el usuario en una variable y luego la utilizo en el comando para crear dicho contenedor.
* Tambien he creado un apartado donde poder eliminar el rastro de los dockerfiles
  ````
  if( isset($_POST['borrar'])){
    exec("del Dockerfile.txt");
    print "Registro limpio";
    }else{
        echo "Error al procesar el programa";
    }
  ````
<p>Ahora tengo que lidiar con las variables y pensar como hacer que guarden mas de una opcion, pese a que por pantalla me muestra el como deberia de verse un Dockerfile, en el archivo de configuracion no queda igual.
<p>Tambien quiero intentar hacer una seccion donde hay varios tipos de contenedores preconfigurados para que el usuario eliga el que quiera y ya lanzarlos directamente.