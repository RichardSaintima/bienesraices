<?php
    require 'includes/app.php';
    incluirTemplate('header')
?>
    
    
<main class="contenedor seccion">
    <h3>Casas y Depas en ventas</h3>

    <?php
        $limite=10;
        include 'includes/templates/anuncios.php';
    ?>
</main>

<?php
    incluirTemplate('footer');
?>