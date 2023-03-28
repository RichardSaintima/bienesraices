<?php

namespace App;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores'; 

    protected static $columnaBD=['id', 'nombre_vend', 'apellido_vend', 'telefono'];

    public $id;
    public $nombre_vend;
    public $apellido_vend;
    public $telefono;



    public function __construct( $args = [] ) {
        $this -> id = $args['id'] ?? null;
        $this -> nombre_vend = $args['nombre_vend'] ?? '';
        $this -> apellido_vend = $args['apellido_vend'] ?? '';
        $this -> telefono = $args['telefono'] ?? '';
    }



    
}