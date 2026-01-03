<?php 

namespace App\Repositories;

use App\Models\CategoriasModels;

class CategoriasRepository {

    public static function all() {        
        $categoria = new CategoriasModels();
        $listado = $categoria->select(
            'ID AS id, CATEGORIA AS categoria',
            ['ORDER' => 'CATEGORIA ASC']
        );
        return $listado;
    }

    public static function find($id) {        
        $categoria = new CategoriasModels();
        $listado = $categoria->select(
            'ID AS id, CATEGORIA AS categoria', 
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

    public static function set($categoria, $data ) {
        $categoria->setCategoria( $data['categoria'] ); 
        is_null($categoria->getId()) ? $categoria->insert() : $categoria->update();
    }   

    public static function delete($categoria) {
       $categoria->delete();
    }

    

}