<?php

require '../../includes/app.php';

use App\Vendedor;

esAutenticado();

$vendedor = new Vendedor;

// Arreglo con mensajes de vendedores
$errores = Vendedor::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD']==='POST'){

    // Crear una Instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validar que no haya campos vacios
    $errores = $vendedor->validar();
    
    if(empty($errores)){
        $vendedor -> guardar();
    }
}



incluirTemplate('header')
?>

<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde"> Volver</a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                 <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" action="/bienesraices/admin/vendedores/crear.php">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registar Vendedor(a)" class="boton boton-verde">
        </form>
</main>




<?php
    incluirTemplate('footer');
?>