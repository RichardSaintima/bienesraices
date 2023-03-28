<?php
    // Importar la conexion

    // Incluye el header 
    require 'includes/app.php';
    $bd = conectarBD();
 

//Crear un email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);


// Query para creae el usuario
$query = "INSERT INTO usuarios (email,password) VALUES ( '${email}' , '${passwordHash}' );";

echo $query;

// Agregarlo a la BD

 mysqli_query($bd, $query);