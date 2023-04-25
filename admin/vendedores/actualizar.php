<?php

require '../../includes/app.php';
use App\Vendedor;
esAutenticado();


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location; /'); 
}

// Obtener el Array del vendedor
$vendedor = Vendedor::find($id);

// Arreglo con mensajes de vendedores
$errores = Vendedor::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD']==='POST'){
    // Asignar los Valores
    $args = $_POST['vendedor'];
    
    // Sincronizar en memoria con lo que el usuario escribio 
    $vendedor-> sincronizar($args);

    // Validacion
    $errores = $vendedor->validar();
    
    if(empty($errores)){ 
        // Guardar en la bases de datos
        $vendedor->guardar();

    }
}



incluirTemplate('header')
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin" class="boton boton-verde"> Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
                <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" >
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>
</main>




<?php
    incluirTemplate('footer');
?>