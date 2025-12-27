<?php

namespace App\Controllers;

use App\Models\CategoriasModels;

class CategoriasControllers {
    
    public static function list(){
        $categoria = new CategoriasModels();
        $listado = $categoria->all('ID AS id, NOMBRE AS categoria');
              
        return [
            'view' => 'categorias/list.php',
            'categorias' => $listado
        ];
    }

    public static function new(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
            $columns = "NOMBRE = :nombre";
            $replace = [':nombre' => $_POST['nombre']]; 

            $categoria = new CategoriasModels();
            $categoria->insert( $columns, $replace );
            
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
        $datosactual = $categoria->find ( 'ID AS id, NOMBRE AS categoria', $id); 
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $columns = "NOMBRE = :nombre";
            $replaces = [':nombre' => $_POST['nombre'], ':id' => $id];                        
            
            $categoria->update($columns, $replaces, $id);
            
            header('Location: /categorias');
            exit;
        }

        return [
            'view' => 'categorias/form.php',
            'form' => [
                'title' => 'Editar Categoria',
                'button' => 'Guardar cambios',
                'action' => '/categorias/'.$id.'/edit',
                'values' => $datosactual              
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