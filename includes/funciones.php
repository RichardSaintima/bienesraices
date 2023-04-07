<?php


define("TEMPLATES_URL", __DIR__ . "/templates");
define("FUNCIONES_URL", __DIR__ . "funciones.php");
define("CARPETA_IMAGENES", __DIR__ . "../../imagenes/");

function incluirTemplate(string $nombre,bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
}

function esAutenticado(){
    session_start();
    if(!$_SESSION['login']){
        header('location: /bienesraices/index.php');
    }
}


function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
    
}


// Escapar /Sanatizar  el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// validar tipo de contenido
function validarTipoContenido($tipo) {
    $tipos = ['vendedor' , 'propiedad'];

    return in_array($tipo , $tipos);
}
