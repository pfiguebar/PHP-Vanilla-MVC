<?php

namespace App\Controllers;

use App\Repositories\ProductosRepository;

class ProductosControllers {

    public static function list(){
        return [
            'view' => 'productos/list.php',
            'productos' => ProductosRepository::all()
        ];
    }


   public static function new(){       
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
            ProductosRepository::set($_POST);
            header('Location: /productos');
            exit;
        }

        return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Nuevo Producto',
                'button' => 'Crear',
                'action' => '/productos/new',
                'vales' => ProductosRepository::new()              
            ]
        ];
    }


    public static function edit(){
        $id = $_GET['id'];
                        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ProductosRepository::set ( $_POST, $id );            
            header('Location: /productos');
            exit;
        }

        return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Editar Producto',
                'button' => 'Guardar cambios',
                'action' => '/productos/'.$id.'/edit',
                'values' => ProductosRepository::find($id)             
            ]
        ];
    }

    public static function delete(){
        $id = $_GET['id'];
        ProductosRepository::delete($id);       
        header('Location: /productos');
        exit;
    }
}