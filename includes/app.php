<?php

require 'funciones.php';
require 'config/databases.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectar a la bases de Datos
$bd = conectarBD();

use App\ActiveRecord;

ActiveRecord::setBD($bd);