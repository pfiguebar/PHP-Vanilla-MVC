<?php 

namespace App\Repositories;

use App\Models\CategoriasModels;

class CategoriasRepository {

    public static function all() {        
        $categoria = new CategoriasModels();
        $listado = $categoria->select(
            'ID AS id, NOMBRE AS categoria',
            ['ORDER' => 'NOMBRE ASC']
        );
        return $listado;
    }

    public static function find($id) {        
        $categoria = new CategoriasModels();
        $listado = $categoria->select(
            'ID AS id, NOMBRE AS categoria', 
            [
                'where' => 'ID = :id',
                'replaces' => [':id' => $id],
            ],
            true
        );
        return $listado;
    }

    public static function new(){
        $categoria = new CategoriasModels();
        return $categoria;
    }

    public static function set($data, $id = null) {
        $categoria = new CategoriasModels();        
        $columns = "NOMBRE = :nombre";
        $replaces = [':nombre' => $data['nombre']];        
        is_null($id) ? $categoria->insert($columns, $replaces) : $categoria->update($columns, $replaces, $id);
    }   

    public static function delete($id) {
        $categoria = new CategoriasModels();
        $categoria->delete($id);
    }

    

}