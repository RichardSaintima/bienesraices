<?php
    require 'includes/app.php';
    incluirTemplate('header')
?>
    
    
    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Texto entrada nosotros">
                </picture>
            </div>
            <div class="texto">
                <blockquote> 2 Años experiencia</blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, doloribus? Deserunt, aperiam veritatis molestias aspernatur exercitationem explicabo hic, fuga facilis necessitatibus voluptatem quaerat, ex ipsam incidunt soluta optio accusantium? Pariatur Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus libero eveniet veritatis cumque necessitatibus modi nisi perferendis fugit aperiam dolorum dolore, natus inventore, est aliquam eligendi provident possimus nobis commodi.
                </p>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium doloribus esse recusandae animi sed porro enim explicabo est non placeat et at corporis ipsum quia temporibus iusto, suscipit sapiente expedita.
                </p>                
            </div>

            
        </div>
    </main>


    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="iconos">
                <img src="build/img/icono1.svg" alt="iconos seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit perspiciatis, debitis sed similique nesciunt distinctio, libero eum ut consequuntur ratione amet dignissimos sequi quis in a ad omnis. Ullam, est!</p>
            </div>
            <div class="iconos">
                <img src="build/img/icono2.svg" alt="iconos Prexio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit perspiciatis, debitis sed similique nesciunt distinctio, libero eum ut consequuntur ratione amet dignissimos sequi quis in a ad omnis. Ullam, est!</p>
            </div>
            <div class="iconos">
                <img src="build/img/icono3.svg" alt="iconos Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit perspiciatis, debitis sed similique nesciunt distinctio, libero eum ut consequuntur ratione amet dignissimos sequi quis in a ad omnis. Ullam, est!</p>
            </div>
        </div>
    </section>

    <?php
        incluirTemplate('footer');
    ?>