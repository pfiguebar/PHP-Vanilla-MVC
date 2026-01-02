<?php

namespace App\Repositories;

use App\Models\ProductosModels;

class ProductosRepository {

    public static function all() {        
        $producto = new ProductosModels();
        $listado = $producto->select(
            'ID AS id, NOMBRE AS nombre, DESCRIPCION AS descripcion, PRECIO AS precio, IMAGEN AS imagen, FECHA_ALTA AS fecha_alta, ESTADO AS estado',
            ['ORDER' => 'NOMBRE ASC']
        );
        return $listado;
    }

    public static function find($id) {        
        $producto = new ProductosModels();
        $listado = $producto->select(
            'ID AS id, NOMBRE AS nombre, DESCRIPCION AS descripcion, PRECIO AS precio, IMAGEN AS imagen, FECHA_ALTA AS fecha_alta, ESTADO AS estado',
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

    public static function set($data, $id = null) {
        $producto = new ProductosModels();        
        $columns = "NOMBRE = :nombre, DESCRIPCION = :descripcion, PRECIO = :precio, IMAGEN = :imagen, FECHA_ALTA = :fecha_alta, ESTADO = :estado";
        $replaces = [
            ':nombre' => $data['nombre'],
            ':descripcion' => $data['descripcion'],
            ':precio' => $data['precio'],
            ':imagen' => '/assets/img/pizza/margarita.jpg', //$data['imagen'],
            ':fecha_alta' => '2024-01-15 12:30:00', //$data['fecha_alta'],
            ':estado' => 1 //$data['estado']
        ];
        is_null($id) ? $producto->insert($columns, $replaces) : $producto->update($columns, $replaces, $id);
    }

    public static function delete($id) {
        $producto = new ProductosModels();
        $producto->delete($id);
    }
    

}

