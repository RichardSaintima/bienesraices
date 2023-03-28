<?php
    require 'includes/app.php';
    incluirTemplate('header')
?>
    
    
    
    <main class="contenedor seccion">
        <h1>Contactos</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Texto entrada blog">

            <h2>Llene el formulario de contacto</h2>

            <form class="formulario" action="">
                <fieldset>
                    <legend>Imformacion personal</legend>

                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="Tu Nombre" id="nombre">

                    <label for="email">E-mail</label>
                    <input type="email" placeholder="Tu Correo" id="email">

                    <label for="telefono">Telefono</label>
                    <input type="tel" placeholder="Tu Telefono" id="telefono">

                    <label for="mesaje">Mensaje</label>
                    <textarea  id="mesaje"></textarea>
                </fieldset>

                <fieldset>
                    <legend>Informacion sobre la propiedad</legend>

                    <label for="opciones">Vende o Compra:</label>
                    <select name="" id="opciones">
                        <option value="" disabled selected>--Seleccionar--</option>
                        <option value="compra">Compra</option>
                        <option value="vender">Vender</option>
                    </select>

                    <label for="presupresto">Cantidad</label>
                    <input type="number" placeholder="Tu Presupresto" id="presupresto">
                </fieldset>

                <fieldset>
                    <legend>Informacion sobre la propiedad</legend>

                    <p>Como desea sser contactado</p>
                    <div class="forma-contactar">
                        <label for="contactar-telefono">Telefono</label>
                        <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                        <label for="contactar-email">E-mail</label>
                        <input name="contacto" type="radio" value="email" id="contactar-email">
                    </div>

                    <p>Elige la fecha y la hora</p>
                    
                    <label for="fecha">Fecha:</label>
                    <input type="date"  id="fecha">

                    <label for="hora">Telefono:</label>
                    <input type="time"  id="hora" min="08:30" max="18:00">
                    
                </fieldset>

                <input type="submit" value="Enviar" class="boton-verde">
            </form>
        </picture>
    </main>

    <?php
        incluirTemplate('footer');
    ?>
