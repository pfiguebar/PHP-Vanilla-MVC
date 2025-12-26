<?php

namespace App\Controllers;

use App\Models\CategoriasModels;

class CategoriasControllers {
    
    public static function list(){
        $categoria = new CategoriasModels();
        $listado = $categoria->all();
              
        return [
            'view' => 'categorias/list.php',
            'categorias' => $listado
        ];
    }

    public static function new(){

        // caso sea un POST, estoy insertando
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // llamar al insert en el modelo, etc.
            $categoria = new CategoriasModels();
            $categoria->insert($_POST);
            // redireccionar a la lista de categorías
            header('Location: /categorias');
            exit;
        }

        return [
            'view' => 'categorias/form.php',
            'form' => [
                'title' => 'Nueva Categoria',
                'button' => 'Crear',
                'action' => '/categorias/new'                
            ]
        ];
    }

    public static function edit(){
        $id = $_GET['id'];
        $categoria = new CategoriasModels();
        $actual = $categoria->find ($id); 
        
         // caso sea un POST, estoy insertando
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // llamar al update en el modelo, etc.
            $categoria = new CategoriasModels();
            $categoria->update($_POST, $id);
            // redireccionar a la lista de categorías
            header('Location: /categorias');
            exit;
        }

        return [
            'view' => 'categorias/form.php',
            'form' => [
                'title' => 'Editar Categoria',
                'button' => 'Guardar cambios',
                'action' => '/categorias/'.$id.'/edit',
                'values' => $actual              
            ]
        ];
    }

    public static function delete(){
        $id = $_GET['id'];
        $categoria = new CategoriasModels();
        $categoria->delete($id);
        header('Location: /categorias');
        exit;
    }

}