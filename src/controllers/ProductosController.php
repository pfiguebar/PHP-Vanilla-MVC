<?php

namespace App\Controllers;

use App\Models\ProductosModels;

class ProductosControllers {

    public static function list(){
        $producto = new ProductosModels();
        $listado = $producto->all('ID AS id, NOMBRE AS nombre, DESCRIPCION AS descripcion, PRECIO AS precio, IMAGEN AS imagen, FECHA_ALTA AS fecha_alta, ESTADO AS estado');
              
        return [
            'view' => 'productos/list.php',
            'productos' => $listado
        ];
    }


   public static function new(){
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $columns = "NOMBRE = :nombre";
            $replace = [':nombre' => $_POST['nombre']]; 
            
            $producto = new ProductosModels();
            $producto->insert($columns, $replace);
           
            header('Location: /productos');
            exit;
        }

        return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Nuevo Producto',
                'button' => 'Crear',
                'action' => '/productos/new'                
            ]
        ];
    }


    public static function edit(){
        $id = $_GET['id'];
        $producto = new ProductosModels();
        $datosactual = $producto->find ('ID AS id, NOMBRE AS nombre, DESCRIPCION AS descripcion, PRECIO AS precio, IMAGEN AS imagen, FECHA_ALTA AS fecha_alta, ESTADO AS estado', $id); 
                
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $columns = "NOMBRE = :nombre, DESCRIPCION = :descripcion, PRECIO = :precio, IMAGEN = :imagen, ESTADO = :estado";
            $replaces = [':nombre' => $_POST['nombre'], ':descripcion' => $_POST['descripcion'], ':precio' => $_POST['precio'], ':imagen' => $_POST['imagen'], ':estado' => $_POST['estado'], ':id' => $id];            
            
            $producto->update($columns, $replaces, $id);
            
            header('Location: /productos');
            exit;
        }

        return [
            'view' => 'productos/form.php',
            'form' => [
                'title' => 'Editar Producto',
                'button' => 'Guardar cambios',
                'action' => '/productos/'.$id.'/edit',
                'values' => $datosactual              
            ]
        ];
    }

    public static function delete(){
        $id = $_GET['id'];
        $producto = new ProductosModels();

        $producto->delete($id);
        
        header('Location: /productos');
        exit;
    }
}