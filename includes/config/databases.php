<?php

function conectarBD() : mysqli{
    $bd = new mysqli('localhost' , 'root' , 'admin' , 'bienesraices_crud');

    if(!$bd){
        echo "Error no se pudo conectar";
        exit;
    }

    return $bd;
}
