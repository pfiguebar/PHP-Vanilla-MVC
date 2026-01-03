<?php

namespace App\Controllers;

use App\Repositories\CategoriasRepository;

class CategoriasControllers {
    
    public static function list(){
        
        $categorias = CategoriasRepository::all();

        return [
            'view' => 'categorias/list.php',
            'categorias' => $categorias
        ];
    }

    public static function new(){   

        $categoria = CategoriasRepository::new();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
            CategoriasRepository::set ($categoria, $_POST );
            header('Location: /categorias');
            exit;
        }
        return [
            'view' => 'categorias/form.php',
            'form' => [
                'title' => 'Nueva Categoria',
                'button' => 'Crear',
                'action' => '/categorias/new',
                'values' => $categoria               
            ]
        ];
    }

    public static function edit(){
        $id = $_GET['id'];                    
        $categoria = CategoriasRepository::find($id);

        if (!$categoria) {
            header('Location: /categorias?error=no-encontrado');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CategoriasRepository::set ( $categoria, $_POST, $id );           
            header('Location: /categorias');
            exit;
        }

        return [
            'view' => 'categorias/form.php',
            'form' => [
                'title' => 'Editar Categoria',
                'button' => 'Guardar cambios',
                'action' => '/categorias/'.$id.'/edit',
                'values' => $categoria              
            ]   
            
        ];
    }

    public static function delete(){
        $id = $_GET['id'];
        $categoria = CategoriasRepository::find($id);

        if (!$categoria) {
            header('Location: /categorias?error=no-encontrado');
            exit;
        }

        CategoriasRepository::delete($categoria);
        header('Location: /categorias');
        exit;
    }

}