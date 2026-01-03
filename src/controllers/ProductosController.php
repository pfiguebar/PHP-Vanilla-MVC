<?php

namespace App\Controllers;

use App\Repositories\ProductosRepository;

class ProductosControllers {

    public static function list(){

        $productos = ProductosRepository::all();

        return [
            'view' => 'productos/list.php',
            'productos' => $productos
        ];
    }


   public static function new(){       
        $producto = ProductosRepository::new();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
            ProductosRepository::set($producto, $_POST);
            header('Location: /productos');
            exit;
        }

        return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Nuevo Producto',
                'button' => 'Crear',
                'action' => '/productos/new',
                'vales' => $producto              
            ]
        ];
    }


    public static function edit(){
        $id = $_GET['id'];
        $producto = ProductosRepository::find($id);

        if (!$producto) {
            header('Location: /productos?error=no-encontrado');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ProductosRepository::set ($producto, $_POST, $id );            
            header('Location: /productos');
            exit;
        }

        return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Editar Producto',
                'button' => 'Guardar cambios',
                'action' => '/productos/'.$id.'/edit',
                'values' => $producto            
            ]
        ];
    }

    public static function delete(){
        $id = $_GET['id'];
        $producto = ProductosRepository::find($id);

        if (!$producto) {
            header('Location: /productos?error=no-encontrado');
            exit;
        }

        ProductosRepository::delete($producto);       
        header('Location: /productos');
        exit;
    }
}