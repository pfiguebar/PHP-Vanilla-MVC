<?php 

namespace App\Models;

use PDO;
use App\Models\EntityModel;

class CategoriasModels extends EntityModel {

    protected PDO $pdo;
    protected $table = 'categorias';

    private int $id;
    private string $categoria;
    
    // ID
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    // CATEGORIA
    public function getCategoria(): string {
        return $this->categoria;
    }
   
    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }    


}