<?php
    // Importar la conexion
    // Incluye el header 
    require 'includes/app.php';
    $bd = conectarBD();

    $errores = [];

    // Autenticae al usuario
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        // var_dump($_POST);
        // echo"<br>";

        $email = mysqli_real_escape_string($bd, filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)) ;
        $password = mysqli_real_escape_string($bd, $_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es valido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio ";
        }
        
        if(empty($errores)){
            // Revisa si el usuario Exista
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($bd , $query);

           
            if ($resultado -> num_rows){// para comprobar tipo object
                // Revisar si el password Existe
                $usuario = mysqli_fetch_assoc($resultado);
                // var_dump($usuario);
                // Verificado si el password es correcto o no
                $auth = password_verify($password ,$usuario['password']);
                if($auth){
                    // El usuario esta Autenticado
                    session_start();

                    

                    // Llena el arreglo de la session
                    $_SESSION['usuario']= $usuario['email'];
                    $_SESSION['login']=true;

                    header('Location: /admin');

                }else{
                    $errores[]="El password es Incorrecto";
                }
            }else{
                $errores[]= "El usuario no existe";
            }
        }

    }

    incluirTemplate('header')
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form method="POST" class="formulario" action="" novalidate>
            <fieldset>
                <legend>Imformacion personal</legend>
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Correo" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu password" id="password">
            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
    </main>




<?php

    mysqli_close($bd);
    incluirTemplate('footer');
?>