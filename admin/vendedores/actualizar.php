<?php

require '../../includes/app.php';

use App\Vendedor;

esAutenticado();

$vendedor = new Vendedor;

// Arreglo con mensajes de vendedores
$errores = Vendedor::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD']==='POST'){

}



incluirTemplate('header')
?>

<main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde"> Volver</a>

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