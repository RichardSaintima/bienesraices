<?php
    require '../../includes/app.php';
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    esAutenticado();


    $propiedad =new Propiedad;

    // Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();


    // Arreglo con mensajes de vendedores
    $errores = Propiedad::getErrores();

    // Ejecuta el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){

        // Crear una nueva Instancia
        $propiedad =new Propiedad($_POST['propiedad']);
    

        /* SUBIDA DE IMAGENES */
        //Generar Nombre unico 
        $nombreImagen = md5(uniqid(rand(),true) ).".jpg";
        
        // Settear la Imagen
        // Realizar un Resize a ña Imagen con Intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image =Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(600, 360);
            $propiedad->setImagen($nombreImagen);
        }      


        // Validar
        $errores = $propiedad->validar();

        // Revisar que el array esta vacio
        if(empty($errores)){  

            // Crear una Carpeta
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
            // Guardar la Imagen el el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            // Guardar en la bases de datos
            $propiedad->guardar();

        }
    }

    incluirTemplate('header')
?>


    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde"> Volver</a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                 <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propidad" class="boton boton-verde">
        </form>
    </main>




<?php
    incluirTemplate('footer');
?>