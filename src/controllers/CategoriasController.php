<?php

namespace App\Controllers;

use App\Repositories\CategoriasRepository;

class CategoriasControllers {
    
    public static function list(){
        return [
            'view' => 'categorias/list.php',
            'categorias' => CategoriasRepository::all()
        ];
    }

    public static function new(){       
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CategoriasRepository::set ( $_POST );
            header('Location: /categorias');
            exit;
        }

        return [
            'view' => 'categorias/form.php',
            'form' => [
                'title' => 'Nueva Categoria',
                'button' => 'Crear',
                'action' => '/categorias/new',
                'values' => CategoriasRepository::new()               
            ]
        ];
    }

    public static function edit(){
        $id = $_GET['id'];                    
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CategoriasRepository::set ( $_POST, $id );           
            header('Location: /categorias');
            exit;
        }

        return [
            'view' => 'categorias/form.php',
            'form' => [
                'title' => 'Editar Categoria',
                'button' => 'Guardar cambios',
                'action' => '/categorias/'.$id.'/edit',
                'values' => CategoriasRepository::find($id)              
            ]
        ];
    }

    public static function delete(){
        $id = $_GET['id'];
        CategoriasRepository::delete($id);
        header('Location: /categorias');
        exit;
    }

}