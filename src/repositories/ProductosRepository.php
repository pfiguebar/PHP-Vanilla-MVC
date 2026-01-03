<?php

namespace App\Repositories;

use App\Models\ProductosModels;

class ProductosRepository {

    public static function all() {        
        $producto = new ProductosModels();
        $listado = $producto->select(
            'ID AS id, PRODUCTO AS producto, DESCRIPCION AS descripcion, PRECIO AS precio, IMAGEN AS imagen, FECHA_ALTA AS fecha_alta, ESTADO AS estado',
            ['ORDER' => 'PRODUCTO ASC']
        );
        return $listado;
    }

    public static function find($id) {        
        $producto = new ProductosModels();
        $listado = $producto->select(
            'ID AS id, PRODUCTO AS producto, DESCRIPCION AS descripcion, PRECIO AS precio, IMAGEN AS imagen, FECHA_ALTA AS fecha_alta, ESTADO AS estado',
            [
                'where' => 'ID = :id',
                'replaces' => [':id' => $id],
            ],
            true
        );
        return $listado;
    }

    public static function new(){
        $producto = new ProductosModels();
        return $producto;
    }

    public static function set( $producto, $data) {
        $producto->setProducto( $data['producto'] );
        $producto->setDescripcion( $data['descripcion'] );
        $producto->setPrecio( $data['precio'] );
        $producto->setImagen( $data['imagen'] );
        $producto->setFechaAlta( $data['fecha_alta'] );
        $producto->setEstado( $data['estado'] );    
        is_null( $producto->getId()) ? $producto->insert() : $producto->update();
    }

    public static function delete($producto) {
        $producto->delete();
    }
    

}

