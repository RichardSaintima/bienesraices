<?php
    require '../includes/app.php';
    esAutenticado();


    use App\Propiedad;
    use App\Vendedor;

    // implementar un metodo para obtener todas las propiedad
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    // Muestre mensaje condiacional
    $resultado= $_GET['resultado'] ?? null;




    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id , FILTER_VALIDATE_INT);
        
        if($id){

    // Obtener los datos de la propiedad
            $propiedad = Propiedad::find($id);

            $propiedad ->eliminar();


        }
    }

    // Incluye un template
    incluirTemplate('header')
?>


    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if( intval( $resultado ) === 1): ?>
            <p class="alerta exito">Anuncio Creado con exito</p>;
        <?php elseif( intval( $resultado ) === 2): ?>
            <p class="alerta exito">Fue actualizado Correctamente</p>; 
        <?php elseif( intval( $resultado ) === 3): ?>
            <p class="alerta exito">Fue Eliminado Correctamente</p>; 
        <?php endif; ?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde"> Nueva Propiedad</a>

        <table class="propiedades co">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Monstar la Conexion -->
                <?php foreach ( $propiedades as $propiedad ): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td> <?php echo $propiedad->titulo; ?> </td>
                    <td> <img src="../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt=""> </td>
                    <td> <?php echo $propiedad->precio; ?> </td>
                    <td>
                        <form action="" method="POST"  class="w-100 ">

                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>




<?php
    // Cerrar la Conexion
    mysqli_close($bd);

    incluirTemplate('footer');
?>