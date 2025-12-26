<?php

namespace App\Controllers;

class ProductosControllers {

    public static function list(){
        return [
            'view' => 'productos/list.php'
        ];
    }

    public static function new(){
         return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Nuevo Producto',
                'button' => 'Crear'
            ]
        ];
    }

    public static function edit(){
         return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Editar Producto',
                'button' => 'Guardar cambios'
            ]            
        ];
    }

    public static function delete(){
        // no tiene vista
    }
}