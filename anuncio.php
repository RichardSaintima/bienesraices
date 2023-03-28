<?php

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
       header('location: /bienesraices/index.php?resultado=4');
    }

    // Importar la conexion
    require 'includes/app.php';
    $bd = conectarBD();

    // Escribie el query
    $query= "SELECT * FROM propiedades WHERE id =${id}";
    
    // Consultar la  BD
    $resulta = mysqli_query($bd, $query);
    
    if(!$resulta-> num_rows){
        header('location: /bienesraices/index.php');
    }
    $propiedad = mysqli_fetch_assoc($resulta);


    incluirTemplate('header')
?>
    
    
    
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

            <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>.jpg"" alt="Imagen de la Propiedad">


        <div class="resumen-propiedad">
            <div class="precio">$<?php echo $propiedad['precio']; ?></div>
            <ul class="icono-caracteristicos">
                <li>
                    <img  class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamientos']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <div class="co">
                <?php echo $propiedad['descripcion']; ?>
            </div>
            
        </div>
    </main>

    <?php
        mysqli_close($bd);

        incluirTemplate('footer');
    ?>