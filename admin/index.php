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
            $tipo = $_POST['tipo'];
            
            if(validarTipoContenido($tipo)){
                // Compara lo que vamos a eliminar
                if($tipo ==='vendedor') {
                    $vendedor = Vendedor::find($id);
                    $vendedor ->eliminar();
                }elseif($tipo === 'propiedad'){
                    // Obtener los datos de la propiedad
                    $propiedad = Propiedad::find($id);
                    $propiedad ->eliminar();

                }
            }

        }
    }

    // Incluye un template
    incluirTemplate('header')
?>


    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if( intval( $resultado ) === 1): ?>
            <p class="alerta exito">Creado Correctamente</p>;
        <?php elseif( intval( $resultado ) === 2): ?>
            <p class="alerta exito">actualizado Correctamente</p>; 
        <?php elseif( intval( $resultado ) === 3): ?>
            <p class="alerta exito"> Eliminado Correctamente</p>; 
        <?php endif; ?>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde"> Nueva Propiedad</a>
        <a href="/bienesraices/admin/vendedores/crear.php" class="boton boton-amarillo"> Nuevo(a) Vendedor</a>

        <h2>Propiedades</h2>
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
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades co">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Monstar la Conexion -->
                <?php foreach ( $vendedores as $vendedor ): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td> <?php echo $vendedor->nombre . "  " . $vendedor->apellido; ?> </td>
                    <td> <?php echo $vendedor->telefono; ?> </td>
                    <td>
                        <form action="" method="POST"  class="w-100 ">

                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="/bienesraices/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>




<?php
    incluirTemplate('footer');
?>