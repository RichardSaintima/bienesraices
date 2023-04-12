<?php
    
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;
        
    require '../../includes/app.php';

    esAutenticado();

    // Validar la URL valido por Id Valido
    $id = $_GET['id'];
    $id = filter_var($id , FILTER_VALIDATE_INT);

    if(!$id){
        header('location: /admin');
    }

    // Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de vendedores
    $errores = Propiedad::getErrores();


    // Ejecuta el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){

        // Asignar el atributos
        $args=$_POST['propiedad'];

        $propiedad -> sincronizar($args);


        // Validacion
        $errores= $propiedad->validar();

        /* SUBIDA DE IMAGENES */
        //Generar Nombre unico 
        $nombreImagen = md5(uniqid(rand(),true) ).".jpg";
        
        // Settear la Imagen
        // Realizar un Resize a ña Imagen con Intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image =Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(600, 360);
            $propiedad->setImagen($nombreImagen);
        }      
        // Revisar que el array esta vacio
        if(empty($errores)){
            if($_FILES['propiedad']['tmp_name']['imagen']){
            // Almacenar la Imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);
           } // Guardar en la bases de datos
            $propiedad->guardar();
        }
    }


    incluirTemplate('header')
?>


    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde"> Volver</a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                 <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar" class="boton boton-verde">
        </form>
    </main>




<?php
    incluirTemplate('footer');
?>