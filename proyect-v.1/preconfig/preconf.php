<?php
if( isset($_POST['Enviar'])){
    #### Esta parte seria crear un archivo para el FTP Server
    if(isset($_POST['FTP'])){
        $doc1 = fopen("Dockerfile.txt","w+");
        fwrite($doc1, "FROM debian:stable");
        fwrite($doc1, "\nRUN apt-get update && \\ \n");
        fwrite($doc1, "apt-get install -y vsftpd && \\ \n ");
        fwrite($doc1, "ufw allow 20/tcp && \\ \n");
        fwrite($doc1, "ufw allow 21/tcp && \\ \n");
        fclose($doc1);
        print_r(error_get_last());
        echo "Archivo creado correctamente";
    }else{
        echo "Error en la creacion del archivo";
    }
    #### Esta parte seria para crear el archivo predefinido del Web Server
    if(isset($_POST['WEB'])){
        $doc2 = fopen("Dockerfile.txt","w+");
        fwrite($doc2, "FROM ubuntu \n");
        fwrite($doc2, "RUN apt-get update && \\ \n");
        fwrite($doc2, "apt-get install -y apache2 apache2-utils && \\ \n");
        fwrite($doc2, "apt-get clean && \\ \n");
        fwrite($doc2, "EXPOSE 80 CMD [“apache2ctl”, “-D”, “FOREGROUND”]");
        fclose($doc2);
        print_r(error_get_last());
        echo "Archivo creado correctamente";
    }else{
        echo "Error en la creacion del archivo";
    }
}
?>